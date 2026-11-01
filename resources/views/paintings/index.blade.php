@extends('layouts.app')

@section('title', 'Галерея')

@section('content')
<h2 class="page-main-title mb-4">Шедевры мировой живописи</h2>

<div class="row gallery-grid row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xxxl-5 g-4 mb-5">
    @foreach ($paintings as $painting)
        <div class="col">
            <article class="card h-100 painting-card">
                <img src="{{ asset('storage/' . $painting->image) }}" class="card-img-top" alt="{{ $painting->title }}">
                <div class="card-body">
                    <h3 class="card-title h5">{{ $painting->title }}</h3>
                    <p class="card-text">
                        <strong>Автор:</strong> {{ $painting->author }}<br>
                        <strong>Год:</strong> {{ $painting->year }}
                    </p>
                </div>
                <div class="card-footer bg-transparent border-0 px-3 pb-3 pt-0">
                    <div class="d-flex flex-wrap gap-1">
                        <a href="{{ route('paintings.show', $painting) }}" class="btn btn-outline-primary btn-sm">Подробнее</a>
                        <a href="{{ route('paintings.edit', $painting) }}" class="btn btn-outline-secondary btn-sm">Изменить</a>
                        <form action="{{ route('paintings.destroy', $painting) }}" method="POST" class="d-inline" onsubmit="return confirm('Удалить картину?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">Удалить</button>
                        </form>
                    </div>
                </div>
            </article>
        </div>
    @endforeach
</div>
@endsection