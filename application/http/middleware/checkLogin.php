<?php

namespace app\http\middleware;

class checkLogin
{
    public function handle($request, \Closure $next)
    {
        // 判断登录的session是否存在
        if (!session('?admin.user')) {
            // 未登录的情况，并携带一个闪存提示信息
            return redirect(url('/admin/login'))->with('error','未登录！');
        }

        // 验证成功然后放行
        return $next($request);
    }
}
