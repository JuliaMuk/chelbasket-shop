@props(['product' => []]) {{-- пропс с дефолтным значением --}}


<div class="card">
    <div class="rating">
        <span>{{ $product->rating }}</span>
        <img class="star" src="/img/icons/star.svg">
    </div>

    <div class="edit">
        <img src="/img/icons/edit.svg">
    </div>

    <img class="card-image" src="{{asset('storage/' . $product->path_img)}}" width="300px" height="294px">

    <div class="description">
        <p class="title">{{ $product->name }}</p>
        <p class="price">{{ number_format($product->price, 0, '.', ' ') }} ₽</p>
    </div>

    <div class="card-button
        {{ $product->stock_quantity > 0 ? '' : 'card-button-none' }}">
        {{ $product->stock_quantity > 0 ? 'В корзину' : 'Нет в наличии' }}
    </div>
</div>
