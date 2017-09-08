<?php
/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 05/09/2017
 * Time: 15:16
 */

namespace App\Modules\Core\Middleware;

use App\Modules\User\Helper\UserHelper;
use Closure;

class PermissionMiddleware
{
    public function handle($request, Closure $next)
    {
        $per = UserHelper::getAllPermission();
        if ((isset($per['teacher']) && $per['teacher']) || (isset($per['admin']) && $per['admin']) ){
            return $next($request);
        } else {
            return redirect()->route('thangdeptrai');
        }
    }

}