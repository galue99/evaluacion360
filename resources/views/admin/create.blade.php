@extends('layouts.layout')

@section('content')
<div class="row">
  <div class="col-xs-11 pull-center" id="crudTest">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">
          Encuestas
        </h3>
      </div>
      <div class="box-body">
        <div class="col-xs-12" data-bind="visible: !showFormTest()">
          <div class="row">
            <button class="btn btn-primary separate" data-bind="click: toggleForm"><i class="fa fa-plus"></i> Agregar Nuevo</button>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Cnt. Categorias</th>
                  <th>Cnt. Preguntas</th>
                  <th>Evaluadores Asignados</th>
                  <th>Admin de Evaluadores</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Encuesta de prueba</td>
                  <td>5</td>
                  <td>25</td>
                  <td>0</td>
                  <td>
                    <button class="btn btn-primary btn-xs" data-bind="click: showModal">Asginar Evaluadores</button>
                  </td>
                  <td>
                    <i class="fa fa-pencil fa-blue"></i>
                    <i class="fa fa-close fa-red"></i>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="row" data-bind="visible: showFormTest">
          <div class="col-xs-12">
            <div class="col-xs-10 col-md-6 form-inline">
              <div class="form-group">
                <label class="label-control">Nombre de Encuesta</label><br>
                <input type="text" class="form-control" datab-bind="textInput: formData().name">
                <button class="btn btn-sm btn-default" data-bind="click: $root.addItems"><i class="fa fa-plus"></i> Categoria</button>
              </div>
            </div>

            <div class="col-xs-12 content-form">
              <ul class="ul-first" data-bind="foreach: formData().items">
                <li>
                  <div class="form-group">
                    <h2>Categoria <span data-bind="text: items"></span>
                    <!-- <i class="fa fa-close pointer" data-bind="click: function(data,event) {$root.delItem(data)}"></i> -->
                      <button class="btn btn-xs btn-default" data-bind="click: $root.addFrase">
                        <i class="fa fa-plus"></i>Frases
                      </button>
                    </h2>
                  </div>
                  <ul class="ul-second" data-bind="foreach: frases">
                    <li class="form-inline">
                      <div class="form-group">
                        <label for="" class="label-control">Frase <strong data-bind="text: $index() + 1"></strong></label><br>
                        <input type="text" id="frase" class="form-control" data-bind="textInput: name">
                        <i class="fa fa-close pointer" data-bind="click: function(data,event) {$root.delFrase($parent,data)}"></i>
                        <button class="btn btn-sm btn-default" data-bind="click: $root.addAnswers">
                          <i class="fa fa-plus"></i> Respuestas
                        </button>
                      </div>
                      <ul class="ul-third form-inline" data-bind="foreach: answers">
                          <div class="form-group">
                            <label for="" class="label-control">Respuesta <span data-bind="textInput: $index"> </span></label><br>
                            <input type="text" id="answer" class="form-control" data-bind="textInput: name">
                            <i class="fa fa-close pointer" data-bind="click: function(data,event) {$root.delAnswer($parent,data)}"></i>
                          </div>
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
        <button class="btn btn-danger pull-right" data-bind="click: cancelCreateTest, visible: showFormTest"><i class="fa fa-plus"></i> Cancelar</button>
      </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Administracion de evaluadotres</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-xs-12">
                <div class="form-group form-inline">
                <label for="" class="label-control">Asignar evaluador</label><br>
                  <select class="form-control" name="" id="">
                    <option >Seleccione un evaluador</option>
                  </select>
                </div>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Rol</th>
                          <th>Nombre</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <td>Evaluador Centro 99</td>
                        <td>Thomas Edison</td>
                        <td>
                          <i class="fa fa-close fa-red"></i>
                        </td>
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>
@stop