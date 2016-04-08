@extends('layouts.layout')

@section('content')
<div class="row">
   <div class="col-xs-12" id="crudTest">
      <div class="box box-primary" data-bind="visible: !showAdminTest()">
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
                              <th class="text-center">Nombre</th>
                              <th class="text-center">Estado</th>
                              <th class="text-center">Acciones</th>
                              <th class="text-center">administrar</th>
                           </tr>
                        </thead>
                        <tbody data-bind="foreach: tests">
                           <tr>
                              <td data-bind="text: name" class="text-center"></td>
                              <td data-bind="text: is_active == 1 ? 'Activa' : 'Inactiva' " class="text-center"></td>
                              <td class="text-center">
                                 <i class="fa fa-pencil fa-blue"></i>
                                 <i class="fa fa-close fa-red"></i>
                              </td>
                              <td>
                                 <button class="btn btn-info btn-xs btn-flat" data-bind="click: $root.toggleFormAdminTest">Administrar</button>
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


      <!-- administracion de la encuesta -->

      <div data-bind="visible: showAdminTest">
         <div class="col-xs-12 col-sm-10 pull-center">
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title">
                     Asignar Usuarios a Encuestas
                  </h3>
               </div>
               <div class="box-body">
                  <button class="btn btn-info separate btn-flat btn-sm" data-bind="click: ModalAssignUser"><i class="fa fa-plus"></i> Asignar Usuarios</button>
                  <table id="" class="table table-bordered table-hover">
                     <thead>
                         <tr>
                           <th class="text-center">Nombre</th>
                           <th class="text-center">Company</th>
                           <th class="text-center">Email</th>
                           <th class="text-center">Estado</th>
                         </tr>
                     </thead>
                     <tbody data-bind="foreach: userAssignedTests">
                        <tr>
                           <td data-bind="text: firstname + ' ' + lastname"></td>
                           <td data-bind="text: company"></td>
                           <td data-bind="text: email"></td>
                           <td> <span class="badge bg green" data-bind="css: {'bg-red': status == 0, 'bg-green': status == 1, 'bg-light-blue': status == 2}, text: $root.getStatusPretty(status)"> </td>
                        </tr>
                     </tbody>
                  </table>             
               </div>
            </div>
         </div>            
      </div>



      <!-- Primer modal -->
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
                           <div class="col-xs-6 col-md-4 separate">
                               <div class="form-group">
                                    <label class="label-control">Usuario</label>
                                     <select name="user" id="user" class="form-control" data-bind="optionsCaption: 'Seleccione un usuario', options: usersAssign, optionsText: 'firstname', optionsValue: 'id', value: formDataAssignUser().id_user "></select>
                               </div>
                           </div>

                           <div class="col-xs-6 col-md-4 separate" data-bind="visible: RefereeAssign().length > 0">
                               <div class="form-group">
                                    <label class="label-control">Evaluado</label>
                                     <select name="evaluado" id="evaluado" class="form-control" data-bind="optionsCaption: 'Seleccione un usuario', options: RefereeAssign, optionsText: 'firstname', optionsValue: 'id', value: formDataAssignUser().id_evaluado"></select>
                               </div>
                           </div>
                           <div class="col-xs-6 col-md-4 separate">
                               <div class="form-group">
                               <label for="">Estado</label>
                                 <input id="status" class="cmn-toggle cmn-toggle-round" type="checkbox" data-bind="checked: formDataAssignUser().status">
                                    <label for="status"></label>
                               </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button class="btn btn-primary" data-bind="click: saveAssignUserTes">Asignar</button>
                  <button class="btn btn-danger" role="button" data-bind="click: cancelAssign">Cancelar</button>
               </div>
            </div>
         </div>
      </div>



   </div>
</div>
@stop