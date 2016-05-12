<?php

namespace App\Http\Controllers;


use App\Encuesta;
use App\UserEncuesta;
use Request;
use Mail;

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$users =  DB::table('users')
            ->join('companys', 'companys.id', '=', 'users.company_id')
            ->select('users.*', 'users.id', 'companys.*')->get();*/

        if (Request::isJson()) {
            $users = User::with('company')->get();
            return  $users;
        } else {
            return View('admin.add_user');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();

        $random_quote = str_random(10);

        $user->firstname      = Request::input('firstname');
        $user->lastname       = Request::input('lastname');
        $user->idrol          = 2;
        $user->email          = Request::input('email');
        $user->password   = Hash::make($random_quote);
        $user->repassword = $random_quote;
        $user->dni            = Request::input('dni');
        $user->position       = Request::input('position');
        $user->company_id     = Request::input('company_id');
        $user->branch_office  = Request::input('branch_office');
        $user->is_active      = Request::input('is_active');

        $user->save();

        return Response::json([
            'Success' => [
                'message'     => 'Record Save Exits',
                'status_code' => 200
            ]
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $postData = Input::all();

        $messages = [
            'firstname.required'  => 'Enter Firstname',
            'lastname.required'   => 'Enter Lastname',
            'idrol.required'      => 'Enter Rol',
            'email.required'      => 'Enter Email',
            'password.required'   => 'Enter Password',
            'dni.min'             => 'Min 3 Characters',
            'position.required'   => 'Enter Position',
            'is_active.required'  => 'Enter is Active',
        ];

        $rules = [
            'firstname'   => 'required|string|min:3|max:30',
            'lastname'    => 'required|string|min:3|max:30',
            'idrol'       => 'required|string|min:1|max:2',
            'email'       => 'required|string|min:3|max:80',
            'password'    => 'required|string|min:3|max:30',
            'dni'         => 'string|min:3|max:30',
            'position'    => 'required|string|min:3|max:100',
            'is_active'   => 'required|string|max:10',

        ];

        $validator = Validator::make($postData, $rules, $messages);

        if ($validator->fails())
        {
            // send back to the page with the input data and errors
            return Response::json([
                'Error' => [
                    'message'     => $validator->messages(),
                    'status_code' => 400
                ]
            ], 400);
        }

        $user->firstname  = Request::input('firstname');
        $user->lastname   = Request::input('lastname');
        $user->idrol      = Request::input('idrol');
        $user->email      = Request::input('email');
        $user->password   = Hash::make(Request::input('password'));
        $user->repassword = Request::input('password');
        $user->dni        = Request::input('dni');
        $user->company_id = Request::input('company_id');
        $user->position   = Request::input('position');
        if(Request::input('is_active') == 'true'){
            $user->is_active = 1;
        }else{
            $user->is_active = 0;
        }

        $user->save();

        return Response::json([
            'Success' => [
                'message'     => 'Record Save Exits',
                'status_code' => 200,
            ]
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return Response::json([
            'Success' => [
                'message'     => 'Record Delete with Exits',
                'status_code' => 200
            ]
        ], 200);
    }


    public function allUserAssign()
    {
        $users = DB::table('users')->where('idrol', '!=', 1)->select('users.firstname')->get();
        $users = DB::table('users')->select(DB::raw('concat (firstname," ",lastname) as full_name,id'))->lists('full_name', 'id');
        //dd($users);

        return Response::json([
            'Success' => [
                'status_code' => 200,
                'users' => $users
            ]
        ], 200);

    }


    public function allUser()
    {
        $users = DB::table('users')->where('idrol', '!=', 1)->get();
        return Response::json($users);
    }

    public function users_encuesta(Request $request)
    {
        $method = Request::method();

        if (Request::isMethod('post'))
        {
            $user_encuesta = new UserEncuesta();

            $test1 = Request::only(['evaluadores']);

            $user_encuesta = new UserEncuesta();
            $user_encuesta->user_id = Request::input('id_user');
            $user_encuesta->encuesta_id = Request::input('id_encuesta');
            $user_encuesta->evaluador_id = $test1['evaluadores'][0];
            $user_encuesta->status = Request::input('status');
            $user_encuesta->niveles_id = Request::input('nivel');
            $user_encuesta->save();
            $id_encuesta = $user_encuesta->id;


            return Response::json([
                'Success' => [
                    'status_code' => 200,
                    'id_encuesta' => $id_encuesta
                ]
            ], 200);
        }

        $users = DB::table('users')
            ->join('users_encuestas', 'users.id', '=', 'users_encuestas.user_id')
            ->join('encuestas', 'encuestas.id', '=', 'users_encuestas.encuesta_id')
            ->join('companys', 'companys.id', '=', 'users.company_id')
            ->select('users.*', 'encuestas.*', 'users_encuestas.*')->get();


        return Response::json($users);
        // return Response::json([
        //     'Success' => [
        //         'status_code' => 200,
        //         'users'       => $users
        //     ]
        // ], 200);
    }

    public function users_encuestas(Request $request, $id)
    {

        if (Request::isMethod('post'))
        {
            $user_encuesta = new UserEncuesta();

            $test1 = Request::only(['evaluadores']);
            //return $test1;


            return Request::all();
                $user_encuesta->user_id = Request::input('id_user');
                $user_encuesta->encuesta_id = Request::input('encuesta_id');
                $user_encuesta->evaluador_id = Request::input('evaluado_id');
                $user_encuesta->status = Request::input('status');

            // $user_encuesta->save();

            return Response::json([
                'Success' => [
                    'status_code' => 200
                ]
            ], 200);
        }

        // $test = DB::table('users_encuestas')
        //     ->join('users', 'users_encuestas.user_id', '=', 'users.id')
        //     ->join('encuestas', 'encuestas.id', '=', 'users_encuestas.encuesta_id')
        //     ->select('users.*', 'users_encuestas.evaluador_id')->where('encuestas.id', '=', $id)->get();

        // $evaluado = DB::table('users_encuestas')
        //     ->join('users', 'users_encuestas.evaluador_id', '=', 'users.id')
        //     ->join('encuestas', 'encuestas.id', '=', 'users_encuestas.encuesta_id')
        //     ->select('users.*', 'users_encuestas.evaluador_id')->where('encuestas.id', '=', $id)->get();
        // //return  Response::json($encuesta);
        // $test = Encuesta::with('user')->groupBy('id')->find($id);
        // //return  Response::json($encuesta);

        // return Response::json([

        //     'User' => $test,
        //     'Evaluado' => $evaluado

        // ], 200);
        
        
        $encuesta = Encuesta::with(['evaluadores'])->find($id);
        
        foreach ($encuesta['evaluadores'] as &$user) {
            $users_ids = UserEncuesta::where([
                'encuesta_id' => $encuesta->id,
                'evaluador_id' => $user->id
            ])->lists('user_id');
            
            $user['evaluados'] = User::whereIn('id',$users_ids)->get();
            
        }
        
        return Response::json($encuesta);

    }


    public function users_id_diferent(Request $request, $id)
    {
        $users = DB::table('users')->where('id', '!=', $id)->where('id', '!=', 1)->get();

        return Response::json($users);

    }

    public function users_encuestas_delete(Request $request)
    {

        $user = Request::all();
        $evaluador_id = $user['evaluador_id'];
        $encuesta_id  = $user['encuesta_id'];

        $evaluador = UserEncuesta::where('evaluador_id', '=', $evaluador_id)->where('encuesta_id', '=', $encuesta_id)->first();

        //return $evaluador;
        $evaluador->delete();

        return Response::json([
            'Success' => [
                'message'     => 'Record Delete with Exits',
                'status_code' => 200
            ]
        ], 200);

    }

    public function sendEmail(){

        $user = User::find(2);
        $data = $user;

        Mail::send('email.email', ['user' => $user], function ($m) use ($user) {
            $m->from('info@mejorar-se.com.ve', 'Evaluacion 360');

            $m->to($user->email, $user->firstname)->subject('Credenciales');
        });

    }

}
