@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 mt-2">
        {!! Breadcrumbs::render('edit-admin', $admin) !!}
      </div>
      <div class="col-12 col-md-7 mt-3">
        <div class="card shadow">
          <div class="card-header border">
            <h4 class="mb-0">
                Edita administrador
            </h4>
          </div>
          <div class="card-body">
            {!! Form::model($admin, array('route' => array('admin.update', $admin->id), 'method' => 'PUT')) !!}
                <div class="col-md-12 col-12">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        {{ Form::text('name', null, $attributes = $errors->has('name') ? array('placeholder' => 'Nombre', 'class' => 'form-control form-control-alternative   is-invalid', 'required') : array('placeholder' => 'Nombre', 'class' => 'form-control form-control-alternative  ', 'required') ) }}
                        @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-12 col-12">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        {{ Form::email('email', null, $attributes = $errors->has('email') ? array('placeholder' => 'Email', 'class' => 'form-control form-control-alternative   is-invalid', 'required') : array('placeholder' => 'Email', 'class' => 'form-control form-control-alternative  ', 'required') ) }}
                        @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <button class="btn btn-primary btn-fill">
                            Guardar
                        </button>
                    </div>
                </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
