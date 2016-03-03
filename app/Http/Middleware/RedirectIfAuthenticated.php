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
                    # Responsable de Área
                    return redirect()->to('encuestado');
                    break;
                case '3':
                    # Secretaria
                    return redirect()->to('encuestador');
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
