@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mb-3">
                {{ Breadcrumbs::render('edit-tramite', $category->id) }}
            </div>
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-body">
                        {!! Form::model($category, array('route' => array('categories.update', $category->id), 'method' => 'PUT')) !!}                   
                            @include('category.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()