@extends('layouts.game')

@section('sidebar')
    <div class="sidebar">
        <div class="sidebar-item">
            <div class="sidebar-item__title">Категории</div>
            <div class="sidebar-item__content">
                <ul class="sidebar-category">
                    @foreach($categories as $category)
                        <li class="sidebar-category__item"><a href="{{ route('category', ['category_id' => $category->id]) }}" class="sidebar-category__item__link">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="sidebar-item">
            <div class="sidebar-item__title">Последние новости</div>
            <div class="sidebar-item__content">
                <div class="sidebar-news">
                    <div class="sidebar-news__item">
                        <div class="sidebar-news__item__preview-news"><img src="img/cover/game-2.jpg" alt="image-new" class="sidebar-new__item__preview-new__image"></div>
                        <div class="sidebar-news__item__title-news"><a href="#" class="sidebar-news__item__title-news__link">О новых играх в режиме VR</a></div>
                    </div>
                    <div class="sidebar-news__item">
                        <div class="sidebar-news__item__preview-news"><img src="img/cover/game-1.jpg" alt="image-new" class="sidebar-new__item__preview-new__image"></div>
                        <div class="sidebar-news__item__title-news"><a href="#" class="sidebar-news__item__title-news__link">О новых играх в режиме VR</a></div>
                    </div>
                    <div class="sidebar-news__item">
                        <div class="sidebar-news__item__preview-news"><img src="img/cover/game-4.jpg" alt="image-new" class="sidebar-new__item__preview-new__image"></div>
                        <div class="sidebar-news__item__title-news"><a href="#" class="sidebar-news__item__title-news__link">О новых играх в режиме VR</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="content-middle">
        <div class="content-head__container">
            <div class="content-head__title-wrap">
                <div class="content-head__title-wrap__title bcg-title">Мои заказы</div>
            </div>
            <div class="content-head__search-block">
                <div class="search-container">
                    <form class="search-container__form" method="post" action="{{ route('search') }}">
                        {{csrf_field()}}
                        <input name="search" type="text" class="search-container__form__input">
                        <button type="submit" class="search-container__form__btn">search</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="cart-product-list">
            @foreach($products as $product)
            <div class="cart-product-list__item">
                <div class="cart-product__item__product-photo"><img src="{{$product->pic_url}}" class="cart-product__item__product-photo__image"></div>
                <div class="cart-product__item__product-name">
                    <div class="cart-product__item__product-name__content"><a href="{{ route('product', ['product_id' => $product->id]) }}">{{$product->name}}</a></div>
                </div>
                <div class="cart-product__item__cart-date">
                    <div class="cart-product__item__cart-date__content">{{ date('d.m.Y') }}</div>
                </div>
                <div class="cart-product__item__product-price"><span class="product-price__value">{{$product->price}} рублей</span></div>
            </div>
            @endforeach
            <div class="cart-product-list__result-item">
                <div class="cart-product-list__result-item__text">Итого</div>
                <div class="cart-product-list__result-item__value">{{$full_price}} рублей</div>
            </div>
        </div>
        <div class="content-footer__container">
            <div class="btn-buy-wrap"><a href="/cart/clear" class="btn-buy-wrap__btn-link">Очистить корзину</a></div>
        </div>
        <div class="content-footer__container">
            <div class="btn-buy-wrap"><a href="#" id="show_popup" data-toggle-id="popup" class="btn-buy-wrap__btn-link">Перейти к оплате</a></div>
        </div>
    </div>
    <div class="content-bottom"></div>
@endsection


@section('popup')
    <div class="popup-wrapper" id="popup" hidden>
        <div class="popup_container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Ваши контактные данные для связи с менеджером</div>

                        <div class="card-body">
                            <form method="POST" action="{{route('cart.buy')}}">
                                {{csrf_field()}}

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Имя</label>

                                    <div class="col-md-6">
                                        @auth
                                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{Auth::user()->name}}" required autofocus>
                                        @else
                                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                        @endauth
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                                    <div class="col-md-6">
                                        @auth
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{Auth::user()->email}}" required>
                                        @else
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                        @endauth

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">Ок</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection