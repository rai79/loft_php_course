@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <a href="{{route('admin.notification_create')}}" class="btn btn-primary">Добавить email</a>
                <a href="{{route('admin.index')}}" class="btn btn-primary">Перейти в раздел администрирования</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <table class="table table-bordered">
                <tr>
                    <td>Номер менеджера</td>
                    <td>Email менеджера</td>
                    <td>Действия</td>
                </tr>
                @foreach ($notifications as $notification)
                    <tr>
                        <td>{{$notification->id}}</td>
                        <td>{{$notification->email}}</td>
                        <td>
                            <a href="{{route('admin.notification_edit', ['notification_id' => $notification->id])}}" class="btn-default">Редактировать</a>
                            <a href="{{route('admin.notification_delete', ['notification_id' => $notification->id])}}" class="btn-danger">Удалить</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection