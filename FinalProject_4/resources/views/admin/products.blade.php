@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <a href="{{route('admin.product_create')}}" class="btn btn-primary">Добавить товар</a>
                <a href="{{route('admin.index')}}" class="btn btn-primary">Перейти в раздел администрирования</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <table class="table table-bordered">
                <tr>
                    <td>Наименование товара</td>
                    <td>Категория</td>
                    <td>Цена</td>
                    <td>Фотография</td>
                    <td>Описание</td>
                    <td>Действия</td>
                </tr>
                @foreach ($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->price}}</td>
                        <td><img src="{{$product->pic_url}}" alt="Изображение товара"></td>
                        <td>{{$product->description}}</td>
                        <td>
                            <a href="{{route('admin.product_edit', ['product_id' => $product->id])}}" class="btn-default">Редактировать</a>
                            <a href="{{route('admin.product_delete', ['product_id' => $product->id])}}" class="btn-danger">Удалить</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection