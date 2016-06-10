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
    public function github(){
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
        $Jsiempre = 0;

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
                        $Jsiempre += $siempre;

                      /*  echo 'Rara Vez'.$rara_vez;
                        echo 'A veces'.$a_veces;
                        echo 'Nunca'.$nunca;
                        echo 'CAsi Siempre'.$casi_siempre;*/

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

            $array[$j] = array('id'=>$frases[$j]->id, 'name'=>($frases[$j]->name), 'siempre'=>$siempre, 'rara_vez'=>$rara_vez, 'a_veces'=>$a_veces, 'nunca'=>$nunca, 'casi_siempre'=>$casi_siempre);
            $nunca        = 0;
            $rara_vez     = 0;
            $a_veces      = 0;
            $casi_siempre = 0;
            $siempre      = 0;

        }
       // echo $Jsiempre;



        $nunca        = 0;
        $rara_vez     = 0;
        $a_veces      = 0;
        $casi_siempre = 0;
        $siempre      = 0;

        for($k=0; $k<count($items); $k++){
            $Jnunca        = 0;
            $Jrara_vez     = 0;
            $Ja_veces      = 0;
            $Jcasi_siempre = 0;
            $Jsiempre      = 0;
            $Pnunca        = 0;
            $Prara_vez     = 0;
            $Pa_veces      = 0;
            $Pcasi_siempre = 0;
            $Psiempre      = 0;
            $Snunca        = 0;
            $Srara_vez     = 0;
            $Sa_veces      = 0;
            $Scasi_siempre = 0;
            $Ssiempre      = 0;
            $Anunca        = 0;
            $Arara_vez     = 0;
            $Aa_veces      = 0;
            $Acasi_siempre = 0;
            $Asiempre      = 0;


            for($l=0; $l<count($answers); $l++){
                //   echo $items[$k]->id;
                if($items[$k]->id === $answers[$l]->item_id){

                    if($answers[$l]->name === 'Jefe'){
                        if($answers[$l]->respuesta === 'Siempre'){
                            $Jsiempre++;
                        }
                        if($answers[$l]->respuesta === 'Rara Vez'){
                            $Jrara_vez++;
                        }
                        if($answers[$l]->respuesta === 'a veces'){
                            $Ja_veces++;
                        }
                        if($answers[$l]->respuesta === 'Nunca'){
                            $Jnunca++;
                        }
                        if($answers[$l]->respuesta === 'Casi Siempre'){
                            $Jcasi_siempre++;
                        }

                    }else if($answers[$l]->name === 'Par'){
                        if($answers[$l]->respuesta === 'Siempre'){
                            $Psiempre++;
                        }
                        if($answers[$l]->respuesta === 'Rara Vez'){
                            $Prara_vez++;
                        }
                        if($answers[$l]->respuesta === 'a veces'){
                            $Pa_veces++;
                        }
                        if($answers[$l]->respuesta === 'Nunca'){
                            $Pnunca++;
                        }
                        if($answers[$l]->respuesta === 'Casi Siempre'){
                            $Pcasi_siempre++;
                        }

                    }else if($answers[$l]->name === 'Subordinado'){
                        if($answers[$l]->respuesta === 'Siempre'){
                            $Ssiempre++;
                        }
                        if($answers[$l]->respuesta === 'Rara Vez'){
                            $Srara_vez++;
                        }
                        if($answers[$l]->respuesta === 'a veces'){
                            $Sa_veces++;
                        }
                        if($answers[$l]->respuesta === 'Nunca'){
                            $Snunca++;
                        }
                        if($answers[$l]->respuesta === 'Casi Siempre'){
                            $Scasi_siempre++;
                        }
                    }

                }
            }


            if($Jsiempre === 0){
                $Jsiempre = 0;
            }else{
                $Jsiempre = floatval(($Jsiempre*5));
            }
            if($Jcasi_siempre === 0){
                $Jcasi_siempre = 0;
            }else{
                $Jcasi_siempre = floatval(($Jcasi_siempre*4));
            }
            if($Ja_veces === 0){
                $Ja_veces = 0;
            }else{
                $Ja_veces = floatval(($Ja_veces*3));
            }
            if($Jrara_vez === 0){
                $Jrara_vez = 0;
            }else{
                $Jrara_vez = floatval(($Jrara_vez*2));

            }
            if($Jnunca === 0){
                $Jnunca = 0;
            }else{
                $Jnunca = floatval(($Jnunca*1));
            }

            if($Psiempre === 0){
                $Psiempre = 0;
            }else{
                $Psiempre = floatval(($Psiempre*5));
            }
            if($Pcasi_siempre === 0){
                $Pcasi_siempre = 0;
            }else{
                $Pcasi_siempre = floatval(($Pcasi_siempre*4));
            }
            if($Pa_veces === 0){
                $Pa_veces = 0;
            }else{
                $Pa_veces = floatval(($Pa_veces*3));
            }
            if($Prara_vez === 0){
                $Prara_vez = 0;
            }else{
                $Prara_vez = floatval(($Prara_vez*2));
            }
            if($Pnunca === 0){
                $Pnunca = 0;
            }else{
                $Pnunca = floatval(($Pnunca*1));
            }


            if($Ssiempre === 0){
                $Ssiempre = 0;
            }else{
                $Ssiempre = floatval(($Ssiempre*5));
            }
            if($Scasi_siempre === 0){
                $Scasi_siempre = 0;
            }else{
                $Scasi_siempre = floatval(($Scasi_siempre*4));
            }
            if($Sa_veces === 0){
                $Sa_veces = 0;
            }else{
                $Sa_veces = floatval(($Sa_veces*3));
            }
            if($Srara_vez === 0){
                $Srara_vez = 0;
            }else{
                $Srara_vez = floatval(($Srara_vez*2));
            }
            if($Snunca === 0){
                $Snunca = 0;
            }else{
                $Snunca = floatval(($Snunca*1));
            }

            $result =  ($Jsiempre + $Jcasi_siempre + $Ja_veces + $Jrara_vez  + $Jnunca)/((count($answers)/count($items)));
            $result1 = ($Psiempre + $Pcasi_siempre + $Pa_veces + $Prara_vez  + $Pnunca)/((count($answers)/count($items)));
            $result2 = ($Ssiempre + $Scasi_siempre + $Sa_veces + $Srara_vez  + $Snunca)/((count($answers)/count($items)));
            //echo ($result).'<br>';


            $array1[$k] = array('id'=>$items[$k]->id, 'name'=>($items[$k]->name), 'Jefe'=>$result, 'Par'=>$result1, 'Supervisor'=>$result2, 'Auto-Evaluacion'=>5);

        }

        //return $array1;


       return View('pdf.encuesta', compact('array', 'array1'));
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

        $niveles = DB::table('niveles')
            ->join('users_encuestas', 'users_encuestas.niveles_id', '=', 'niveles.id')
            ->select('niveles.name')
            ->where('users_encuestas.encuesta_id', '=', $id)->get();

        //return $niveles;


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

       return $answers;
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
        $array2 =  array();


        $count = 0;
        $name = null;




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

                $array[$j] = array('id'=>$frases[$j]->id, 'name'=>($frases[$j]->name), 'siempre'=>$siempre, 'rara_vez'=>$rara_vez, 'a_veces'=>$a_veces, 'nunca'=>$nunca, 'casi_siempre'=>$casi_siempre);
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
            $Jnunca        = 0;
            $Jrara_vez     = 0;
            $Ja_veces      = 0;
            $Jcasi_siempre = 0;
            $Jsiempre      = 0;
            $Pnunca        = 0;
            $Prara_vez     = 0;
            $Pa_veces      = 0;
            $Pcasi_siempre = 0;
            $Psiempre      = 0;
            $Snunca        = 0;
            $Srara_vez     = 0;
            $Sa_veces      = 0;
            $Scasi_siempre = 0;
            $Ssiempre      = 0;
            $Anunca        = 0;
            $Arara_vez     = 0;
            $Aa_veces      = 0;
            $Acasi_siempre = 0;
            $Asiempre      = 0;






            for($l=0; $l<count($answers); $l++){
                //   echo $items[$k]->id;
                //echo $answers[$l]->name;
                if($items[$k]->id === $answers[$l]->item_id){

                    if(strtoupper($answers[$l]->name) === strtoupper('Jefe')){
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Siempre')){
                            $Jsiempre++;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Rara Vez')){
                            $Jrara_vez++;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('a veces')){
                            $Ja_veces++;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Nunca')){
                            $Jnunca++;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Casi Siempre')){
                            $Jcasi_siempre++;
                        }

                    }else if(strtoupper($answers[$l]->name) === strtoupper('Par')){
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Siempre')){
                            $Psiempre++;
                        }
                        if(strtoupper($answers[$l])->respuesta === strtoupper('Rara Vez')){
                            $Prara_vez++;
                        }
                        if(strtoupper($answers[$l])->respuesta === strtoupper('a veces')){
                            $Pa_veces++;
                        }
                        if(strtoupper($answers[$l])->respuesta === strtoupper('Nunca')){
                            $Pnunca++;
                        }
                        if(strtoupper($answers[$l])->respuesta === strtoupper('Casi Siempre')){
                            $Pcasi_siempre++;
                        }

                    }else if(strtoupper($answers[$l]->name) === strtoupper('Subordinado')){
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Siempre')){
                            $Ssiempre++;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Rara Vez')){
                            $Srara_vez++;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('a veces')){
                            $Sa_veces++;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Nunca')){
                            $Snunca++;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Casi Siempre')){
                            $Scasi_siempre++;
                        }
                    }elseif(strtoupper($answers[$l]->name) === strtoupper('Auto-Evaluacion')){

                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Siempre')){
                            $Asiempre++;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Rara Vez')){
                            $Arara_vez++;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('a veces')){
                            $Aa_veces++;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Nunca')){
                            $Anunca++;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Casi Siempre')){
                            $Acasi_siempre++;
                        }

                    }

                }
            }
           // echo $Jsiempre;

            if($Jsiempre === 0){
                $Jsiempre = 0;
            }else{
                //$Jsiempre = floatval(($Jsiempre*5));
            }
            if($Jcasi_siempre === 0){
                $Jcasi_siempre = 0;
            }else{
                $Jcasi_siempre = floatval(($Jcasi_siempre*4));
            }
            if($Ja_veces === 0){
                $Ja_veces = 0;
            }else{
                $Ja_veces = floatval(($Ja_veces*3));
            }
            if($Jrara_vez === 0){
                $Jrara_vez = 0;
            }else{
                $Jrara_vez = floatval(($Jrara_vez*2));

            }
            if($Jnunca === 0){
                $Jnunca = 0;
            }else{
                $Jnunca = floatval(($Jnunca*1));
            }

            if($Psiempre === 0){
                $Psiempre = 0;
            }else{
                $Psiempre = floatval(($Psiempre*5));
            }
            if($Pcasi_siempre === 0){
                $Pcasi_siempre = 0;
            }else{
                $Pcasi_siempre = floatval(($Pcasi_siempre*4));
            }
            if($Pa_veces === 0){
                $Pa_veces = 0;
            }else{
                $Pa_veces = floatval(($Pa_veces*3));
            }
            if($Prara_vez === 0){
                $Prara_vez = 0;
            }else{
                $Prara_vez = floatval(($Prara_vez*2));
            }
            if($Pnunca === 0){
                $Pnunca = 0;
            }else{
                $Pnunca = floatval(($Pnunca*1));
            }


            if($Ssiempre === 0){
                $Ssiempre = 0;
            }else{
                $Ssiempre = floatval(($Ssiempre*5));
            }
            if($Scasi_siempre === 0){
                $Scasi_siempre = 0;
            }else{
                $Scasi_siempre = floatval(($Scasi_siempre*4));
            }
            if($Sa_veces === 0){
                $Sa_veces = 0;
            }else{
                $Sa_veces = floatval(($Sa_veces*3));
            }
            if($Srara_vez === 0){
                $Srara_vez = 0;
            }else{
                $Srara_vez = floatval(($Srara_vez*2));
            }
            if($Snunca === 0){
                $Snunca = 0;
            }else{
                $Snunca = floatval(($Snunca*1));
            }


            if($Asiempre === 0){
                $Asiempre = 0;
            }else{
                $Asiempre = floatval(($Asiempre*5));
            }
            if($Acasi_siempre === 0){
                $Acasi_siempre = 0;
            }else{
                $Acasi_siempre = floatval(($Acasi_siempre*4));
            }
            if($Aa_veces === 0){
                $Aa_veces = 0;
            }else{
                $Aa_veces = floatval(($Aa_veces*3));
            }
            if($Arara_vez === 0){
                $Arara_vez = 0;
            }else{
                $Arara_vez = floatval(($Arara_vez*2));
            }
            if($Anunca === 0){
                $Anunca = 0;
            }else{
                $Anunca = floatval(($Anunca*1));
            }

            $result  =  ($Jsiempre + $Jcasi_siempre + $Ja_veces + $Jrara_vez  + $Jnunca)/((count($answers)/count($items)));
            $result1 =  ($Psiempre + $Pcasi_siempre + $Pa_veces + $Prara_vez  + $Pnunca)/((count($answers)/count($items)));
            $result2 =  ($Ssiempre + $Scasi_siempre + $Sa_veces + $Srara_vez  + $Snunca)/((count($answers)/count($items)));
            $result3 =  ($Asiempre + $Acasi_siempre + $Aa_veces + $Arara_vez  + $Anunca)/((count($answers)/count($items)));
           // echo $Jsiempre.'<br>';
            $array1[$k] = array('id'=>$items[$k]->id, 'name'=>($items[$k]->name), 'Jefe'=>$result, 'Par'=>$result1, 'Supervisor'=>$result2, 'Auto-Evaluacion'=>$result3);
        }

      //  var_dump($niveles);


       // $pdf = \PDF::loadView('pdf.encuesta', compact('array', 'array1'));
      //  return $pdf->stream('informe_individual.pdf');
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
