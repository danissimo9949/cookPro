@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Блог</h1>

    <form action="{{ route('blog.index') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <select name="category" class="form-select" onchange="this.form.submit()">
                    <option value="">Всі категорії</option>
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
                <a href="#" class="btn btn-primary">Читати</a>
            </div>
            <div class="card-footer text-muted">
                Теги:   
                @foreach ($post->tags as $tag)
                <span class="tag">{{ $tag->name }}</span>
                @endforeach
            </div>
        </div>
    @empty
        <p>Постов пока нет.</p>
    @endforelse


    {{ $posts->links() }}
</div>
@endsection
