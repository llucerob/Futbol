@extends('layouts.master')

@section('title', 'Nuevo Estadio - Hincha Digital')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection

@section('style')
    
@endsection

@section('breadcrumb-title')
    <h3>Crear Estadio</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Estadio</li>
    <li class="breadcrumb-item active">Nuevo</li>
   
@endsection

@section('content')
<div class="container-fluid">
    <div class="row starter-main">
       
        
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>A continuación usted creará un Club.</h5>
                    
                </div>
                

                    <form class="needs-validation theme-form" novalidate="" action="{{ route('store.estadio') }}" method="post" enctype="multipart/form-data">
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
                              
                              <div class="mb-3">
                                <label class="form-label" for="archivo">Insignia</label>
                                <input class="form-control" id="archivo" type="file" name="insignia">
                                <div class="valid-feedback">¡Luce bien!</div>
                              </div>
                            </div>

                            

                          </div>
                          


                          <div class="row g-3">
                            <div class="col-md-6">
                              <div class="mb-3">
                                <label class="form-label" for="inputfundacion">F. Fundación</label>
                                <input class="datepicker-here form-control digits" required  data-lenguage="es" id="fundacion" type="text" name="fundacion" placeholder="12-01-1999">
                                <div class="valid-feedback">¡Luce bien!</div>
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
