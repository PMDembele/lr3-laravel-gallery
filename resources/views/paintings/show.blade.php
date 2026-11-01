@extends('layouts.app')

@section('title', $painting->title)

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row g-4">
            <div class="col-md-5">
                <img src="{{ asset('storage/' . $painting->image) }}" class="img-fluid rounded w-100" alt="{{ $painting->title }}">
            </div>
            <div class="col-md-7">
                <h2>{{ $painting->title }}</h2>
                <dl class="row">
                    <dt class="col-sm-4">Автор</dt><dd class="col-sm-8">{{ $painting->author }}</dd>
                    <dt class="col-sm-4">Год</dt><dd class="col-sm-8">{{ $painting->year }}</dd>
                    <dt class="col-sm-4">Техника</dt><dd class="col-sm-8">{{ $painting->technique }}</dd>
                    <dt class="col-sm-4">Размер</dt><dd class="col-sm-8">{{ $painting->size }}</dd>
                    <dt class="col-sm-4">Хранится</dt><dd class="col-sm-8">{{ $painting->location }}</dd>
                </dl>
                <p>{{ $painting->description }}</p>
                <a href="{{ route('paintings.index') }}" class="btn btn-secondary">Назад</a>
                <a href="{{ route('paintings.edit', $painting) }}" class="btn btn-primary">Изменить</a>
            </div>
        </div>
    </div>
</div>
@endsection