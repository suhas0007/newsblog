@extends('layout')
@section('about')
@foreach($adminlists as $admin)
<div id="wrapper">
    <div id="page" class="container">
        <div id="content">
<h1>{{$admin->name}}</h1>
</div>
</div>
</div>

@endforeach
@endsection