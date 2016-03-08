<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class RedirectIfAuthenticated
{
    protected $auth;
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    public function handle($request, Closure $next)
    {
        if ($this->auth->check()) {
            switch ($this->auth->user()->idrol)
            {
                case '1':
                    # Administrador
                    return redirect()->to('admin');
                    break;
                case '2':
                    # Encuestado
                    return redirect()->to('evaluaciones');
                    break;
                case '3':
                    # Evaluado
                    return redirect()->to('evaluado');
                    break;
                default:
                    return redirect()->to('/login');
                    break;
            }
            return redirect('/admin');
        }
        return $next($request);
    }
}
