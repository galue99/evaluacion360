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
    public function index() {
        // if ($id == null) {
        //     return Encuesta::orderBy('id', 'asc')->get();
        // } else {
        //     return $this->show($id);
        // }
        return View('admin.evaluaciones');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.create');
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
        $encuesta    = Encuesta::with('user', 'items', 'items.frases', 'items.frases.answers')->find($id);

        return  Response::json($encuesta);
//         $persona     = Encuesta::find($id)->user;
//         $items       = Encuesta::find($id)->items;
//         $frases      = Encuesta::find($id)->frases;
//         $encuestado  = Encuesta::find($id)->encuestado;



//         return Response::json([
//             'Success' => [
//                 'admin'  => $encuesta,
// //                 'persona'   => $persona,
// //                 'items'     => $items,
// //                 'frases'    => $frases,
// //                 'evaluaciones' => $encuestado
//             ]
//         ], 200);
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
