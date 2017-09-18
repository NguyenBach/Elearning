<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 07/08/2017
 * Time: 23:10
 */

namespace App\Modules\User\Controller;


use App\Http\Controllers\Controller;
use App\Modules\User\Helper\UserHelper;
use App\Modules\User\Model\Account;
use App\Modules\User\Model\Permission;
use App\Modules\User\Model\User;
use App\Modules\User\Request\LoginRequest;
use App\Modules\User\Request\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;

class UserController extends Controller
{
    private $user;
    private $account;
    private $permission;
    function __construct()
    {
        $this->user = new User();
        $this->account = new Account();
        $this->permission = new Permission();
    }

    public function register(RegisterRequest $request){
        $username = $request->input('username');
        $password = $request->input('password');
        $repassword = $request->input('repassword');
        $fullname = $request->input('fullname');
        $email = $request->input('email');
        $birthday = $request->input('birthday');
        if($password !== $repassword){
            return redirect()->back()->withInput($request->all())->withErrors(['password'=>'Repeat password is incorrect']);
        }
        if($this->checkUser($username,$email)){
            return redirect()->back()->withInput($request->all())->withErrors(['registererror'=>'Account is exist']);
        }
        $userId = $this->account->addAccount($username,$password);
        if($userId == 0){
            return redirect()->back()->withInput($request->all())->withErrors(['registererror'=>'Error1']);
        }
        $data = [
            'id' => $userId,
            'fullname' => $fullname,
            'email' =>$email,
            'birthday' => $birthday
            ];
        $success = $this->user->addUser($data);
        if($success == 0){
            $this->undo($userId);
            return redirect()->back()->withInput($request->all())->withErrors(['registererror'=>'Error2']);
        }
        $success = $this->permission->addPermission($userId,"student");
        if($success == 0){
            $this->undo($userId);
            return redirect()->back()->withInput($request->all())->withErrors(['registererror'=>'Error3']);
        }
        $account['username'] = $username;
        return view('User::welcome',['account'=>$account]);
    }

    public function login(LoginRequest $request){
        $username = $request->input('username');
        $password = $request->input('password');
        $re = $request->input('redirect');
        if(!isset($re)) $re = '/';
        if(UserHelper::isLogined()){
            return redirect($re);
        }
        $user = $this->account->where('username',$username)->first();
        if(count($user) == 0){
            $errors = new MessageBag(['errorlogin'=>'Username or password is incorrect']);
            return redirect()->back()->withInput(['username'=>$username])->withErrors($errors);
        }
        if(Hash::check($password,$user->password)){
            $permission = $this->permission->where('user_id',$user->user_id)->get();
            $p = [];
            foreach ($permission as $per){
                $p[] = $per->permission;
            }
            session(['permission'=>$p,'user_id'=>$user->user_id]);
            return redirect($re);
        }else{
            $errors = new MessageBag(['errorlogin'=>'Username or password is incorrect']);
            return redirect()->back()->withInput(['username'=>$username])->withErrors($errors);
        }
    }

    public function logout(Request $request){
        $request->session()->forget('permission');
        $request->session()->forget('user_id');
        return redirect('/');
    }

    public function addUser(Request $request){

    }

    private function checkUser($username,$email){
        $user = $this->account->where('username',$username)->get();
        return count($user);
    }

    private function undo($userid){
        $ac = $this->account->where('user_id',$userid)->first();
        if(isset($ac->id)){
            $ac->delete();
        }
        $us = $this->user->where('id', $userid)->first();
        if(isset($us->id)){
            $us->delete();
        }
        $us = $this->permission->where('user_id', $userid)->get();
        if(count($us) > 0){
            foreach ($us as $u){
                $u->delete();
            }
        }

    }
}