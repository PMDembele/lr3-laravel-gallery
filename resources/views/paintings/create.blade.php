@extends('layouts.app')

@section('title', 'Добавить картину')

@section('content')
<h2>Добавить картину</h2>
<form action="{{ route('paintings.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('paintings._form')
</form>
@endsection