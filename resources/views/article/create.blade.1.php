@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Contenido del trámite</h4>
                    </div>
                    <div class="card-body">
                        {!! Form::open(array('route' => array('article.store', $category->id), 'files' => true)) !!}
                            @include('article.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()

@section('js')
    <script>
        
    </script>
@endsection