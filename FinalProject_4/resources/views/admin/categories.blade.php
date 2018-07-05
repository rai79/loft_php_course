@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <a href="{{route('admin.category_create')}}" class="btn btn-primary">Добавить категорию</a>
                <a href="{{route('admin.index')}}" class="btn btn-primary">Перейти в раздел администрирования</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <table class="table table-bordered">
                <tr>
                    <td>Наименование категории</td>
                    <td>Описание</td>
                    <td>Действия</td>
                </tr>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td>{{$category->description}}</td>
                        <td>
                            <a href="{{route('admin.category_edit', ['category_id' => $category->id])}}" class="btn-default">Редактировать</a>
                            <a href="{{route('admin.category_delete', ['category_id' => $category->id])}}" class="btn-danger">Удалить</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection