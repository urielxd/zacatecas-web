@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 mt-2">
        {!! Breadcrumbs::render('add-admin') !!}
      </div>
      <div class="col-12 col-md-7 mt-3">
        <div class="card shadow">
          <div class="card-header border">
            <h4 class="mb-0">
                Nuevo administrador
            </h4>
          </div>
          <div class="card-body">
            {!! Form::open(array('route' => 'admin.store')) !!}
              @include('admin.form')
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
