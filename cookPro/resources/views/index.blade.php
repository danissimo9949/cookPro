@extends('layouts.app')

@section('content')
  
    <header class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1 class="display-4">Вітаємо на нашому кулінарному блозі CookPro!</h1>
            <p class="lead">Готуй, як ПРО, з нашими найкращими рецептами та порадами</p>
        </div>
    </header>

    <div class="container my-5">
        <div class="row">
            @forelse ($posts as $post)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://via.placeholder.com/350x200' }}" 
                             class="card-img-top" alt="{{ $post->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                            <a href="{{ route('blog.show', $post->id) }}" class="btn btn-primary">Читати</a>
                        </div>
                    </div>
                </div>
            @empty
                <p>Поки немає доступних рецептів.</p>
            @endforelse
        </div>
    </div>

@endsection
