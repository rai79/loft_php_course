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
                        <div class="sidebar-news__item__preview-news"><img src="/img/cover/game-2.jpg" alt="image-new" class="sidebar-new__item__preview-new__image"></div>
                        <div class="sidebar-news__item__title-news"><a href="#" class="sidebar-news__item__title-news__link">О новых играх в режиме VR</a></div>
                    </div>
                    <div class="sidebar-news__item">
                        <div class="sidebar-news__item__preview-news"><img src="/img/cover/game-1.jpg" alt="image-new" class="sidebar-new__item__preview-new__image"></div>
                        <div class="sidebar-news__item__title-news"><a href="#" class="sidebar-news__item__title-news__link">О новых играх в режиме VR</a></div>
                    </div>
                    <div class="sidebar-news__item">
                        <div class="sidebar-news__item__preview-news"><img src="/img/cover/game-4.jpg" alt="image-new" class="sidebar-new__item__preview-new__image"></div>
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
                <div class="content-head__title-wrap__title bcg-title">{{$product->name}} в разделе {{$product->category->name}}</div>
            </div>
            <div class="content-head__search-block">
                <div class="search-container">
                    <form class="search-container__form">
                        <input type="text" class="search-container__form__input">
                        <button class="search-container__form__btn">search</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="content-main__container">
            <div class="product-container">
                <div class="product-container__image-wrap"><img src="{{$product->pic_url}}" class="image-wrap__image-product"></div>
                <div class="product-container__content-text">
                    <div class="product-container__content-text__title">{{$product->name}}</div>
                    <div class="product-container__content-text__price">
                        <div class="product-container__content-text__price__value">
                            Цена: <b>{{$product->price}}</b>
                            руб.
                        </div><a href="#" id="show_popup" data-toggle-id="popup" class="btn btn-blue">Купить</a>
                    </div>
                    <div class="product-container__content-text__description">
                        {{$product->description}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-bottom">
        <div class="line"></div>
        <div class="content-head__container">
            <div class="content-head__title-wrap">
                <div class="content-head__title-wrap__title bcg-title">Посмотрите наши товары</div>
            </div>
        </div>
        <div class="content-main__container">
            <div class="products-columns">
                <div class="products-columns__item">
                    <div class="products-columns__item__title-product"><a href="#" class="products-columns__item__title-product__link">The Witcher 3: Wild Hunt</a></div>
                    <div class="products-columns__item__thumbnail"><a href="#" class="products-columns__item__thumbnail__link"><img src="/img/cover/game-1.jpg" alt="Preview-image" class="products-columns__item__thumbnail__img"></a></div>
                    <div class="products-columns__item__description"><span class="products-price">400 руб</span><a href="#" class="btn btn-blue">Купить</a></div>
                </div>
                <div class="products-columns__item">
                    <div class="products-columns__item__title-product"><a href="#" class="products-columns__item__title-product__link">Overwatch</a></div>
                    <div class="products-columns__item__thumbnail"><a href="#" class="products-columns__item__thumbnail__link"><img src="/img/cover/game-2.jpg" alt="Preview-image" class="products-columns__item__thumbnail__img"></a></div>
                    <div class="products-columns__item__description"><span class="products-price">400 руб</span><a href="#" class="btn btn-blue">Купить</a></div>
                </div>
                <div class="products-columns__item">
                    <div class="products-columns__item__title-product"><a href="#" class="products-columns__item__title-product__link">Deus Ex: Mankind Divided</a></div>
                    <div class="products-columns__item__thumbnail"><a href="#" class="products-columns__item__thumbnail__link"><img src="/img/cover/game-3.jpg" alt="Preview-image" class="products-columns__item__thumbnail__img"></a></div>
                    <div class="products-columns__item__description"><span class="products-price">400 руб</span><a href="#" class="btn btn-blue">Купить</a></div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('popup')
<div class="popup-wrapper" id="popup" hidden>
    <div class="popup_container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ваши контактные данные для связи с менеджером</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('product.buy', ['product_id' => $product->id])}}">
                            {{csrf_field()}}

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Имя</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{\Illuminate\Support\Facades\Auth::user()->name}}" required autofocus>

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
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{\Illuminate\Support\Facades\Auth::user()->email}}" required>

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