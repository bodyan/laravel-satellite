<div class="test">
	<h1> {{$satellite->name}} </h1>
	<p><h1> {{$satellite->longtitude}} </h1></p>
</div>


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
	<h1> {{$satellite->name}} </h1>
	<p><h1> {{$satellite->longtitude}} </h1></p>
        </div>
    </div>
</div>
@endsection