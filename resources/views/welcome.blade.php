@extends('layouts.app')

@section('title', 'Блог')

@section('content')
@foreach ($posts as $post)
<div class="row mb-2">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">{{ $post->title }}</h2>
                <p class="card-text text-justify">{{ substr($post->content, 0, 400).'...' }}</p>
                <a href="#" class="btn btn-sm btn-primary">Подробнее</a>
            </div>
            <div class="card-footer">
                <span class="badge">Автор: <a href="{{ route('welcome.user', $post->user->id) }}">{{ $post->user->name }}</a></span>
                <span class="badge">Категория: <a href="{{ route('welcome.category', $post->category->id) }}">{{ $post->category->name }}</a></span>
                <span class="badge">Опубликовано: {{ $post->created_at->diffforHumans() }}</span>
            </div>
        </div>
    </div>
</div>
@endforeach
<div class="row">
    <div class="col-12 d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
</div>
@endsection

@section('navigation')
<ul class="nav nav-pills flex-column">
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" href="{{ route('welcome') }}">Все категории</a>
    </li>
    @foreach ($categories as $category)
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('category/'.$category->id)) ? 'active' : '' }}" href="{{ route('welcome.category', $category->id) }}">{{ $category->name }} <span class="badge badge-secondary">{{$category->posts->count()}}</span></a>





    </li>
    @endforeach
</ul>
@endsection
