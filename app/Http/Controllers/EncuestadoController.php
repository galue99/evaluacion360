<?php

namespace App\Http\Controllers;

use App\User;
use Session;
use App\UserAnswer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;


class EncuestadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->is_active == 1){
            $id = Auth::user()->id;
            $encuestas = DB::table('users_encuestas')->where('evaluador_id', '=', $id)->where('status', '=', 0)->get();
            if($encuestas == null){
                return View('welcome');
            }else{
                return View('evaluaciones.evaluacion');
            }
        }else{
            return View('welcome');
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
        $answers = $request->only('answers');
        //var_dump($answers);
        foreach ($answers as $clave){
            for($i=0; $i<count($clave); $i++){
                $test = new UserAnswer();
                $test->users_encuestas_id = Session::get('users_encuestas_id');
                $test->answers_id = $clave[$i]['answer_id'];
                $test->save();
            }
        }

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
        $encuesta = User::find($id)->encuesta;


        return Response::json([
            'Success' => [
                'admin'  => $encuesta,
            ]
        ], 200);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
