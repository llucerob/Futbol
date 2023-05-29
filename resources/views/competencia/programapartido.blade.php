@extends('layouts.master')

@section('title', 'Programacion Partidos - Hincha Digital')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-timer-picker.css')}}">
    
@endsection

@section('style')
    
@endsection

@section('breadcrumb-title')
    <h3>Programación encuentro </h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Competencias</li>
    <li class="breadcrumb-item ">Programacion</li>
    
   
@endsection

@section('content')
<div class="container-fluid">
  <div class="row starter-main">
     
      
      <div class="col-sm-12">
          <div class="card">
              <div class="card-header">
                  <h5>{{$partido->elocal->nombre}} <span class="txt-danger">VS</span> {{$partido->evisita->nombre}}</h5>
                  
              </div>
              <div class="card-body">
                   <form action="{{route('update.partido', [$partido->id])}}"  method="post" enctype="multipart/form-data">
                                    @csrf
                        <div class="col">

                            <div class="mb-3 row d-flex ">
                                <label class="col-sm-3 col-form-label text-end">Horario</label>
                                <div class="col-sm-7">
                                    <div class="input-group date " id="dt-minimum" data-target-input="nearest">
                                        <input class="form-control datetimepicker-input digits" type="text" name="programacion" data-target="#dt-minimum">
                                        <div class="input-group-text" data-target="#dt-minimum" data-toggle="datetimepicker"><i class="fa fa-calendar"> </i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">

                            <div class="mb-3 row d-flex ">
                                <label class="col-sm-3 col-form-label text-end">Estadio</label>
                                <div class="col-sm-7">
                                    <select name="estadio" class="form-control">
                                        @foreach($estadios as $e)
    
                                            <option value="{{$e->id}}" @if($e->id == $partido->encuentro->estadio_id) selected @endif >{{$e->nombre}}</option>
    
                                        @endforeach
    
                                    </select>
                                </div>
                                
                            
                                
                            </div>
                        </div>
                                    
                        <button class="btn btn-secondary d-flex m-auto" id="btn" type="submit">Programar</button>
                    </form>

                  
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
