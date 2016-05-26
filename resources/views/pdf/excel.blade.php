<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Document</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

</head>
<body>
<div class="cabecera">
    <div class="row">
        <div class="col-xs-2">

            <img src="/home/edgar/PhpstormProjects/evaluacion360/public/images/logo/360.png" class="img-responsive" alt="" width="160px" height="80px">
        </div>
    </div>
</div>


<div id="container" style="max-width: 400px; max-height: 800px; margin: 0 auto"></div>
<div id="container1" style="max-width: 400px; max-height: 800px; margin: 0 auto"></div>
<div id="container2" style="max-width: 400px; max-height: 800px; margin: 0 auto"></div>
<div id="container3" style="max-width: 400px; max-height: 800px; margin: 0 auto"></div>


</body>

<style>
    body{
        font-size: 14px;
    }
    .separate{
        min-height: 10px;
        width: 100%;
    }
    .fringe{
        background-color: #EF8E00;
        color: #fff;
        text-align: center;
        padding: 4px 0;
        font-size: 1em;
    }
    .fringe-status{
        height: 20px;
        width: 100px;
        background-color: #F8F3E4;
        border: solid 1px;
        margin: 4px;
    }
    .fringe-status.success{
        background-color: #00B948;
        border: none;
    }
    .fringe-status.warning{
        background-color: #F8FF00;
        border: none;
    }
    .fringe-status.danger{
        background-color: #FF0000;
        border: none;
    }
    .cabecera{
        border-bottom: solid 4px #FFA400;
    }
    .cabecera > div > div{
        padding-bottom: 5px;
    }
    h1.title{
        font-size: 1.2em;
        color: #4D4D4D;
    }
    h1.title i{
        font-size: 1.1em;
        color: #EF8E00;
    }
    p{
        font-size: 12px;
    }
    p.text{
        color: #222222;
        text-align: justify;
    }
    p.subtitle {
        font-size: 1em;
        font-weight: 500;
    }
    div.content-text-gris {
        background-color: #ECECEC;
        padding: 2px 20px 2px 20px;
    }
    div.content-text-gris ul > li {
        color: #EF8E00;
    }
    div.content-text-gris ul > li > span {
        color: black;
    }
    table td.diez{
        width: 10px;
    }
    .table.table-no-bordered>tbody>tr>td,
    .table.table-no-bordered>tbody>tr>th,
    .table.table-no-bordered>tfoot>tr>td,
    .table.table-no-bordered>tfoot>tr>th,
    .table.table-no-bordered>thead>tr>td,
    .table.table-no-bordered>thead>tr>th
    {
        padding: 2px 0 2px 0;
        border-color: transparent;
    }



    @media all {
        div.saltopagina{
            display: none;
        }
    }

    @media print{
        div.saltopagina{
            display:block;
            page-break-before:always;
        }
    }
</style>


</html>