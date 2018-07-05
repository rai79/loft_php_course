@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Типа админка :)</div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-8 offset-md-4">
                                <a href="{{route('admin.products')}}" class="btn btn-primary">Администрирование товаров</a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8 offset-md-4">
                                <a href="{{route('admin.categories')}}" class="btn btn-primary">Администрирование категорий</a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8 offset-md-4">
                                <a href="{{route('admin.notifications')}}" class="btn btn-primary">Администрирование уведомлений</a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8 offset-md-4">
                                <a href="{{route('admin.orders')}}" class="btn btn-primary">Просмотреть заказы</a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
