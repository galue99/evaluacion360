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

    private function  cmp($a, $b)
    {
        if ($a['type_id'] == $b['type_id']) {
            return 0;
        }
        return ($a < $b) ? -1 : 1;
    }

    public function index1()
    {
        $id = 2;

        $users = DB::table('encuestas')
            ->join('users_encuestas', 'encuestas.id', '=', 'users_encuestas.encuesta_id')
            ->join('users', 'evaluador_id', '=', 'users.id')
            ->join('companys', 'companys.id', '=', 'users.company_id')
            ->join('niveles', 'users_encuestas.niveles_id', '=', 'niveles.id')
            ->select('users.id', 'niveles.name as nivel', 'niveles.id as id_nivel')
            ->where('users_encuestas.user_id', '=', $id)
            ->where('users_encuestas.encuesta_id', '=', $id)->get();

        $answers = DB::table('encuestas')
            ->join('users_encuestas', 'encuestas.id', '=', 'users_encuestas.encuesta_id')
            ->join('users', 'evaluador_id', '=', 'users.id')
            ->join('niveles', 'users_encuestas.niveles_id', '=', 'niveles.id')
            ->join('users_answers', 'users_encuestas.id', '=', 'users_answers.users_encuestas_id')
            ->join('answers', 'users_answers.answers_id', '=', 'answers.id')
            ->join('frases', 'answers.frase_id', '=', 'frases.id')
            ->join('items', 'frases.item_id', '=', 'items.id')
            ->select('users_answers.*', 'answers.name as respuesta', 'frases.id as id_pregunta', 'frases.name as pregunta', 'users_encuestas.evaluador_id', 'items.id as item_id', 'items.name as items_name', 'niveles.*')
            ->where('users_encuestas.user_id', '=', $id)
            ->where('users_encuestas.encuesta_id', '=', $id)->get();

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
            ->select('others_questions.*', 'users_answers_others_questions.*')
            ->where('others_questions.encuestas_id', '=', $id)
            ->where('users_encuestas.user_id', '=', $id)->get();


        $other_questions = DB::table('others_questions')
            ->where('others_questions.encuestas_id', '=', $id)->get();

        $tipos = DB::table('tipos')->get();


        $niveles = DB::table('niveles')
            ->join('users_encuestas', 'users_encuestas.niveles_id', '=', 'niveles.id')
            ->select('niveles.name')
            ->where('users_encuestas.encuesta_id', '=', $id)->get();



        $u = count($users);

        $arrayUser = array();
        $countJ = 0;
        $countP = 0;
        $countS = 0;
        $countA = 0;
        $countC = 0;

        for($i=0; $i<count($users); $i++){
            if($users[$i]->nivel === 'Jefe'){
                $countJ++;
            }else if($users[$i]->nivel === 'Par'){
                $countP++;
            }else if($users[$i]->nivel === 'Supervisado'){
                $countS++;
            }else if($users[$i]->nivel === 'Auto-Evaluación'){
                $countA++;
            }else if($users[$i]->nivel === 'Cliente'){
                $countC++;
            }
        }


        $array4 = array();

        for($i=0; $i<count($other_questions); $i++){
            for($j=0; $j<count($other_question); $j++){
                if($other_question[$j]->others_questions_id === $other_questions[$i]->id){
                    $array4[$i][$j] = array('id_question'=>$other_questions[$i]->id, 'question'=>$other_question[$j]->question, 'Respuesta' =>$other_question[$j]->answers);

                }


            }

        }


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

        $jefe = null;
        $pares = null;
        $supervisores = null;
        $autoevaluacion = null;

        $result = 0;

        $array =  array();
        $array1 =  array();
        $array2 =  array();
        $array3 =  array();
        $array5 =  array();

        $name = null;
        $count = 0;
        $name = null;

        for($k=0; $k<count($items); $k++){
            for($i=0; $i<count($frases); $i++){
                if($frases[$i]->item_id === $items[$k]->id){
                    $array[$k][$i] = array("items"=>$items[$k]->name, "id"=>$i, "id_frase"=>$frases[$i]->id, "frase" => $frases[$i]->name);
                }
            }
        }



        for($k=0; $k<count($frases); $k++){
            $jefe = 0;
            $pares = 0;
            $supervisores = 0;
            $autoevaluacion = 0;

            $Ja_veces = 0;
            $Jrara_vez = 0;
            $Ja_veces= 0;
            $Jnunca = 0;
            $Jcasi_siempre = 0;
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

            for($l=0; $l<count($answers); $l++) {
                if ($frases[$k]->id === $answers[$l]->id_pregunta) {
                    if(strtoupper($answers[$l]->name) === strtoupper('Jefe')){
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Siempre')){
                            $Jsiempre+=5;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Rara Vez')){
                            $Jrara_vez+=2;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('a veces')){
                            $Ja_veces+=3;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Nunca')){
                            $Jnunca+=1;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Casi Siempre')){
                            $Jcasi_siempre+=4;
                        }

                    }

                    if(strtoupper($answers[$l]->name) === strtoupper('Par')){
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Siempre')){
                            $Psiempre+=5;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Rara Vez')){
                            $Prara_vez+=2;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('a veces')){
                            $Pa_veces+=3;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Nunca')){
                            $Pnunca+=1;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Casi Siempre')){
                            $Pcasi_siempre+=4;
                        }
                    }else if(strtoupper($answers[$l]->name) === strtoupper('Subordinado')){
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Siempre')){
                            $Ssiempre+=5;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Rara Vez')){
                            $Srara_vez+=3;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('a veces')){
                            $Sa_veces+=2;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Nunca')){
                            $Snunca+=1;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Casi Siempre')){
                            $Scasi_siempre+=4;
                        }
                    }elseif(strtoupper($answers[$l]->name) === strtoupper('Auto-Evaluación')){

                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Siempre')){
                            $Asiempre+=5;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Rara Vez')){
                            $Arara_vez+=3;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('a veces')){
                            $Aa_veces+=2;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Nunca')){
                            $Anunca+=1;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Casi Siempre')){
                            $Acasi_siempre+=4;
                        }

                    }


                    if($Jsiempre !== 0){
                        $jefe += ($Jsiempre);
                    }else if($Jcasi_siempre !== 0){
                        $jefe += ($Jcasi_siempre);
                    }else if($Jrara_vez !== 0){
                        $jefe += ($Jrara_vez);
                    }else if($Ja_veces !== 0){
                        $jefe += $Ja_veces;
                    }else if($Jnunca !== 0){
                        $jefe += ($Jnunca);
                    }

                    if($Psiempre !== 0){
                        $pares += ($Psiempre/$countP);
                    }else if($Pcasi_siempre !== 0){
                        $pares +=  ($Pcasi_siempre/$countP);
                    }else if($Prara_vez !== 0){
                        $pares +=  ($Prara_vez/$countP);
                    }else if($Pa_veces !== 0){
                        $pares +=  ($Pa_veces/$countP);
                    }else if($Pnunca !== 0){
                        $pares +=  ($Pnunca/$countP);
                    }

                    if($Asiempre !== 0){
                        $autoevaluacion += ($Asiempre/$countA);
                    }else if($Acasi_siempre !== 0){
                        $autoevaluacion +=  ($Acasi_siempre/$countA);
                    }else if($Arara_vez !== 0){
                        $autoevaluacion +=  ($Arara_vez/$countA);
                    }else if($Aa_veces !== 0){
                        $autoevaluacion +=  ($Aa_veces/$countA);
                    }else if($Anunca !== 0){
                        $autoevaluacion +=  ($Anunca/$countA);
                    }

                    if($Ssiempre !== 0){
                        $supervisores += ($Ssiempre/$countS);
                    }else if($Scasi_siempre !== 0){
                        $supervisores +=  ($Scasi_siempre/$countS);
                    }else if($Srara_vez !== 0){
                        $supervisores +=  ($Srara_vez/$countS);
                    }else if($Sa_veces !== 0){
                        $supervisores +=  ($Sa_veces/$countS);
                    }else if($Snunca !== 0){
                        $supervisores +=  ($Snunca/$countS);
                    }

                    $Psiempre=0;
                    $Jsiempre=0;
                    $Jrara_vez = 0;
                    $Ja_veces = 0;
                    $Pcasi_siempre = 0;
                    $Jcasi_siempre = 0;

                    $array3[$k] = array('id'=>$frases[$k]->id, "id"=>$answers[$l]->id_pregunta, "Jefe"=>$jefe,"Par"=>$pares,"Subordinado"=>$supervisores,"Auto-Evaluacion"=>$autoevaluacion);
                    // $jefe = 0;
                    // echo $jefe.'<br>';

                }

            }
        }



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

                if($items[$k]->id === $answers[$l]->item_id){

                    if(strtoupper($answers[$l]->name) === strtoupper('Jefe')){
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Siempre')){
                            $Jsiempre+=5;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Rara Vez')){
                            $Jrara_vez+=2;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('a veces')){
                            $Ja_veces+=3;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Nunca')){
                            $Jnunca+=1;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Casi Siempre')){
                            $Jcasi_siempre+=4;
                        }

                    }else if(strtoupper($answers[$l]->name) === strtoupper('Par')){
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Siempre')){
                            $Psiempre+=5;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Rara Vez')){
                            $Prara_vez+=2;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('a veces')){
                            $Pa_veces+=3;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Nunca')){
                            $Pnunca+=1;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Casi Siempre')){
                            $Pcasi_siempre+=4;
                        }

                    }else if(strtoupper($answers[$l]->name) === strtoupper('Subordinado')){
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Siempre')){
                            $Ssiempre+=5;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Rara Vez')){
                            $Srara_vez+=2;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('a veces')){
                            $Sa_veces+=3;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Nunca')){
                            $Snunca+=1;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Casi Siempre')){
                            $Scasi_siempre+=4;
                        }
                    }elseif(strtoupper($answers[$l]->name) === strtoupper('Auto-Evaluación')){

                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Siempre')){
                            $Asiempre+=5;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Rara Vez')){
                            $Arara_vez+=2;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('a veces')){
                            $Aa_veces+=3;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Nunca')){
                            $Anunca+=1;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Casi Siempre')){
                            $Acasi_siempre+=4;
                        }

                    }

                }
            }

            $result  =  ($Jsiempre+$Jrara_vez+$Jcasi_siempre+$Ja_veces+$Jnunca)/((count($frases)/count($items)));
            $result1 =  ($Psiempre + $Pcasi_siempre + $Pa_veces + $Prara_vez  + $Pnunca)/((count($frases)/count($items)));
            $result2 =  ($Ssiempre + $Scasi_siempre + $Sa_veces + $Srara_vez  + $Snunca)/((count($frases)/count($items)));
            $result3 =  ($Asiempre + $Acasi_siempre + $Aa_veces + $Arara_vez  + $Anunca)/((count($frases)/count($items)));
            $array1[$k] = array('id'=>$items[$k]->id, 'type_id' =>$items[$k]->type_id,'name'=>($items[$k]->name), 'Jefe'=>$result, 'Par'=>$result1, 'Supervisor'=>$result2, 'Auto-Evaluacion'=>$result3);
        }

     //   return$items;


        for($k=0; $k<count($array1); $k++){

            $array5[$k] = array('id'=>$array1[$k]['id'], 'type_id' =>$array1[$k]['type_id'],'name'=>($array1[$k]['name']), 'Jefe'=>$array1[$k]['Jefe'], 'Par'=>$array1[$k]['Par'], 'Supervisor'=>$array1[$k]['Supervisor'], 'Auto-Evaluacion'=>$array1[$k]['Auto-Evaluacion']);

        }

        usort($array5, array($this,"cmp"));

        //return $array5;

        return View('pdf.encuesta', compact('array', 'array1', 'array2', 'array3', 'array4', 'array5'));
    }

    public function index()
    {

        $id = 2;

        $users = DB::table('encuestas')
            ->join('users_encuestas', 'encuestas.id', '=', 'users_encuestas.encuesta_id')
            ->join('users', 'evaluador_id', '=', 'users.id')
            ->join('companys', 'companys.id', '=', 'users.company_id')
            ->join('niveles', 'users_encuestas.niveles_id', '=', 'niveles.id')
            ->select('users.id', 'niveles.name as nivel', 'niveles.id as id_nivel')
            ->where('users_encuestas.user_id', '=', $id)
            ->where('users_encuestas.encuesta_id', '=', $id)->get();

        $answers = DB::table('encuestas')
            ->join('users_encuestas', 'encuestas.id', '=', 'users_encuestas.encuesta_id')
            ->join('users', 'evaluador_id', '=', 'users.id')
            ->join('niveles', 'users_encuestas.niveles_id', '=', 'niveles.id')
            ->join('users_answers', 'users_encuestas.id', '=', 'users_answers.users_encuestas_id')
            ->join('answers', 'users_answers.answers_id', '=', 'answers.id')
            ->join('frases', 'answers.frase_id', '=', 'frases.id')
            ->join('items', 'frases.item_id', '=', 'items.id')
            ->select('users_answers.*', 'answers.name as respuesta', 'frases.id as id_pregunta', 'frases.name as pregunta', 'users_encuestas.evaluador_id', 'items.id as item_id', 'items.name as items_name', 'niveles.*')
            ->where('users_encuestas.user_id', '=', $id)
            ->where('users_encuestas.encuesta_id', '=', $id)->get();

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
            ->select('others_questions.*', 'users_answers_others_questions.*')
            ->where('others_questions.encuestas_id', '=', $id)
            ->where('users_encuestas.user_id', '=', $id)->get();


        $other_questions = DB::table('others_questions')
            ->where('others_questions.encuestas_id', '=', $id)->get();




        $niveles = DB::table('niveles')
            ->join('users_encuestas', 'users_encuestas.niveles_id', '=', 'niveles.id')
            ->select('niveles.name')
            ->where('users_encuestas.encuesta_id', '=', $id)->get();






        $u = count($users);

        $arrayUser = array();
        $countJ = 0;
        $countP = 0;
        $countS = 0;
        $countA = 0;
        $countC = 0;

        for($i=0; $i<count($users); $i++){
            if($users[$i]->nivel === 'Jefe'){
                $countJ++;
            }else if($users[$i]->nivel === 'Par'){
                $countP++;
            }else if($users[$i]->nivel === 'Supervisado'){
                $countS++;
            }else if($users[$i]->nivel === 'Auto-Evaluación'){
                $countA++;
            }else if($users[$i]->nivel === 'Cliente'){
                $countC++;
            }
        }


        $array4 = array();

        for($i=0; $i<count($other_questions); $i++){
            for($j=0; $j<count($other_question); $j++){
                if($other_question[$j]->others_questions_id === $other_questions[$i]->id){
                    $array4[$i][$j] = array('id_question'=>$other_questions[$i]->id, 'question'=>$other_question[$j]->question, 'Respuesta' =>$other_question[$j]->answers);

                }


            }

        }


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

        $jefe = null;
        $pares = null;
        $supervisores = null;
        $autoevaluacion = null;

        $result = 0;

        $array =  array();
        $array1 =  array();
        $array2 =  array();
        $array3 =  array();
        $array5 =  array();

        $name = null;
        $count = 0;
        $name = null;

        for($k=0; $k<count($items); $k++){
            for($i=0; $i<count($frases); $i++){
                if($frases[$i]->item_id === $items[$k]->id){
                    $array[$k][$i] = array("items"=>$items[$k]->name, "id"=>$i, "id_frase"=>$frases[$i]->id, "frase" => $frases[$i]->name);
                }
            }
        }



        for($k=0; $k<count($frases); $k++){
            $jefe = 0;
            $pares = 0;
            $supervisores = 0;
            $autoevaluacion = 0;

            $Ja_veces = 0;
            $Jrara_vez = 0;
            $Ja_veces= 0;
            $Jnunca = 0;
            $Jcasi_siempre = 0;
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

            for($l=0; $l<count($answers); $l++) {
                if ($frases[$k]->id === $answers[$l]->id_pregunta) {
                    if(strtoupper($answers[$l]->name) === strtoupper('Jefe')){
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Siempre')){
                            $Jsiempre+=5;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Rara Vez')){
                            $Jrara_vez+=2;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('a veces')){
                            $Ja_veces+=3;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Nunca')){
                            $Jnunca+=1;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Casi Siempre')){
                            $Jcasi_siempre+=4;
                        }

                    }

                    if(strtoupper($answers[$l]->name) === strtoupper('Par')){
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Siempre')){
                            $Psiempre+=5;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Rara Vez')){
                            $Prara_vez+=2;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('a veces')){
                            $Pa_veces+=3;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Nunca')){
                            $Pnunca+=1;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Casi Siempre')){
                            $Pcasi_siempre+=4;
                        }
                    }else if(strtoupper($answers[$l]->name) === strtoupper('Subordinado')){
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Siempre')){
                            $Ssiempre+=5;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Rara Vez')){
                            $Srara_vez+=3;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('a veces')){
                            $Sa_veces+=2;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Nunca')){
                            $Snunca+=1;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Casi Siempre')){
                            $Scasi_siempre+=4;
                        }
                    }elseif(strtoupper($answers[$l]->name) === strtoupper('Auto-Evaluación')){

                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Siempre')){
                            $Asiempre+=5;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Rara Vez')){
                            $Arara_vez+=3;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('a veces')){
                            $Aa_veces+=2;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Nunca')){
                            $Anunca+=1;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Casi Siempre')){
                            $Acasi_siempre+=4;
                        }

                    }


                    if($Jsiempre !== 0){
                        $jefe += ($Jsiempre);
                    }else if($Jcasi_siempre !== 0){
                        $jefe += ($Jcasi_siempre);
                    }else if($Jrara_vez !== 0){
                        $jefe += ($Jrara_vez);
                    }else if($Ja_veces !== 0){
                        $jefe += $Ja_veces;
                    }else if($Jnunca !== 0){
                        $jefe += ($Jnunca);
                    }

                    if($Psiempre !== 0){
                        $pares += ($Psiempre/$countP);
                    }else if($Pcasi_siempre !== 0){
                        $pares +=  ($Pcasi_siempre/$countP);
                    }else if($Prara_vez !== 0){
                        $pares +=  ($Prara_vez/$countP);
                    }else if($Pa_veces !== 0){
                        $pares +=  ($Pa_veces/$countP);
                    }else if($Pnunca !== 0){
                        $pares +=  ($Pnunca/$countP);
                    }

                    if($Asiempre !== 0){
                        $autoevaluacion += ($Asiempre/$countA);
                    }else if($Acasi_siempre !== 0){
                        $autoevaluacion +=  ($Acasi_siempre/$countA);
                    }else if($Arara_vez !== 0){
                        $autoevaluacion +=  ($Arara_vez/$countA);
                    }else if($Aa_veces !== 0){
                        $autoevaluacion +=  ($Aa_veces/$countA);
                    }else if($Anunca !== 0){
                        $autoevaluacion +=  ($Anunca/$countA);
                    }

                    if($Ssiempre !== 0){
                        $supervisores += ($Ssiempre/$countS);
                    }else if($Scasi_siempre !== 0){
                        $supervisores +=  ($Scasi_siempre/$countS);
                    }else if($Srara_vez !== 0){
                        $supervisores +=  ($Srara_vez/$countS);
                    }else if($Sa_veces !== 0){
                        $supervisores +=  ($Sa_veces/$countS);
                    }else if($Snunca !== 0){
                        $supervisores +=  ($Snunca/$countS);
                    }

                    $Psiempre=0;
                    $Jsiempre=0;
                    $Jrara_vez = 0;
                    $Ja_veces = 0;
                    $Pcasi_siempre = 0;
                    $Jcasi_siempre = 0;

                    $array3[$k] = array('id'=>$frases[$k]->id, "id"=>$answers[$l]->id_pregunta, "Jefe"=>$jefe,"Par"=>$pares,"Subordinado"=>$supervisores,"Auto-Evaluacion"=>$autoevaluacion);
                    // $jefe = 0;
                    // echo $jefe.'<br>';

                }

            }
        }



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

                if($items[$k]->id === $answers[$l]->item_id){

                    if(strtoupper($answers[$l]->name) === strtoupper('Jefe')){
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Siempre')){
                            $Jsiempre+=5;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Rara Vez')){
                            $Jrara_vez+=2;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('a veces')){
                            $Ja_veces+=3;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Nunca')){
                            $Jnunca+=1;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Casi Siempre')){
                            $Jcasi_siempre+=4;
                        }

                    }else if(strtoupper($answers[$l]->name) === strtoupper('Par')){
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Siempre')){
                            $Psiempre+=5;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Rara Vez')){
                            $Prara_vez+=2;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('a veces')){
                            $Pa_veces+=3;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Nunca')){
                            $Pnunca+=1;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Casi Siempre')){
                            $Pcasi_siempre+=4;
                        }

                    }else if(strtoupper($answers[$l]->name) === strtoupper('Subordinado')){
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Siempre')){
                            $Ssiempre+=5;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Rara Vez')){
                            $Srara_vez+=2;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('a veces')){
                            $Sa_veces+=3;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Nunca')){
                            $Snunca+=1;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Casi Siempre')){
                            $Scasi_siempre+=4;
                        }
                    }elseif(strtoupper($answers[$l]->name) === strtoupper('Auto-Evaluación')){

                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Siempre')){
                            $Asiempre+=5;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Rara Vez')){
                            $Arara_vez+=2;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('a veces')){
                            $Aa_veces+=3;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Nunca')){
                            $Anunca+=1;
                        }
                        if(strtoupper($answers[$l]->respuesta) === strtoupper('Casi Siempre')){
                            $Acasi_siempre+=4;
                        }

                    }

                }
            }

            $result  =  ($Jsiempre+$Jrara_vez+$Jcasi_siempre+$Ja_veces+$Jnunca)/((count($frases)/count($items)));
            $result1 =  ($Psiempre + $Pcasi_siempre + $Pa_veces + $Prara_vez  + $Pnunca)/((count($frases)/count($items)));
            $result2 =  ($Ssiempre + $Scasi_siempre + $Sa_veces + $Srara_vez  + $Snunca)/((count($frases)/count($items)));
            $result3 =  ($Asiempre + $Acasi_siempre + $Aa_veces + $Arara_vez  + $Anunca)/((count($frases)/count($items)));
            $array1[$k] = array('id'=>$items[$k]->id, 'type_id' =>$items[$k]->type_id,'name'=>($items[$k]->name), 'Jefe'=>$result, 'Par'=>$result1, 'Supervisor'=>$result2, 'Auto-Evaluacion'=>$result3);
        }

        //   return$items;


        for($k=0; $k<count($array1); $k++){

            $array5[$k] = array('id'=>$array1[$k]['id'], 'type_id' =>$array1[$k]['type_id'],'name'=>($array1[$k]['name']), 'Jefe'=>$array1[$k]['Jefe'], 'Par'=>$array1[$k]['Par'], 'Supervisor'=>$array1[$k]['Supervisor'], 'Auto-Evaluacion'=>$array1[$k]['Auto-Evaluacion']);

        }

        usort($array5, array($this,"cmp"));


       // return $answers;
        $pdf = \PDF::loadView('pdf.encuesta', compact('array', 'array1', 'array3', 'array4', 'array5'));
        $pdf->setOption('orientation', 'landscape');

        return $pdf->stream('informe_individual.pdf');
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
