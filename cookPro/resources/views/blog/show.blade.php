@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h1 class="mb-0">{{ $post->title }}</h1>
                <div>
                    <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-warning btn-sm me-2">Редагувати</a>
                    <form action="{{ route('blog.destroy', $post->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Видалити</button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <p><strong>Категорія:</strong> {{ $post->category->name }}</p>
                <p><strong>Дата створення:</strong> {{ $post->created_at->format('d-m-Y') }}</p>
                <p>{{ $post->content }}</p>

                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Image" class="img-fluid mb-3">
                @endif

                <h5>Теги:</h5>
                <div>
                    @foreach($post->tags as $tag)
                        <span class="badge bg-secondary">{{ $tag->name }}</span>
                    @endforeach
                </div>
            </div>
        </div>

        <hr>
        <div class="comments mt-4">
            <h3>Коментарі:</h3>
            @foreach($post->comments as $comment)
                <div class="comment">
                    <p><strong>{{ $comment->user->name ?? 'Гість' }}:</strong> {{ $comment->content }}</p>
                    @auth
                    <form method="POST" action="{{ route('comments.reply', ['post' => $post->id, 'comment' => $comment->id]) }}">
                        @csrf
                        <textarea name="content" required></textarea>
                        <button type="submit" class="btn btn-primary">Відповісти</button>
                    </form>
                    @endauth
                </div>
            @endforeach
            @auth
            <hr>
            
            <h3>Додати коментар:</h3>
            <form method="POST" action="{{ route('comments.store', $post->id) }}">
                @csrf
                <textarea name="content" required></textarea>
                <button type="submit" class="btn btn-primary">Додати коментар</button>
            </form>
            @endauth
        </div>
    </div>
@endsection