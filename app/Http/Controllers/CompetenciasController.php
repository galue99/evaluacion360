<?php

namespace App\Http\Controllers;


use App\Competencia;
use Validator;
use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Symfony\Component\Console\Input\Input;


class CompetenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Request::isJson()) {
            $competencias = Competencia::all();
            return $competencias;
        }else{
            return View('admin.competencias');
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

        $postData = $request::all();

        $messages = [
            'name.required'          => 'Enter a name',
            'description.required'   => 'Enter a definicion',
        ];

        $rules = [
            'name'        => 'required|string|min:3|max:30',
            'description' => 'required|string|min:3',
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
        $id_type = 0;
        if(Request::input('type') === 'Organizacional'){
            $id_type = 1;
        }else{
            $id_type = 2;
        }

        $compentencia = new Competencia();
        $compentencia->name = Request::input('name');
        $compentencia->definicion = Request::input('description');
        $compentencia->type = Request::input('type');
        $compentencia->type_id = $id_type;
        $compentencia->save();


        return Response::json([
            'Success' => [
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
        $compentencias = Competencia::find($id);

        return $compentencias;
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
        $compentencia = Competencia::findOrFail($id);
        $compentencia->name = Request::input('name');
        $compentencia->description = Request::input('description');
        $compentencia->save();

        return Response::json([
            'Success' => [
                'status_code' => 200
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
        $compentencia = Competencia::find($id);

        $compentencia->delete();

        return Response::json([
            'Success' => [
                'message'     => 'Record Delete with Exits',
                'status_code' => 200
            ]
        ], 200);
    }
    
    public function competencias_comportamientos()
    {
        $competencia = Competencia::with('comportamiento')->get();
        
        return Response::json($competencia);
    }
    
}
