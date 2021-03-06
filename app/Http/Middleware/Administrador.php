<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;

class Administrador
{
    protected $auth;
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        switch ($this->auth->user()->idrol) {
            case '1':
                # Administrador
                //return redirect()->to('admin');
                //Session::flash('message-error', 'No tiene privilegios de administrador');
                break;

            case '2':
                # Responsable de Área
                return redirect()->to('encuestado');
                break;

            default:
                return redirect()->to('/');
                break;
        }

        return $next($request);
    }
}
