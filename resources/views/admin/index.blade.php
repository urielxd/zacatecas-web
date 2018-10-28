@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3 mt-2">
                {{ Breadcrumbs::render('admin') }}
            </div>
            <div id="app" class="col-12">
                <admin></admin>
            </div>
        </div>
    </div>
@endsection