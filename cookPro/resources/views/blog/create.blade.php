@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Створити новий пост</h1>

        <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label for="content">Контент</label>
                <textarea name="content" class="form-control" id="content" rows="5" required>{{ old('content') }}</textarea>
            </div>

            <div class="form-group">
                <label for="category_id">Категорія</label>
                <select name="category_id" class="form-control" id="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="image">Зображення</label>
                <input type="file" name="image" class="form-control" id="image">
            </div>

            <div class="form-group">
                <label for="tags">Теги</label>
                <select name="tags[]" class="form-control" id="tags" multiple>
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="new_tags">Нові теги (через кому)</label>
                <input type="text" name="new_tags" class="form-control" id="new_tags" value="{{ old('new_tags') }}">
            </div>

            <button type="submit" class="btn btn-primary">Створити</button>
        </form>
    </div>
@endsection