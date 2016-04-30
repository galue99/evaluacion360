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

        //$item = new Item();
        $test1 = Request::only(['items']);

        foreach ($test1 as $clave => $valor){
            for($i=0; $i<count($valor); $i++){
                $item = new Item();
                $item->encuesta_id = $id_encuesta;
                $item->name = $test1['items'][$i]['name'];
                $item->save();
                $id_item = $item->id;

                for($j=0; $j<count($test1['items'][$i]['frases']); $j++){

                    $frase = new Frase();
                    $frase->item_id = $id_item;
                    $frase->name = $test1['items'][$i]['frases'][$j]['name'];
                    $frase->save();
                    $id_frase = $frase->id;

                    for($x=0; $x<count($test1['items'][$i]['frases'][$j]['answers']); $x++){
                        $answer = new Answer();
                        $answer->name = $test1['items'][$i]['frases'][$j]['answers'][$x]['name'];
                        $answer->frase_id = $id_frase;
                        $answer->save();

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

        $encuestas = DB::table('users_encuestas')->where('evaluador_id', '=', $id)->where('status', '=', 0)->get();
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
        $encuesta = Encuesta::findOrFail($id);

        if($encuesta->is_active == 1){
            $encuesta->is_active  = 0;
            $encuesta->save();
        }else{
            $encuesta->is_active  = 1;
            $encuesta->save();
        }


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
        $evaluacion = Encuesta::find($id);
        $evaluacion->delete();
        
        return Response::json([
            'Success' => [
                'status_code' => 200
            ]
        ], 200);
        
    }


    public function assing_user()
    {
        return View('admin.assing_users');
    }

    public function encuestas_ready()
    {

       if (Request::isJson()) {
            $encuesta = DB::table('encuestas')
                ->join('users_encuestas', 'encuestas.id', '=', 'users_encuestas.encuesta_id')
                ->join('users', 'evaluador_id', '=', 'users.id')
                // ->join('companys', 'company_id', '=', 'companys.id')
                ->where('users_encuestas.status', '=', 1)->get();
            return  Response::json($encuesta);
        }else{
            return View('admin.encuesta_ready');
        }

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

    public function encuestas_respuesta($id)
    {

        $encuesta = DB::table('encuestas')
            ->join('users_encuestas', 'encuestas.id', '=', 'users_encuestas.encuesta_id')
            ->join('users', 'evaluador_id', '=', 'users.id')
            ->join('niveles', 'users_encuestas.niveles_id', '=', 'niveles.id')
            ->select('users.*', 'niveles.name as nivel')
            ->where('users_encuestas.evaluador_id', '=', $id)->get();

        $answers = DB::table('encuestas')
            ->join('users_encuestas', 'encuestas.id', '=', 'users_encuestas.encuesta_id')
            ->join('users', 'evaluador_id', '=', 'users.id')
            ->join('niveles', 'users_encuestas.niveles_id', '=', 'niveles.id')
            ->join('users_answers', 'users_encuestas.id', '=', 'users_answers.users_encuestas_id')
            ->join('answers', 'users_answers.answers_id', '=', 'answers.id')
            ->join('frases', 'answers.frase_id', '=', 'frases.id')
            ->select('users_answers.*', 'answers.name as respuesta', 'frases.name as pregunta')
            ->where('users_encuestas.evaluador_id', '=', $id)->get();


        $other_question = DB::table('others_questions')
            ->join('encuestas', 'encuestas.id', '=', 'others_questions.encuestas_id')
            ->join('users_answers_others_questions', 'users_answers_others_questions.others_questions_id', '=', 'others_questions.id')
            ->join('users_encuestas', 'users_encuestas.encuesta_id', '=', 'encuestas.id')
            ->join('users', 'users.id', '=', 'users_encuestas.evaluador_id')
/*            ->join('others_questions', 'others_questions.encuestas_id', '=', 'encuestas.id')
            ->join('users_answers_others_questions', 'users_answers_others_questions.others_questions_id', '=', 'others_questions.id')*/
            //->join('frases', 'answers.frase_id', '=', 'frases.id')
            ->select('others_questions.*', 'users_answers_others_questions.*')
            ->where('users_encuestas.evaluador_id', '=', $id)->get();


//        SELECT question,answers FROM encuesta360.others_questions join encuestas on encuestas.id = others_questions.encuestas_id join users_answers_others_questions on users_answers_others_questions.others_questions_id = others_questions.id join users_encuestas on users_encuestas.encuesta_id=encuestas.id join users on users.id=users_encuestas.evaluador_id where users.id=3;

            //->join('answers', 'users_answers.answers_id', '=', 'users_answers.id')->get();
            //->select('users_answers.*')->get();
            // ->join('companys', 'company_id', '=', 'companys.id')
            //->where('users_encuestas.status', '=', 1)->groupBy('encuestas.id')->get();
            //return  Response::json($encuesta);
            return Response::json([
                'Success' => [
                    'status_code' => 200,
                    'user' => $encuesta,
                    'answers'  => $answers,
                    'other_question' => $other_question
                ]
            ], 200);

    }






}
