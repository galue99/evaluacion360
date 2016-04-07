<?php

namespace App\Http\Controllers;


use App\Encuesta;
use Illuminate\Http\Request;

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
        $users = User::all();
        if ($this->isJSON($request)){
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

        $user->firstname      = $request->input('firstname');
        $user->lastname       = $request->input('lastname');
        $user->idrol          = $request->input('idrol');
        $user->email          = $request->input('email');
        $user->password       = Hash::make($request->input('password'));
        $user->repassword     = $request->input('password');
        $user->dni            = $request->input('dni');
        $user->position       = $request->input('position');
        $user->company        = $request->input('company');
        $user->branch_office  = $request->input('branch_office');
        $user->is_active      = $request->input('is_active');

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
            'dni'         => 'string|min:3|max:9',
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

        $user->firstname  = $request->input('firstname');
        $user->lastname   = $request->input('lastname');
        $user->idrol      = $request->input('idrol');
        $user->email      = $request->input('email');
        $user->password   = Hash::make($request->input('password'));
        $user->repassword = $request->input('password');
        $user->dni        = $request->input('dni');
        $user->position   = $request->input('position');
        if($request->input('is_active') == 'true'){
            $user->is_active = 1;
        }else{
            $user->is_active = 0;
        }

        $user->save();

        return Response::json([
            'Success' => [
                'message'     => 'Record Save Exits',
                'status_code' => 200,
                'is_active' => $request->input('is_active'),
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


    public function allUser()
    {
        $users = DB::table('users')->where('idrol', '!=', 1)->get();
        return Response::json($users);
    }

    public function user_encuesta()
    {
        $users = DB::table('users')
            ->join('users_encuestas', 'users.id', '=', 'users_encuestas.user_id')
            ->join('encuestas', 'encuestas.id', '=', 'users_encuestas.encuesta_id')
            ->select('users.*', 'encuestas.*', 'users_encuestas.*')->get();

        return Response::json([
            'Success' => [
                'status_code' => 200,
                'users'       => $users
            ]
        ], 200);
    }
}
