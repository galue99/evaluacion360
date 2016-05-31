<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;


class PdfController extends Controller
{
    public function github (){
        // return \PDF::loadFile('http://www.github.com')->stream('github.pdf'); 
        //return \PDF::loadFile('http://www.github.com')->stream('github.pdf');
        return \PDF::loadFile('http://mejorar-se.com.ve/details')->stream('details.pdf');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1()
    {
       return View('pdf.encuesta');
    }

    public function index()
    {

        $id = 2;

        $users = DB::table('encuestas')
            ->join('users_encuestas', 'encuestas.id', '=', 'users_encuestas.encuesta_id')
            ->join('users', 'evaluador_id', '=', 'users.id')
            ->join('companys', 'companys.id', '=', 'users.company_id')
            ->join('niveles', 'users_encuestas.niveles_id', '=', 'niveles.id')
            ->select('users.id', 'niveles.name as nivel')
            ->where('encuestas.id', '=', $id)->get();

        $answers = DB::table('encuestas')
            ->join('users_encuestas', 'encuestas.id', '=', 'users_encuestas.encuesta_id')
            ->join('users', 'evaluador_id', '=', 'users.id')
            ->join('niveles', 'users_encuestas.niveles_id', '=', 'niveles.id')
            ->join('users_answers', 'users_encuestas.id', '=', 'users_answers.users_encuestas_id')
            ->join('answers', 'users_answers.answers_id', '=', 'answers.id')
            ->join('frases', 'answers.frase_id', '=', 'frases.id')
            ->join('items', 'frases.item_id', '=', 'items.id')
            ->select('users_answers.*', 'answers.name as respuesta', 'frases.id as id_pregunta', 'frases.name as pregunta', 'users_encuestas.evaluador_id', 'items.id as item_id', 'items.name as items_name', 'niveles.*')
            ->where('encuestas.id', '=', $id)->get();

        $frases = DB::table('items')
            ->join('encuestas', 'encuestas.id', '=', 'items.encuesta_id')
            ->join('frases', 'frases.item_id', '=', 'items.id')
            ->select('items.*', 'frases.*')
            ->where('encuestas.id', '=', $id)->get();

        $items = DB::table('items')
            ->join('encuestas', 'encuestas.id', '=', 'items.encuesta_id')
             ->select('items.*')
            ->where('encuestas.id', '=', $id)->get();


        $other_question = DB::table('others_questions')
            ->join('users_answers_others_questions', 'users_answers_others_questions.others_questions_id', '=', 'others_questions.id')
            ->join('users_answers', 'users_answers_others_questions.users_answers_id', '=', 'users_answers.id')
            ->join('users_encuestas', 'users_answers.users_encuestas_id', '=', 'users_encuestas.id')
           // ->select('others_questions.*', 'users_answers_others_questions.*')
            ->where('others_questions.encuestas_id', '=', $id)->get();


//        SELECT question,answers FROM encuesta360.others_questions join encuestas on encuestas.id = others_questions.encuestas_id join users_answers_others_questions on users_answers_others_questions.others_questions_id = others_questions.id join users_encuestas on users_encuestas.encuesta_id=encuestas.id join users on users.id=users_encuestas.evaluador_id where users.id=3;

        //->join('answers', 'users_answers.answers_id', '=', 'users_answers.id')->get();
        //->select('users_answers.*')->get();
        // ->join('companys', 'company_id', '=', 'companys.id')
        //->where('users_encuestas.status', '=', 1)->groupBy('encuestas.id')->get();
        //return  Response::json($encuesta);
        /*$conv = new Converter();
        $conv->addPage('/home/edgar/PhpstormProjects/evaluacion360/resources/views/pdf/encuesta.blade.php')
            ->setBinary('../vendor/anam/phantomjs-linux-x86-binary/bin/phantomjs')
            ->toPdf()
            ->download('Reporte.pdf');*/


        $const_nunca        = 1;
        $const_rara_vez     = 2;
        $const_a_veces      = 3;
        $const_casi_siempre = 4;
        $const_siempre      = 5;


        $nunca        = 0;
        $rara_vez     = 0;
        $a_veces      = 0;
        $casi_siempre = 0;
        $siempre      = 0;

        $jefe = null;
        $pares = null;
        $supervisores = null;
        $autoevaluacion = null;

        $array =  array();
        $array1 =  array();

       // var_dump($answers);

        for($j=0; $j<count($frases); $j++){
            for($i=0; $i<count($answers); $i++){
                if($frases[$j]->id === $answers[$i]->id_pregunta){
                    if($answers[$i]->name === 'Jefe'){
                        if($answers[$i]->respuesta === 'Siempre'){
                            $siempre++;
                        }
                        if($answers[$i]->respuesta === 'Rara Vez'){
                            $rara_vez++;
                        }
                        if($answers[$i]->respuesta === 'a veces'){
                            $a_veces++;
                        }
                        if($answers[$i]->respuesta === 'Nunca'){
                            $nunca++;
                        }
                        if($answers[$i]->respuesta === 'Casi Siempre'){
                            $casi_siempre++;
                        }

                    }else if($answers[$i]->name === 'Par'){
                        if($answers[$i]->respuesta === 'Siempre'){
                            $siempre++;

                        }
                        if($answers[$i]->respuesta === 'Rara Vez'){
                            $rara_vez++;
                        }
                        if($answers[$i]->respuesta === 'a veces'){
                            $a_veces++;
                        }
                        if($answers[$i]->respuesta === 'Nunca'){
                            $nunca++;

                        }
                        if($answers[$i]->respuesta === 'Casi Siempre'){
                            $casi_siempre++;

                        }


                    }else if($answers[$i]->name === 'Subordinado'){
                        if($answers[$i]->respuesta === 'Siempre'){
                            $siempre++;

                        }
                        if($answers[$i]->respuesta === 'Rara Vez'){
                            $rara_vez++;

                        }
                        if($answers[$i]->respuesta === 'a veces'){
                            $a_veces++;

                        }
                        if($answers[$i]->respuesta === 'Nunca'){
                            $nunca++;

                        }
                        if($answers[$i]->respuesta === 'Casi Siempre'){
                            $casi_siempre++;

                        }
                    }

                }
            }

                $array[$j] = array('id'=>$frases[$j]->id, 'name'=>utf8_decode($frases[$j]->name), 'siempre'=>$siempre, 'rara_vez'=>$rara_vez, 'a_veces'=>$a_veces, 'nunca'=>$nunca, 'casi_siempre'=>$casi_siempre);
                $nunca        = 0;
                $rara_vez     = 0;
                $a_veces      = 0;
                $casi_siempre = 0;
                $siempre      = 0;
        }




        $nunca        = 0;
        $rara_vez     = 0;
        $a_veces      = 0;
        $casi_siempre = 0;
        $siempre      = 0;

        for($k=0; $k<count($items); $k++){
            $nunca        = 0;
            $rara_vez     = 0;
            $a_veces      = 0;
            $casi_siempre = 0;
            $siempre      = 0;
            for($l=0; $l<count($answers); $l++){
             //   echo $items[$k]->id;
                if($items[$k]->id === $answers[$l]->item_id){
                    if($answers[$l]->name === 'Jefe'){
                        if($answers[$l]->respuesta === 'Siempre'){
                            $siempre++;
                        }
                        if($answers[$l]->respuesta === 'Rara Vez'){
                            $rara_vez++;
                        }
                        if($answers[$l]->respuesta === 'a veces'){
                            $a_veces++;
                        }
                        if($answers[$l]->respuesta === 'Nunca'){
                            $nunca++;
                        }
                        if($answers[$l]->respuesta === 'Casi Siempre'){
                            $casi_siempre++;
                        }

                    }else if($answers[$l]->name === 'Par'){
                        if($answers[$l]->respuesta === 'Siempre'){
                            $siempre++;

                        }
                        if($answers[$l]->respuesta === 'Rara Vez'){
                            $rara_vez++;
                        }
                        if($answers[$l]->respuesta === 'a veces'){
                            $a_veces++;
                        }
                        if($answers[$l]->respuesta === 'Nunca'){
                            $nunca++;

                        }
                        if($answers[$l]->respuesta === 'Casi Siempre'){
                            $casi_siempre++;

                        }


                    }else if($answers[$l]->name === 'Subordinado'){
                        if($answers[$l]->respuesta === 'Siempre'){
                            $siempre++;

                        }
                        if($answers[$l]->respuesta === 'Rara Vez'){
                            $rara_vez++;

                        }
                        if($answers[$l]->respuesta === 'a veces'){
                            $a_veces++;

                        }
                        if($answers[$l]->respuesta === 'Nunca'){
                            $nunca++;

                        }
                        if($answers[$l]->respuesta === 'Casi Siempre'){
                            $casi_siempre++;

                        }
                    }

                }

            }
           $array1[$k] = array('id'=>$items[$k]->id, 'name'=>utf8_decode($items[$k]->name), 'siempre'=>$siempre, 'rara_vez'=>$rara_vez, 'a_veces'=>$a_veces, 'nunca'=>$nunca, 'casi_siempre'=>$casi_siempre);


        }

        //var_dump($array);
        var_dump($array1);
        //$pdf = \PDF::loadView('pdf.encuesta', compact('answers', 'other_question'));
        //return $pdf->stream('invoice.pdf');
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
        //
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
    
    public function encuestas_ready()
    {
        $data = $this->getData();
        $date = date('Y-m-d');
        $encuestas_ready = "2222";
        $view =  \View::make('pdf.encuestas_ready', compact('data', 'date', 'encuestas_ready'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('encuestas_ready');
    }



    public function invoice()
    {
        $data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('pdf.invoice', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }

    public function getData()
    {
        $data =  [
            'quantity'      => '1' ,
            'description'   => 'some ramdom text',
            'price'   => '500',
            'total'     => '500'
        ];
        return $data;
    }

}
