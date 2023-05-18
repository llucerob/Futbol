@extends('layouts.master')

@section('title', 'Listar Jugadores - Hincha Digital')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('style')
    
@endsection

@section('breadcrumb-title')
    <h3>Listar Jugadores</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Jugadores</li>
    <li class="breadcrumb-item active">Listar</li>
   
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
                      <table class="display datatables" id="jugadores">

                          <thead>
                              <tr class="text-center">
                                  <th>Nombre</th>  
                                  <th>Apellido</th>
                                  <th>F. Nacimiento</th>
                                    <th>Folio</th>                                                                 
                                  <th>F. Inscripción</th>
                                  <th>Acciones</th>                                 
                                  
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($jugadores as $j)
                              <tr>
                                <td>{{$j->nombre}}</td>
                                <td>{{$j->apellido}}</td>
                                <td>{{$j->f_nac}}</td>
                                <td>{{$j->folio}}</td>
                                <td>{{$j->f_inscripcion}}</td>
                                <td>
                                    ACCIONES
                                </td>
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

<script>
    $(document).ready(function(){

        var tabla = $('#jugadores').DataTable({
                language: {url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-CL.json'},
                            
                    
            });
          });
</script>
@endsection
