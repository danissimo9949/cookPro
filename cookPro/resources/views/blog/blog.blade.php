@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Блог</h1>

    <form action="{{ route('blog.index') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <select name="category" class="form-select" onchange="this.form.submit()">
                    <option value="">Все категории</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" 
                            {{ $selectedCategory == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>

    @forelse ($posts as $post)
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">{{ $post->title }}</h2>
                <p class="card-text">{{ Str::limit($post->content, 150) }}</p>
                <a href="{{ route('blog.show', $post) }}" class="btn btn-primary">Читать дальше</a>
            </div>
            <div class="card-footer text-muted">
                Категория: {{ $post->category->name ?? 'Без категории' }} | Опубликовано {{ $post->created_at->diffForHumans() }}
            </div>
        </div>
    @empty
        <p>Постов пока нет.</p>
    @endforelse


    {{ $posts->links() }}
</div>
@endsection
