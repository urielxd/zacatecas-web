@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="col-12 mb-3">
                {{ Breadcrumbs::render('home') }}
            </div>
            <div id="app">
                <category></category>
            </div>
        </div>
    </div>
</div>
@endsection
