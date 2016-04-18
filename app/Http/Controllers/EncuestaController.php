<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Encuesta;
use App\Frase;
use App\Item;
use App\OtherQuestion;
use DateTime;
use Request;
use Session;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class EncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        // $test = Encuesta::with('');
        $test = Encuesta::all();

            if (Request::isJson()) {
                return $test;

            }else{
                return View('admin.create');
            }
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
        $test = new Encuesta();
        $test->name = Request::input('name');
        $test->is_active = false;
        $test->date = null;
        $test->save();
        $id_encuesta = $test->id;

        //echo $id_encuesta;


        //$item = new Item();
        $test1 = Request::only(['items']);

        foreach ($test1 as $clave => $valor){
            for($i=0; $i<count($valor); $i++){
                $item = new Item();
                $item->encuesta_id = $id_encuesta;
                $item->save();
                $id_item = $item->id;
               foreach($valor[$i] as $clave1){
                    foreach($clave1 as $value2){
                        //echo ($value2['name']);
                        $frase = new Frase();
                        $frase->item_id = $id_item;
                        $frase->name = $value2['name'];
                        $frase->save();
                        $id_frase = $frase->id;

                        foreach($value2['answers'] as $value3){
                            $answer = new Answer();
                            $answer->name = $value3['name'];
                            $answer->frase_id = $id_frase;
                            $answer->save();
                        }
                    }
                }
            }
        }

        return Response::json([
            'Success' => [
                'status_code' => 200,
                'id' => $id_encuesta
            ]
        ], 200);

        //var_dump($test1);

        //return $request->only(['items']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        /*$encuesta = Encuesta::where('id', '=', $id)->get();

        $frases = DB::table('frases')->where('item_id', '=', 1)->get();*/
        $id = Auth::user()->id;

        $encuestas = DB::table('users_encuestas')->where('evaluador_id', '=', $id)->get();
        $id_encuesta = $encuestas[0]->encuesta_id;
        Session::set('users_encuestas_id', $encuestas[0]->id);

        //$id_users_encuestas = $encuestas[0]->id;

        // $encuestas = DB::table('encuestas')->where('user_id', '=', $id)->where('is_active', '=', 1)->get();
        // $id_encuesta = $encuestas[0]->id;

        $encuesta = Encuesta::with('user', 'items', 'items.frases', 'items.frases.answers')->find($id_encuesta);

        return  Response::json($encuesta);
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


    public function assing_user()
    {
        return View('admin.assing_users');
    }

    public function encuestas_ready()
    {
        $encuesta = DB::table('encuestas')
                    ->join('users_encuestas', 'encuestas.id', '=', 'users_encuestas.encuesta_id')
                    ->where('users_encuestas.status', '=', 1)->groupBy('encuestas.id')->get();

        return  Response::json($encuesta);
    }


    public function encuestas_details($id)
    {

        if (Request::isJson()) {
            $encuesta = Encuesta::with('user', 'items', 'items.frases', 'items.frases.answers')->find(1);

            return  Response::json($encuesta);

        }else{
            return View('admin.encuesta_items');
        }

    }






}
