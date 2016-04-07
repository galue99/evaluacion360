@extends('layouts.layout')

@section('content')
<div class="row">
   <div class="col-xs-12" id="crudTest">
      <div class="box box-primary" data-bind="visible: showAdminTes">
         <div class="box-header with-border">
            <h3 class="box-title">
               Evaluacion
            </h3>
         </div>
         <div class="box-body">
            <div class="col-xs-12" data-bind="visible: !showFormTest()">
               <div class="row">
                  <button class="btn btn-info separate btn-flat" data-bind="click: toggleForm"><i class="fa fa-plus"></i> Agregar Nuevo</button>
                  <div class="table-responsive">
                     <table class="table table-striped table-bordered">
                        <thead>
                           <tr>
                              <th>Nombre</th>
                              <th>Estado</th>
                              <th>Acciones</th>
                                <th class="col-xs-1 text-center">Administrar</th>
                           </tr>
                        </thead>
                        <tbody data-bind="foreach: tests">
                           <tr>
                              <td data-bind="text: name" class="text-center"></td>
                              <td data-bind="text: is_active == 1 ? 'Activa' : 'Inactiva' "></td>
                              <td>
                                 <i class="fa fa-pencil fa-blue pointer"></i>
                                 <i class="fa fa-close fa-red pointer"></i>
                              </td>
                                 <td>
                                    <div class="form-group">
                                       <button class="btn btn-info btn-xs" data-bind="click: $root.toggleFormAdminTes">Administrar</button>
                                    </div>
                                 </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>

            <div class="row" data-bind="visible: showFormTest">

               <div class="col-xs-12">
                  <div class="col-xs-10 col-md-6 form-inline">
                     <div class="form-group">
                        <label class="label-control">Nombre de Encuesta</label><br>
                        <input type="text" id="nameTest" class="form-control" data-bind="textInput: formData().name">
                        <button class="btn btn-xs btn-default" data-bind="click: $root.addItems"><i class="fa fa-plus"></i> Categoria</button>
                     </div>
                  </div>

                  <div class="col-xs-12 content-form">
                     <ul class="ul-first" data-bind="foreach: formData().items">
                        <li>
                           <div class="form-group">
                              <h2>Categoria <span data-bind="text: $index() + 1"></span>
                                 <i class="fa fa-close pointer" data-bind="click: $root.delItem"></i>
                                 <button class="btn btn-xs btn-default" data-bind="click: $root.addFrase">
                                    <i class="fa fa-plus"></i>Frases
                                 </button>
                              </h2>
                           </div>
                           <ul class="ul-second col-xs-12" data-bind="foreach: frases">
                              <li>
                                 <div class="form-group">
                                    <label for="" class="label-control">Frase
                                       <strong data-bind="text: $index() + 1"></strong>
                                       <i class="fa fa-close pointer" data-bind="click: function(data,event) {$root.delFrase($parent,data)}"></i>
                                    </label>
                                    <br>
                                    <input type="text" id="frase" class="form-control" data-bind="textInput: name">
                                    <button class="btn btn-xs btn-default" data-bind="click: $root.addAnswers">
                                       <i class="fa fa-plus"></i> Respuestas
                                    </button>
                                 </div>
                                 <ul class="ul-third col-xs-12" data-bind="foreach: answers">
                                    <div class="form-group col-xs-6 col-md-2">
                                       <label for="" class="label-control">Respuesta
                                          <span data-bind="textInput: $index"> </span>
                                          <i class="fa fa-close pointer" data-bind="click: function(data,event) {$root.delAnswer($parent,data)}"></i>
                                       </label><br>
                                       <input type="text" id="answer" class="form-control" data-bind="textInput: name">
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
            <button class="btn btn-danger pull-left btn-flat" data-bind="click: clearFormTest, visible: showFormTest"><i class="fa fa-plus"></i> Cancelar</button>
            <button class="btn btn-info pull-right btn-flat" data-bind="click: save, visible: showFormTest">Enviar</button>
         </div>
      </div>

      <div id="myModal" class="modal fade" role="dialog">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span></button>
                     <h4 class="modal-title">Administracion de encuesta</h4>
                  </div>
                  <div class="modal-body">
                     <button class="btn btn-info btn-flat btn-xs separate" data-bind="click: toggleAdmin"><i class="fa fa-plus"></i> Agregar Evaluador</button>
                     <button class="btn btn-info btn-xs btn-flat separate" data-bind="click: toggleAdmin"><i class="fa fa-plus"></i> Asignar Participante</button>

                     <div class="row"><div class="box-divider col-xs-12"></div></div>

                     <div class="row" data-bind="visible: !showFormAdminTest()">
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


                    <div class="row" data-bind="visible: showFormAdminTest">
                        <div class="col-xs-12">
                           <div class="form-group form-inline">
                              <label for="" class="label-control">Asignar participante</label><br>
                              <select class="form-control" name="" id="">
                                 <option >Seleccione un participante</option>
                              </select>
                           </div>
                           <div class="table-responsive">
                              <table class="table table-striped">
                                 <thead>
                                    <tr>
                                       <th>Nombre</th>
                                       <th>Acciones</th>
                                    </tr>
                                 </thead>
                                 <tbody>
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
                     <button type="button" class="btn btn-danger btn-flat pull-left" data-dismiss="modal">Close</button>
                  </div>
               </div>
            </div>
         </div>


      </div>
   </div>
   @stop