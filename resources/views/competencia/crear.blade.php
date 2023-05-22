@extends('layouts.master')

@section('title', 'Nuevo Club - Hincha Digital')

@section('css')
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
@endsection

@section('style')
    
@endsection

@section('breadcrumb-title')
    <h3>Crear Competencia</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Competencia</li>
    <li class="breadcrumb-item active">Nuevo</li>
   
@endsection

@section('content')
<div class="container-fluid">
    <div class="row starter-main">
       
        
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>A continuación usted creará una nueva Competencia.</h5>
                    
                </div>
                

                    <form class="needs-validation theme-form" novalidate="" action="{{ route('store.competencia') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                          <div class="row g-3">
                            

                            <div class="col-md-6">
                              
                              <div class="mb-3">
                                <label class="form-label" for="inputNombre">Nombre</label>
                                <input class="form-control" id="inputNombre" type="text" required name="nombre" placeholder="Ingrese Nombre">
                                <div class="valid-feedback">¡Luce bien!</div>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="mb-2">
                                <div class="col-form-label">Series</div>
                                <select class="js-example-basic-multiple  col-sm-6" name="series[]" id="series" required multiple="multiple">
                                  @foreach ($series as $s )

                                  <option value="{{ $s->id }}">{{ $s->nombre }}</option>
                                  
                                  @endforeach
                                </select>
                                <div class="valid-feedback">¡Luce bien!</div>
                                <div class="invalid-feedback">Por favor seleccionar Series en competencia.</div>
                              </div>
                            </div>

                            <div class="col-md-6">
                              
                              <div class="mb-3">
                                <label class="form-label" for="inputipo">Tipo</label>
                                <select class="form-control" name="tipo" id="inputipo">
                                    <option value="liga">Liga</option>
                                    <option value="eliminacion">Eliminación</option>


                                </select>
                                <div class="valid-feedback">¡Luce bien!</div>
                              </div>
                            </div>


                            <div class="col-md-6">
                              <div class="mb-2">
                                <div class="col-form-label">Equipos</div>
                                <select class="js-example-basic-multiple  col-sm-6" name="clubs[]" id="clubs" required multiple="multiple">
                                  @foreach ($clubs as $c )

                                  <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                                  
                                  @endforeach
                                </select>
                                <div class="valid-feedback">¡Luce bien!</div>
                                <div class="invalid-feedback">Por favor seleccionar Clubs en competencia.</div>
                              </div>
                            </div>

                            

                            

                          </div>
                          


                         

                           

                          </div>
                          
                                     
                          
                        </div>
                        <div class="card-footer text-end">
                          <button class="btn btn-primary" type="submit">Grabar</button>
                          <input class="btn btn-light" type="reset" value="Cancel">
                        </div>
                      </form>
                    
                   
                
            </div>
        </div>
        
        
        
    </div>
</div>

<script type="text/javascript">
    var session_layout = '{{ session()->get('layout') }}';
</script>
   
@endsection

@section('script')
<script src="{{ asset('assets/js/form-validation-custom.js')}}"></script>
<script src="{{ asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{ asset('assets/js/datepicker/date-picker/datepicker.es.js')}}"></script>


<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script>
      $(document).ready(function(){

        $('#clubs').select2({

        });
        $('#series').select2({

});
      });
</script>

<script>
  function enviar(){
  var btn = document.getElementById('btn');
  btn.setAttribute('disabled','');
 
}
</script>
<script>

    
    (function($) {
    "use strict";
     //Minimum and Maxium Date
    $('#minMaxExample').datepicker({
        language: 'es',
        minDate: new Date() // Now can select only dates, which goes after today
    })

    //Disable Days of week
    var disabledDays = [0, 6];

    $('#disabled-days').datepicker({
        language: 'es',
        onRenderCell: function (date, cellType) {
            if (cellType == 'day') {
                var day = date.getDay(),
                    isDisabled = disabledDays.indexOf(day) != -1;
                return {
                    disabled: isDisabled
                }
            }
        }
    })
    })(jQuery);

</script>
@endsection
