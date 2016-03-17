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
                  <div class="col-xs-12">
                    <div class="form-group col-xs-4">
                      <label for="" class="label-control">Nombre de encuesta</label>
                      <input type="text" class="form-control"><i class="fa fa-plus" data-bind="click: $root.addItems"></i>
                    </div>
                  </div>
                    <ul data-bind="foreach: formData().items">
                      <li class="col-xs-8">
                        <label for="" data-bind="text: 'Item ' + items"></label><i class="fa fa-plus pointer fa-2x" data-bind="click: $root.addFrase"></i>
                        <ul data-bind="foreach: frases">
                          <li class="col-xs-8">
                            <label for="" class="label-control">Pregunta</label>
                            <input type="text" class="form-control" data-bind="textInput: name"><i class="fa fa-plus pointer fa-2x" data-bind="click: $root.addAnswers"></i>
                              <ul data-bind="foreach: answers">
                                <li class="col-xs-6">
                                  <label for="" class="label-control">Respuesta</label>
                                  <input type="text" class="form-control" data-bind="textInput: name">
                                </li>
                              </ul>
                          </li>
                        </ul>
                      </li>
                    </ul>

<!--                   <div class="col-xs-12">
                    <form class="form form-inline">
                      <div class="col-xs-12">
                        <div class="col-xs-6">
                          <div class="form-group">
                            <label for="" class="label-control">Encuesta:</label></br>
                            <input type="text" class="form-control col-xs-6" data-bind="textInput: name">
                            <i class="fa fa-plus pointer fa-2x" data-bind="click: $root.addItems"></i>
                          </div>
                        </div>
                      </div>
                      <div class="colxs-12" data-bind="foreach: formData().items">
                        <div class="col-xs-12">
                          <div class="col-xs-3">
                            <div class="form-group">
                              <label data-bind="text: 'Item ' + items"></label> <i class="fa fa-plus pointer fa-2x" data-bind="click: $root.addFrase"></i>
                            </div>
                          </div>
                          <div class="col-xs-3" data-bind="foreach: frases">
                            <div class="form-group">
                              <input type="text" data-bind="textInput: name">
                            </div>
                          </div>

                        </div>
                      </div>
                    </form>
                  </div> -->
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>
@stop