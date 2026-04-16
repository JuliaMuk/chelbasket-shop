@push('vite')
@vite(['resources/css/basket.css', 'resources/js/basket.js'])
@endpush

<x-main-layout>
    <x-slot:title>
        Челбаскет
    </x-slot:title>
    <div class="main">
        <div class="main-container">
            <div class="headline">КОРЗИНА</div>
            @if (!$orderItems)
            <div class="empty-basket">
                <p class="empty-basket-title">Корзина пуста</p>
                <p class="empty-basket-text">Добавьте товары из каталога, чтобы оформить заказ</p>
                <a href="{{route('categories')}}" class="btn-go-to-catalog">Перейти в каталог</a>
            </div>
            @else

            <div class="basket">
                <div class="products-list">
                    @foreach ($orderItems as $item)
                    <div class="product">
                        <div class="product-image">
                            @isset($item['path_img'])
                            <img src="{{ asset('storage/'. $item['path_img']) }}" alt="{{ $item['name'] }}">
                            @else
                            <img src="{{ asset('img/no-image.webp') }}" alt="{{ $item['name'] }}">
                            @endisset
                        </div>
                        <div class="product-info">
                            <div class="product-name">
                                {{ $item['name'] }}
                            </div>
                            @if (isset($item['characteristic']) && $item['characteristic'])
                            <div class="product-size">
                                Размер: {{ $item['characteristic'] }}
                            </div>
                            @endif
                        </div>
                        <div class="product-count" data-id="{{ $item['product_id']}}" data-characteristic="{{ $item['characteristic'] }}">
                            <a href="{{ route('order.minus-item',['product_id' => $item['product_id'], 'characteristic' => $item['characteristic']]) }}" class="count-change count-change-minus">-</a> <span>{{$item['quantity']}}</span><a href="{{ route('order.plus-item', ['product_id' => $item['product_id'], 'characteristic' => $item['characteristic']]) }}" class="count-change count-change-plus">+</a>
                        </div>
                        <div class="product-price">
                            {{ $item['price']*$item['quantity'] }}₽
                        </div>
                        <form action="{{route('order.remove-item')}}" method="POST" class="removeFromCartForm">
                            @method('delete')
                            @csrf
                            <input type="hidden" name='product_id' id='product_id' value="{{$item['product_id']}}">
                            <input type="hidden" name='characteristic' id='characteristic' value="{{$item['characteristic']}}">
                            <button type="submit" class="remove-product-btn">
                                <img src="img/icons/trashcan.svg" alt="Удалить">
                            </button>
                        </form>

                    </div>
                    @endforeach





                </div>
                <div class="basket-order">
                    <div class="order-headline">ИТОГО</div>
                    <div class="total-price">{{ $cost}}₽ </div>
                    <a href="{{ route('buy') }}" style="width: 100%;">
                        <button id="place-an-order" style="width: 100%;">
                            ОФОРМИТЬ ЗАКАЗ
                        </button>
                    </a>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-main-layout>

<script>
   
</script>