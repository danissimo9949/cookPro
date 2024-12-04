@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Редактировать пост</h1>

    <form action="{{ route('blog.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Заголовок</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Контент</label>
            <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content', $post->content) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Категорія</label>
            <select name="category_id" id="category_id" class="form-select">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Зображення</label>
            @if($post->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Image" class="img-fluid" style="max-width: 200px;">
                </div>
            @endif
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <div class="mb-3">
            <label for="tags" class="form-label">Теги</label>
            <select name="tags[]" id="tags" class="form-select" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ $post->tags->contains($tag->id) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="new_tags" class="form-label">Нові теги</label>
            <input type="text" name="new_tags" id="new_tags" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Зберегти</button>
        <a href="{{ route('blog.index') }}" class="btn btn-secondary">Назад</a>
    </form>
</div>
@endsection