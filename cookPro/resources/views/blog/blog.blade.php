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

    <div class="row">
        @forelse ($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">{{ $post->title }}</h2>
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Image" class="img-fluid mb-3">
                        @endif
                        <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                        <a href="{{ route('blog.show', $post->id)}}" class="btn btn-primary">Читати</a>
                    </div>
                    <div class="card-footer text-muted">
                        Теги:   
                        @foreach ($post->tags as $tag)
                        <span class="tag">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        @empty
            <p>Постів немає</p>
        @endforelse
    </div>

    {{ $posts->links() }}
</div>
@endsection

