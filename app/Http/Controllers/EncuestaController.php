<?php

namespace App\Http\Controllers;

use App\Encuesta;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class EncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null) {
        // if ($id == null) {
        //     return Encuesta::orderBy('id', 'asc')->get();
        // } else {
        //     return $this->show($id);
        // }
        return View('encuesta.index');

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $encuesta   = Encuesta::find($id);
        $persona    = Encuesta::find($id)->user;
        $items      = Encuesta::find($id)->items;
        $frases     = Encuesta::find($id)->frases;
        $evaluador  = Encuesta::find($id)->evaluador;

        return Response::json([
            'Success' => [
                'encuesta'  => $encuesta,
                'persona'   => $persona,
                'items'     => $items,
                'frases'    => $frases,
                'evaluador' => $evaluador
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
