@extends('layouts.layout')

@section('content')
<div class="row">
  <div class="col-xs-11 pull-center" id="crudTest">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">
          Crear Encuesta
        </h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-xs-12">
            <div class="col-xs-10 col-md-6 form-inline">
              <div class="form-group">
                <label class="label-control">Nombre de Encuesta</label><br>
                <input type="text" class="form-control">
                <button class="btn btn-sm btn-default" data-bind="click: $root.addItems"><i class="fa fa-plus"></i> Categoria</button>
              </div>
            </div>
            
            <div class="row"><div class="box-divider col-xs-12"></div></div>

            <div class="col-xs-12">
              <ul class="ul-first" data-bind="foreach: formData().items">
                <li>
                  <div class="form-group">
                    <h2>Categoria <span data-bind="text: items"></span>
                      <button class="btn btn-xs btn-default" data-bind="click: $root.addFrase">
                        <i class="fa fa-plus"></i>Frase
                      </button>
                    </h2>
                  </div>
                  <ul class="ul-second" data-bind="foreach: frases">
                    <li class="form-inline">
                      <div class="form-group">
                        <label for="" class="label-control">Frase</label><br>
                        <input type="text" class="form-control" data-bind="textInput: name">
                        <button class="btn btn-sm btn-default" data-bind="click: $root.addAnswers">
                          <i class="fa fa-plus"></i> Respuestas
                        </button>
                      </div>
                      <ul class="ul-third" data-bind="foreach: answers">
                        <li>
                          <div class="form-group">
                            <label for="" class="label-control">Respuesta <span data-bind="textInput: $index"> </span></label><br>
                            <input type="text" class="form-control" data-bind="textInput: name"><i class="fa fa-minus pointer" data-bind="click: $root.delAnswers"></i>
                          </div>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="box-footer">

      </div>
    </div>
  </div>
</div>
@stop