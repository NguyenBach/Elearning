<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 07/08/2017
 * Time: 23:10
 */

namespace App\Modules\User\Controller;


use App\Http\Controllers\Controller;
use App\Modules\User\Model\Account;
use App\Modules\User\Model\Permission;
use App\Modules\User\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public $user;
    public $account;
    public $permission;
    function __construct()
    {
        $this->user = new User();
        $this->account = new Account();
        $this->permission = new Permission();
    }

    public function register(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        $fullname = $request->input('fullname');
        $email = $request->input('email');
        $birthday = $request->input('birthday');
        $permission = $request->input('permission','student');
        if($this->checkUser($username,$email)){
            return redirect('/login');
        }
        $userId = $this->account->addAccount($username,$password);
        $data = [
            'id' => $userId,
            'fullname' => $fullname,
            'email' =>$email,
            'birthday' => $birthday
            ];
        $this->user->addUser($data);
        $this->permission->addPermission($userId,$permission);
        return redirect('/login');
    }

    public function login(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        $user = $this->account->where('username',$username)->first();
        if(is_null($user)){
            return view('Core::login');
        }
        if(Hash::check($password,$user->password)){
            $permission = $this->permission->where('user_id',$user->user_id)->get();
            $p = [];
            foreach ($permission as $per){
                $p[] = $per->permission;
            }
            session(['permission'=>$p]);
            session(['user_id'=>$user->user_id]);
            return redirect('/');
        }
    }

    public function logout(){
        session(['permission'=>'','user_id'=>'']);
        return redirect('/');
    }

    private function checkUser($username,$email){
        $user = $this->account->where('username',$username)->get();
        return count($user);
    }
}