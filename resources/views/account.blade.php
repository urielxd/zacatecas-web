@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-5 col-12">
                <div class="card">
                    <div class="shadow">
                        <div class="card-header">
                            <h4>Editar cuenta</h4>
                        </div>
                        <div class="card-body">
                            {!! Form::model(Auth::user(), array('route' => 'account.update', 'method' => 'PUT')) !!}
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
                                <div class="col-md-12 col-12">
                                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                        {{ Form::password('password', $attributes = $errors->has('password') ? array('placeholder' => 'Contraseña', 'class' => 'form-control form-control-alternative   is-invalid', 'required') : array('placeholder' => 'Contraseña', 'class' => 'form-control form-control-alternative  ') ) }}
                                        @if ($errors->has('password'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <button class="btn btn-fill btn-primary">
                                            Actualizar
                                        </button>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection