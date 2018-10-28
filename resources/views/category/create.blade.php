@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mb-3">
                {{ Breadcrumbs::render('add-tramite') }}
            </div>
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(array('route' => 'categories.store')) !!}
                            @include('category.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()