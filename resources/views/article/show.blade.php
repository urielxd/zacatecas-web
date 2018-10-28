@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mb-3">
                {{ Breadcrumbs::render('show-contenido', $article) }}
            </div>
            <div class="col-md-11 col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            Trámite: {{ $article->Category->name }}
                        </h4>
                        <div class="row">
                            <div class="col-md-4"> 
                                <img src="{{ asset('images/articles/'.$article->image) }}" alt="" class="img-fluid mt-2">
                            </div>
                            <div class="col-md-8">
                                {!! $article->body !!}
                            </div>
                        </div>
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