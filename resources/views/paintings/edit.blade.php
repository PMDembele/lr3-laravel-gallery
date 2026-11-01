@extends('layouts.app')

@section('title', 'Изменить картину')

@section('content')
<h2>Изменить картину</h2>
<form action="{{ route('paintings.update', $painting) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('paintings._form')
</form>
@endsection