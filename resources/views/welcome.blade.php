@extends('backend.master')

@section('content')
<div class="container" id="app">
    <div class="row mt-5">
        <div class="col-md-12">
            <router-view></router-view>
        </div>
    </div>
</div>
@endsection
