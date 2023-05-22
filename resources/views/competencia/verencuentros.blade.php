@extends('layouts.master')

@section('title', 'Ver Fechas - Hincha Digital')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('style')
    
@endsection

@section('breadcrumb-title')
    <h3>Encuentros Fecha {{$fecha->fecha}}</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Competencias</li>
    <li class="breadcrumb-item">Fechas</li>
    <li class="breadcrumb-item active">Ver Encuentros</li>
   
@endsection

@section('content')
<div class="container-fluid">

   
  <div class="row starter-main">
     
      @foreach($fecha->encuentros as $e)
      <div class="col-md-6">
      
          <div class="card">

            @if($e->partido->estado == 'Jugado')

            
                 
          
         




            @else

              <div class="card-header">
                 <h6><span>{{$e->partido->elocal->nombre}} <strong class="text-danger">V/S</strong> {{$e->partido->evisita->nombre}}</span></h6>
                </div>
              <div class="card-body">
                <form action="{{route('cargar.encuentro')}}" enctype="multipart/form-data" method="post">
                    @csrf
                @foreach (json_decode($e->fecha->rueda->campeonato->series) as $key => $s )

                
                <div class="mb-3 row">
					        <label class="col-sm-3 col-form-label">{{$s->nombre}}</label>
					        <div class="col-sm-4">
					          <input class="form-control" type="text" name="goles[{{$key}}][local]" placeholder="Local">
					        </div> 
                  <div class="col-sm-4">
                      <input class="form-control" type="text" name="goles[{{$key}}][visita]" placeholder="Visita">
                  </div>
				        </div>
                  <input hidden type="text" name="goles[{{$key}}][serieid]" value="{{$s->id}}">

                  <input hidden type="text" name="goles[{{$key}}][partidoid]" value="{{$e->partido->id}}">
                    
                @endforeach
                                   
            
              </div>
              <div class="card-footer">
                <button class="form-control" type="submit">Cargar Resultados</button>

              </div>
            </form>



            @endif

              
          </div>

         
      </div>

      @endforeach



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
