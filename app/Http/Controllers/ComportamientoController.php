<?php

namespace App\Http\Controllers;

use App\Comportamiento;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;


class ComportamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Request::isJson()) {
            $comportamientos = Comportamiento::all();
            return $comportamientos;
        }else{
            return View('admin.comportamientos');
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
        $comportamiento = new Comportamiento();
        $comportamiento->name = Request::input('name');
        $comportamiento->definicion = Request::input('description');
        $comportamiento->competencia_id = Request::input('competencia_id');
        $comportamiento->save();


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
        $comportamientos = Comportamiento::find($id);

        return $comportamientos;
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
        $comportamiento = Comportamiento::findOrFail($id);
        $comportamiento->name = Request::input('name');
        $comportamiento->definicion = Request::input('description');
        $comportamiento->competencia_id = Request::input('competencia_id');
        $comportamiento->save();


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
        $comportamiento = Comportamiento::find($id);

        $comportamiento->delete();

        return Response::json([
            'Success' => [
                'message'     => 'Record Delete with Exits',
                'status_code' => 200
            ]
        ], 200);
    }
}
