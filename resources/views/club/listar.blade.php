@extends('layouts.master')

@section('title', 'Nuevo Club - Hincha Digital')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('style')
    
@endsection

@section('breadcrumb-title')
    <h3>Listar Clubs</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Club</li>
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
                      <table class="display datatables" id="clubs">

                          <thead>
                              <tr class="text-center">
                                  <th>Insignia</th>  
                                  <th>Nombre</th>
                                  <th>F. Fundación</th>
                                                                 
                                  <th>Acciones</th>                                 
                                  
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($clubs as $c)
                              <tr>
                                <td>{{$c->insignia}}</td>
                                <td>{{$c->nombre}}</td>
                                <td>{{$c->f_fundacion}}</td>
                                <td>
                                     <a href="{{route('agregar.serie', [$c->id])}}"><i class="fa fa-plus"></i></a>   
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

        var tabla = $('#clubs').DataTable({
                language: {url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-CL.json'},
                            
                    
            });
          });
</script>
@endsection
