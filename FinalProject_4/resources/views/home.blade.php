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
                <div class="content-head__title-wrap__title bcg-title">Последние товары</div>
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
            <div class="products-columns">
                @foreach($products as $product)
                <div class="products-columns__item">
                    <div class="products-columns__item__title-product"><a href="{{ route('product', ['product_id' => $product->id]) }}" class="products-columns__item__title-product__link">{{$product->name}}</a></div>
                    <div class="products-columns__item__thumbnail"><a href="{{ route('product', ['product_id' => $product->id]) }}" class="products-columns__item__thumbnail__link"><img src="{{$product->pic_url}}" alt="Preview-image" class="products-columns__item__thumbnail__img"></a></div>
                    <div class="products-columns__item__description"><span class="products-price">{{$product->price}} руб.</span><a href="#" class="btn btn-blue">Купить</a></div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="content-footer__container">
            {{$products->links('pagination')}}
        </div>
    </div>
@endsection
