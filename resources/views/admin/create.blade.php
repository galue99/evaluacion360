@extends('layouts.layout')

@section('content')
<div class="row">
   <div class="col-xs-12" id="crudTest">
      <div class="box box-primary" data-bind="visible: !showAdminTest()">
         <div class="box-header with-border">
            <h3 class="box-title">
               Evaluaciones
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
                              <th class="text-center">Nombre</th>
                              <th class="text-center">Estado</th>
                              <th class="text-center">Asignacions</th>
                              <th class="text-center">Preguntas Adicionales</th>
                              <th class="text-center">Acciones</th>
                           </tr>
                        </thead>
                        <tbody data-bind="foreach: tests">
                           <tr>
                              <td data-bind="text: name" class="text-center"></td>
                              <td class="text-center"><button class="btn btn-xs btn-flat" data-bind="css: {'btn-danger': is_active == 0, 'btn-success': is_active == 1}, text: $root.getStatusPrettyTest(is_active), click: $root.changeStatus"></button></td>
                              <td class="text-center">
                                 <button  class="btn btn-info btn-xs btn-flat" data-bind="click: $root.toggleFormAdminTest, disable: is_active == 0">Administrar</button>
                              </td>
                              <td class="text-center">
                                 <button class="btn btn-info btn-xs btn-flat" data-bind="click: $root.openModalOtherQ">Administrar</button>
                              </td>
                              <td class="text-center">
                                 <i class="fa fa-pencil fa-blue"></i>
                                 <i class="fa fa-close fa-red"></i>
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
                        <button class="btn btn-xs btn-default" data-bind="click: $root.openModalComportamientos"><i class="fa fa-plus"></i> Comportamientos</button>
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
      
      <div id="modalcomportamientos" class="modal fade" role="dialog">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
               <h4 class="modal-title">Competencias y Comportamientos</h4>
               </div>
               <div class="modal-body">
                  <div class="row">
                     <div class="col-xs-12">
                        <div class="row col-xs-4">
                           <div class="form-group separate">
                              <select class="form-control" data-bind="optionsCaption: 'Seleccione una competencia', options: competencias, optionsText: 'name', value: competenciaSelected "></select>
                           </div>
                        </div>
                     </div>
                     
                     <div class="col-xs-12" data-bind="if: competenciaSelected">
                        <!--ko foreach: competenciaSelected().comportamiento -->
                        <div class="">
                           <div class="form-group">
                              <label data-bind="text: name"></label>
                              <input class="cmn-toggle cmn-toggle-round" type="checkbox" data-bind="attr: {id: id}">
                   				<label data-bind="attr: {for: id}"></label>
                           </div>
                        </div>
                        <!--/ko-->
                     </div>
                     
                  </div>
               </div>
               <div class="modal-footer">
                  <button class="btn btn-primary" role="button">Asignar</button>
               </div>
            </div>
         </div>
      </div>


      <!-- administracion de la encuesta -->

      <div data-bind="visible: showAdminTest">
         <div class="col-xs-12 col-sm-11 pull-center">
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title">
                     Asignar Usuarios a Encuestas
                  </h3>
               </div>
               <div class="box-body">
                  <button class="btn btn-info separate btn-flat btn-sm" data-bind="click: ModalAssignUser"><i class="fa fa-plus"></i> Asignar Usuarios</button>
                  <div class="table-responsive">
                     <table id="" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                              <th class="text-center">Nombre del evaluador</th>
                              <th class="text-center">Cargo</th>
                              <th class="text-center">Email</th>
                            </tr>
                        </thead>
                        <tbody data-bind="foreach: evaluadores">
                           <tr data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Ver Usuario evaluados" class="pointer info-tooltip" data-bind="click: $root.evaluadosAssigned">
                              <td data-bind="text: firstname + ' ' + lastname"></td>
                              <td data-bind="text: position"></td>
                              <td data-bind="text: email"></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>             
               </div>
               <div class="box-footer">
                  <button class="btn btn-danger btn-sm btn-flat" data-bind="click: toggleFormAdminTest"><i class="fa fa-arrow-left"></i> Atras</button>
               </div>
            </div>
         </div>            
      </div>

      <!-- Modal para ver los usuarios asignados -->
      <div id="modalevaluadoassigned" class="modal fade" role="dialog">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
               <h4 class="modal-title">Usuarios a evaluar</h4>
               </div>
               <div class="modal-body">
                  <div class="row">
                     <div class="table-striped col-xs-12">
                        <table class="table table-bordered table-striped">
                           <thead>
                              <tr>
                                 <th>Usuario a evaluar</th>
                                 <th>Cargo</th>
                                 <th>Email</th>
                              </tr>
                           </thead>
                           <tbody data-bind="foreach: evaluados">
                              <tr>
                                 <td data-bind="text: firstname + ' ' + lastname"></td>
                                 <td data-bind="text: position"></td>
                                 <td data-bind="text: email"></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button class="btn btn-danger" role="button" data-bind="click: ModalHideEvaluadosAssigned">Cerrar</button>
               </div>
            </div>
         </div>
      </div>



      <!-- Modal para asignar usuarios a encuestas -->
      <div id="modalassignuser" class="modal fade" role="dialog">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
               <h4 class="modal-title">Asignacion de usuarios a encuesta</h4>
               </div>
               <div class="modal-body">
                  <div class="row">
                     <div class="col-xs-12">
                        <form action="" class="form row" id="formAssignUsersTest">
                           <div class="col-xs-12 col-sm-6 separate">
                              <div class="form-group">
                                 <label class="label-control">Usuario a Evaluar</label>
                                    <select name="user" id="user" class="form-control" data-bind="optionsCaption: 'Seleccione un usuario', options: users, optionsText: 'firstname', optionsValue: 'id', value: formDataAssignUser().id_user "></select>
                               </div>
                           </div>
                           <div class="col-xs-12" data-bind="if: formDataAssignUser().id_user">
                              <h4>Seleccione el nivel</h4>
                           </div>
                           <!-- ko foreach: levels-->
                              <div class="col-xs-2 separate">
                                 <div class="form-group">
                                    <label class="label-control" data-bind="text: name">Usuario a nivel</label> </br>
                                       <input data-bind="attr: {value: id, name: name}, checked: $root.formDataAssignUser().nivel" class="" type="radio" >
                                  </div>
                              </div>
                           <!-- /ko -->
                           <div class="col-xs-12" data-bind="if: formDataAssignUser().nivel">
                              <h4>Seleccione los evaluadores</h4>
                           </div>
                           <!-- ko foreach: SameUsersCompany -->
                              <div class="col-xs-2" data-bind="if: $root.formDataAssignUser().nivel">
                                 <div class="form-group">
                                    <label for="" class="label-control" data-bind="text: firstname"></label>
                                    <input data-bind="attr: {id: firstname, value: id}, checked: $root.formDataAssignUser().evaluadores" class="cmn-toggle cmn-toggle-round" type="checkbox" >
                                    <label data-bind="attr: {for: firstname}"></label>
                                 </div>
                              </div>
                           <!-- /ko -->
                        </form>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button class="btn btn-danger" role="button" data-bind="click: cancelAssign">Cancelar</button>
                  <button class="btn btn-primary" data-bind="click: saveAssignUserTest">Asignar</button>
               </div>
            </div>
         </div>
      </div>

      <!-- Modal para crear las preguntas adicionales -->
      <div id="modalOtherQuestions" class="modal fade" role="dialog">
         <div class="modal-dialog modal-md">
            <div class="modal-content">
               <div class="modal-header">
               <h4 class="modal-title">Preguntas Adicionales</h4>
               </div>
               <div class="modal-body">
                  <div class="row">
                     <div class="col-xs-12">
                        <button class="btn btn-info separate btn-flat" data-bind="click: toggleFormOtherQ"><i class="fa fa-plus"></i> Agregar Nuevo</button>

                        <div class="row" data-bind="visible: showFormOtherQ">
                           <div class="form-group separate col-xs-12 col-sm-6">
                              <label for="" class="label-control">Pregunta</label>
                              <input type="text" class="form-control" data-bind="textInput: formDataOtherQ().question">
                           </div>
                           <div class="form-group text-right col-xs-12">
                              <button class="btn btn-primary btn-flat" data-bind="click: saveOtherQ, visible: assignOtherQ">Guardar</button>
                              <button class="btn btn-primary btn-flat" data-bind="click: saveAssignOtherQ, visible: !assignOtherQ()">Guardarr</button>
                              <button class="btn btn-danger btn-flat" data-bind="click: cancelSaveOtherQ">Cancelar</button>
                           </div>
                        </div>

                        <div class="table-responsive">
                           <table class="table table-striped table-bordered">
                              <thead>
                                 <tr>
                                    <th class="col-xs-1">#</th>
                                    <th class="col-xs-9">Pregunta</th>
                                    <th class="col-xs-2">Acciones</th>
                                 </tr>
                              </thead>
                              <tbody data-bind="foreach: othersQuestions">
                                 <tr>
                                    <td data-bind="text: $index() + 1"></td>
                                    <td data-bind="text: question"></td>
                                    <td>
                                       <i class="fa fa-pencil fa-blue pointer" data-bind="click: $root.editOtherQ"></i>
                                       <i class="fa fa-close fa-red pointer" data-bind="click: $root.delteOtherQ"></i>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button class="btn btn-danger btn-flat" role="button" data-bind="click: CloseModalOtherQ">Cancelar</button>
               </div>
            </div>
         </div>
      </div>

   </div>
</div>
@stop