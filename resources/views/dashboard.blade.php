@extends('layouts.master')

@section('title', 'Default')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-timer-picker.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Centro de Mensajes</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Mensajes</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row starter-main">
       

        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-primary btn-sm m-1" title="Subir Mensaje" data-bs-toggle="modal" data-bs-target="#modalMensaje">Subir Mensaje</button>
                    
                </div>


                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display datatables" id="mensajes">

                            <thead>
                                <tr class="text-center">
                                    <th>Titulo</th>  
                                    <th>Subtitulo</th>
                                    <th>Mensaje</th>
                                    <th>Fecha</th>                              
                                    <th>Acciones</th>                                 
                                    
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($mensajes as $m)
                                <tr>
                                  <td>{{$m->titulo}}</td>
                                  <td>{{$m->subtitulo}}</td>
                                  <td>{{$m->nota}}</td>
                                  <td>{{$m->horario}}</td>
                                  <td>
                                       <a href="#" class="btn btn-success" type="button">aquí irá un botón</a>   
                                  </td>
                                </tr>
                                @endforeach
                            </tbody>
                          
                        </table>
  
  
                    </div>
                </div>
            </div>


            <div class="modal fade" id="modalMensaje" tabindex="-1" role="dialog" aria-labelledby="modalMensaje" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Nuevo mensaje</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    
                        <div class="modal-body"> 
                            <div class="modal-toggle-wrapper">  
                              <form action="{{route('crear.mensaje')}}" method="post" enctype="multipart/form-data">
                                @csrf
    
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Titulo</label>
                                    <div class="col-sm-9">
                                      <input class="form-control" type="text" name="titulo">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Subtitulo</label>
                                    <div class="col-sm-9">
                                      <input class="form-control" name="subtitulo" type="text">
                                    </div>
                                  </div>
    
                                  <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Mensaje</label>
                                    <div class="col-sm-9">
                                        <textarea name="mensaje" class="form-control" id="mensaje" cols="40" rows="10"></textarea>
                                      
                                    </div>
                                  </div>
                                  <div class="mb-3 row d-flex ">
                                    <label class="col-sm-3 col-form-label text-end">Horario</label>
                                    <div class="col-sm-7">
                                        <div class="input-group date " id="dt-minimum" data-target-input="nearest">
                                            <input class="form-control datetimepicker-input digits" type="text" name="horario" data-target="#dt-minimum">
                                            <div class="input-group-text" data-target="#dt-minimum" data-toggle="datetimepicker"><i class="fa fa-calendar"> </i></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 row"> 

                                <button class="btn btn-success" type="submit">Enviar Mensaje</button>
    
                                </div>
                              </form>
                              
                                                                    
                            </div>
                        </div>                                                   
                    </div>
                </div>
            </div>
        </div>



       
            


        
       
       
        
        
       
    </div>
</div>
    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';
    </script>
@endsection

@section('script')
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>

<script>
    $(document).ready(function(){

        var tabla = $('#mensajes').DataTable({
                language: {url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-CL.json'},
                            
                    
            });
          });
</script>
<script src="{{asset('assets/js/datepicker/date-time-picker/moment.min.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-time-picker/moment.es.js')}}"></script>

<script src="{{asset('assets/js/datepicker/date-time-picker/tempusdominus-bootstrap-4.min.js')}}"></script>

<script>

    (function($) {
        "use strict";
    
        
            $(function () {
                $('#dt-minimum').datetimepicker({
                    lenguage: 'es',
                    
                    
                    
                    });
            });
    })(jQuery);
       
        </script>
@endsection

