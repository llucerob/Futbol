@extends('layouts.master')

@section('title', 'Programar Encuentros - Hincha Digital')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-timer-picker.css')}}">
    
@endsection

@section('style')
    
@endsection

@section('breadcrumb-title')
    <h3>Encuentros Fecha {{$fecha->fecha}}</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Competencias</li>
    <li class="breadcrumb-item ">Ruedas</li>
    <li class="breadcrumb-item active">Fecha</li>
   
@endsection

@section('content')
<div class="container-fluid">
  <div class="row starter-main">
     
      
      <div class="col-sm-12">
          <div class="card">
              <div class="card-header">
                  <h5></h5>
                  
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="display datatables" id="encuentros">

                          <thead>
                              <tr class="text-center">
                                  <th>Local</th>  
                                  <th>Visita</th>
                                  <th>Estadio</th>
                                  <th>Horario</th>                              
                                  <th>Acciones</th>                                 
                                  
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($fecha->encuentros as $key => $e)
                              <tr>
                                <td>{{$e->partido->elocal->nombre}}</td>
                                <td>{{$e->partido->evisita->nombre}}</td>
                                <td>{{$e->estadio->nombre}}</td>
                                <td>{{$e->partido->estado}}</td>
                                <td>
                                     <button data-bs-toggle="modal" data-bs-target="#programaPartido{{$key}}" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></button>   
                                </td>

                                <div class="modal fade" id="programaPartido{{$key}}" tabindex="-1" role="dialog" aria-labelledby="programaPartido{{$key}}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Programación Partido</h5>
                                            </div>
                                        
                                            <div class="modal-body"> 
                                                <div class="modal-toggle-wrapper">  
                                                 <form action="{{route('programa.partido', [$comp, $fech, $e->partido->id])}}"  method="post" enctype="multipart/form-data">
                                                    @csrf
                                                        <div>aqui deberia ir un calendario</div>
                                                    <button class="btn btn-secondary d-flex m-auto" id="btn" type="submit">Programar</button>
                                                  </form>
                                                </div>
                                            </div>                                                   
                                        </div>
                                    </div>
                                </div>
                              </tr>
                              @endforeach
                          </tbody>
                        
                      </table>

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
<script src="{{ asset('assets/js/form-validation-custom.js')}}"></script>
<script>

    (function($) {
        "use strict";
    
        
            $(function () {
                $('#programacion').datetimepicker({
                    lenguage: 'es',
                    
                    
                    
                    });
            });
    })(jQuery);
       
        </script>
    
    
        <script src="{{asset('assets/js/datepicker/date-time-picker/moment.min.js')}}"></script>
        <script src="{{asset('assets/js/datepicker/date-time-picker/moment.es.js')}}"></script>
        <script src="{{asset('assets/js/datepicker/date-time-picker/tempusdominus-bootstrap-4.min.js')}}"></script>
        <script>
  function enviar(){
  var btn = document.getElementById('btn');
  btn.setAttribute('disabled','');
 
}
</script>

<script>
    $(document).ready(function(){

        var tabla = $('#encuentros').DataTable({
                language: {url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-CL.json'},
                            
                    
            });
          });
</script>
@endsection
