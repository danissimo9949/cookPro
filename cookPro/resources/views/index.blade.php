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
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Рецепт 1">
                    <div class="card-body">
                        <h5 class="card-title">Рецепт для завтрака</h5>
                        <p class="card-text">Этот вкусный и питательный рецепт идеально подходит для утреннего приема пищи.</p>
                        <a href="#" class="btn btn-primary">Читать далее</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Рецепт 2">
                    <div class="card-body">
                        <h5 class="card-title">Рецепт для обеда</h5>
                        <p class="card-text">Потрясающее блюдо, которое легко приготовить, но оно восхитительно вкусное!</p>
                        <a href="#" class="btn btn-primary">Читать далее</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Рецепт 3">
                    <div class="card-body">
                        <h5 class="card-title">Рецепт для ужина</h5>
                        <p class="card-text">Завершите свой день этим легким и вкусным ужином, который понравится всем!</p>
                        <a href="#" class="btn btn-primary">Читать далее</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection