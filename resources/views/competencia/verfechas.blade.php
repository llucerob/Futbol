@extends('layouts.master')

@section('title', 'Ver Fechas - Hincha Digital')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('style')
    
@endsection

@section('breadcrumb-title')
    <h3>Fechas del Torneo {{$ruedas->first()->campeonato->nombre}}</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Competencias</li>
    <li class="breadcrumb-item active">Ver Fechas</li>
   
@endsection

@section('content')
<div class="container-fluid">

    @foreach($ruedas as $r)

    <h4>Rueda {{$r->rueda}}</h4>
  <div class="row starter-main">
     
      @foreach($r->fechas as $f)
      <div class="col-md-6">
          <div class="card">
              <div class="card-header">
                  <h5>Fecha {{$f->fecha}}</h5>

                </div>
              <div class="card-body">
                <ul>
                  
                    @foreach ( $f->encuentros as $e)

                        <li><span class="@if($e->partido->estado == 'Programado') txt-dark @elseif($e->partido->estado == 'Jugado') txt-success @else txt-danger @endif">{{$e->partido->elocal->nombre}} <span>VS</span> {{$e->partido->evisita->nombre}}</span> </li>
                        
                    @endforeach
                    
                      

                </ul>
                
                <span class="text-success">Equipo Libre :@if($f->libre != 0) {{$f->elibre->nombre}} @else No hay equipos Libres @endif </span>
              </div>

              <div class="card-footer">
                <a href="{{route('programar.encuentro', [$r->id, $f->id])}}" type="button" class="btn btn-primary"><i class="fa fa-calendar"></i></a>
                <a href="{{route('ver.encuentro', [$r->id, $f->id])}}" type="button" class="btn btn-secondary"><i class="fa fa-gavel"></i></a>
              </div>
          </div>
      </div>

      @endforeach



  </div>
  @endforeach
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
