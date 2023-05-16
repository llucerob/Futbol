@extends('layouts.master')

@section('title', 'Series Club - Hincha Digital')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection

@section('style')
    
@endsection

@section('breadcrumb-title')
    <h3>Asignar serie a {{$club->nombre}}</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Club</li>
    <li class="breadcrumb-item">Serie</li>
    <li class="breadcrumb-item active">Asignar</li>
   
@endsection

@section('content')
<div class="container-fluid">
    <div class="row starter-main">
        <div class="col-sm-12">
            <div class="card">
                    <form class="needs-validation theme-form" novalidate="" action="{{ route('store.serie') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                          <div class="row g-3">

                            <input type="text" value="{{$club->id}}" name="idclub" hidden>
                            <div class="col">

                              
                              <div class="m-t-15 m-checkbox-inline custom-radio-ml">

                                @foreach($series as $key => $s)
                                <div class="form-check checkbox mb-0">
                                  <input class="form-check-input" id="checkbox{{$key}}" type="checkbox" name="serie{{$key}}" >
                                  <label class="form-check-label" for="checkbox{{$key}}">{{$s->nombre}}</label>
                                  </div>
                                @endforeach
                                
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

<script>
  function enviar(){
  var btn = document.getElementById('btn');
  btn.setAttribute('disabled','');
 
}
</script>

@endsection
