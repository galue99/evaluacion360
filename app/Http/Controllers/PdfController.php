<?php

namespace App\Http\Controllers;

use Anam\PhantomMagick\Converter;
use App\User;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1()
    {
        $lava = new Lavacharts; // See note below for Laravel

        $votes  = $lava->DataTable();

        $votes->addStringColumn('Food Poll')
            ->addNumberColumn('Votes')
            ->addRow(['Tacos',  rand(1000,5000)])
            ->addRow(['Salad',  rand(1000,5000)])
            ->addRow(['Pizza',  rand(1000,5000)])
            ->addRow(['Apples', rand(1000,5000)])
            ->addRow(['Fish',   rand(1000,5000)]);

        $lava->BarChart('Votes', $votes);
        return View('pdf.encuesta', compact('lava'));
    }

    public function index()
    {
        /*$conv = new Converter();
        $conv->addPage('/home/edgar/PhpstormProjects/evaluacion360/resources/views/pdf/encuesta.blade.php')
            ->setBinary('../vendor/anam/phantomjs-linux-x86-binary/bin/phantomjs')
            ->toPdf()
            ->download('Reporte.pdf');*/

        $lava = new Lavacharts; // See note below for Laravel

        $votes  = $lava->DataTable();

        $votes->addStringColumn('Food Poll')
            ->addNumberColumn('Votes')
            ->addRow(['Tacos',  rand(1000,5000)])
            ->addRow(['Salad',  rand(1000,5000)])
            ->addRow(['Pizza',  rand(1000,5000)])
            ->addRow(['Apples', rand(1000,5000)])
            ->addRow(['Fish',   rand(1000,5000)]);

        $lava->BarChart('Votes', $votes);

        $view =  \View::make('pdf.encuesta', compact('lava'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
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
