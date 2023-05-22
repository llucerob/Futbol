@extends('layouts.master')

@section('title', 'Listar Estadios - Hincha Digital')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('style')
    
@endsection

@section('breadcrumb-title')
    <h3>Listar Estadios</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Estadios</li>
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
                      <table class="display datatables" id="estadios">

                          <thead>
                              <tr class="text-center">
                                  <th>Nombre</th>  
                                  <th>Dirección</th>
                                  <th>Capacidad</th>
                                    <th>Administrado</th>                                                                 
                                  <th>Acciones</th>                                 
                                  
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($estadios as $e)
                              <tr>
                                <td>{{$e->nombre}}</td>
                                <td>{{$e->direccion}}</td>
                                <td>{{$e->capacidad}}</td>
                                <td></td>
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

        var tabla = $('#estadios').DataTable({
                language: {url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-CL.json'},
                            
                    
            });
          });
</script>
@endsection
