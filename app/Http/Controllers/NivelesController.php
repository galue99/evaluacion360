<?php

namespace App\Http\Controllers;

use App\Nivel;
use Request;
use Input;

use Illuminate\Support\Facades\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class NivelesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $niveles = Nivel::all();
        if (Request::isJson()) {
            return  $niveles;
        } else {
            return View('admin.niveles');
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
        $nivel = new Nivel();
        $nivel->name = Request::input('name');
        $nivel->save();

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
        $nivel = Nivel::find($id);

        return $nivel;
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
        $nivel = Nivel::findOrFail($id);
        $nivel->name = Request::input('name');
        $nivel->save();


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
        $nivel = Nivel::find($id);

        $nivel->delete();

        return Response::json([
            'Success' => [
                'message'     => 'Record Delete with Exits',
                'status_code' => 200
            ]
        ], 200);
    }
}
