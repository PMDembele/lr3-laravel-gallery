@php
    $fields = [
        'title' => 'Название', 'author' => 'Автор', 'year' => 'Год',
        'technique' => 'Техника', 'size' => 'Размер', 'location' => 'Где хранится',
    ];
@endphp

@foreach ($fields as $name => $label)
    <div class="mb-3">
        <label for="{{ $name }}" class="form-label">{{ $label }}</label>
        <input type="{{ $name === 'year' ? 'number' : 'text' }}" id="{{ $name }}" name="{{ $name }}"
               class="form-control @error($name) is-invalid @enderror"
               value="{{ old($name, $painting->$name ?? '') }}" required>
        @error($name)
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
@endforeach

<div class="mb-3">
    <label for="description" class="form-label">Описание</label>
    <textarea id="description" name="description" rows="4"
              class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $painting->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="image" class="form-label">Изображение</label>
    <input type="file" id="image" name="image" accept="image/*"
           class="form-control @error('image') is-invalid @enderror">
    @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">Сохранить</button>
<a href="{{ route('paintings.index') }}" class="btn btn-secondary">Отмена</a>