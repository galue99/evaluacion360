@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-xs-11 pull-center" id="levels">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        Niveles
                    </h3>
                </div>
                <div class="box-body">
                    <button class="btn btn-primary" data-bind="click: toggleForm"><i class="fa fa-plus"></i> Agregar Nuevo</button>

                    <div class="row"><div class="box-divider col-xs-12"></div></div>
                    <div class="col-xs-12" data-bind="visible: showForm">
                        <form action="" class="form row" id="formLevels">
                            <div class="col-xs-6 col-md-4 separate">
                                <div class="form-group separate">
                                    <label class="label-control">Descripcion</label>
                                    <input type="text" class="form-control" name="name" data-bind="textInput: formData().name">
                                </div>
                            </div>
                            <div class="form-group col-xs-9 col-md-12 text-right">
                                <div class="form-group">
                                    <button class="btn btn-primary" data-bind="click: save">Guardar</button>
                                    <button class="btn btn-danger" role="button" data-bind="click: cancel">Cancelar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Form Evaluadores -->


                    <div class="table-responsive">
                        <table id="" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">Name</th>
                                {{--      <th class="text-center">Acciones</th>--}}
                            </tr>
                            </thead>
                            <tbody data-bind="foreach: levels">
                            <tr>
                                <td data-bind="text: name" class="text-center"></td>
                                <td class="text-center">
                                    {{--<i class="fa fa-pencil fa-blue pointer" data-bind="click: $root.editLevel"></i>
                                    <i class="fa fa-close fa-red pointer" data-bind="click: $root.destroyLevel"></i>--}}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>
@stop