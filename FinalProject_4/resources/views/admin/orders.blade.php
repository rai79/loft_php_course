@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <a href="{{route('admin.index')}}" class="btn btn-primary">Перейти в раздел администрирования</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <table class="table table-bordered">
                <tr>
                    <td>Номер заказа</td>
                    <td>Наименование товара</td>
                    <td>Имя заказчика</td>
                    <td>Email заказчика</td>
                </tr>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->product->name}}</td>
                        <td>{{$order->user_name}}</td>
                        <td>{{$order->user_email}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection