@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-xs-11 pull-center" id="adminTest">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        Crear Encuesta
                    </h3>
                </div>
                <div class="box-body">
                     <div id="menutab">
                        <form id="createMForm">
                            <input type="button" id="createmenu" value="Add menu" data-bind="click: addCourse"/>
                            <div class="menu">
                                <table data-bind="foreach: cources" class="ui-widget ui-widget-content" >
                                    <tr>
                                        <td>
                                            <label for="CourseName">CourseName</label>
                                        </td>
                                        <td>
                                            <input type="text"  data-bind="value: textValue, valueUpdate:'keyup'" class="CreateCourseName" name="CourseName" />
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                    </div>
                    <div id="courseoptiontab">
                        <form id="createCOForm">
                            <div class="options">
                                <table data-bind="foreach: cources" class="ui-widget ui-widget-content">
                                    <tr>
                                        <td>
                                            <label class="colabel">Course Name 
                                                <span class="forcourse" data-bind="text: textValue"></span>
                                            </label>
                                        </td>
                                    </tr>
                              </table>
                           </div>
                        </form>
                    <div>
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>
@stop