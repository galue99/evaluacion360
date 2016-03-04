<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;

class Evaluado
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
                return redirect()->to('admin');
                //Session::flash('message-error', 'No tiene privilegios de administrador');
                break;

            case '2':
                # Encuestado
                return redirect()->to('encuestado');
                break;

            case '3':
                # Evaluado
                //return redirect()->to('encuestador');
                break;

            default:
                return redirect()->to('/');
                break;
        }

        return $next($request);
    }
}
