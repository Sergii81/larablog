@extends('layouts.cp')

@section('title', 'Новый пост')

@section('content')
<div class="row">
    <div class="col">
        <h2>Новый пост</h2>
    </div>
</div>
@if ($errors->any())
<div class="row">
    <div class="col">
        <div class="alert alert-danger">
            <strong>Упс!</strong> Ошибка ввода данных!<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif
<div class="row">
    <div class="col">
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="post-title">Заголовок поста:</label>
                <input type="text" id="post-title" name="title" class="form-control" placeholder="Введите заголовок поста">
            </div>
            <div class="form-group">
                <label for="post-content">Текст поста:</label>
                <textarea type="text" id="post-content" name="content" class="form-control" placeholder="Введите заголовок поста" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="post-category">Категория:</label>
                <select class="form-control" id="post-category" name="category_id">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="post-image">Изображение поста:</label>
                <input type="file" class="form-control-file" name="image">
            </div>
            <input type="hidden" name="user_id" value="{{Auth::id()}}">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">ОК</button>
                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Отмена</a>
            </div>
        </form>
    </div>
</div>
@endsection