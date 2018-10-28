@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mb-3">
                {{ Breadcrumbs::render('edit-contenido', $article) }}
            </div>
            <div class="col-2">
                <img src="{{ asset('images/articles/'.$article->image) }}" alt="" class="img-fluid">
            </div>
            <div class="col-md-10 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Contenido del trámite</h4>
                    </div>
                    <div class="card-body">
                        {!! Form::model($article, array('route' => array('article.update', $article->id), 'files' => true, 'method' => 'PUT')) !!}
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