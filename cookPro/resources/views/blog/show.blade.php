@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-4">
            <div class="card-header">
                <h1>{{ $post->title }}</h1>
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

    </div>
@endsection