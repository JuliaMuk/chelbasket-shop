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
            <p>Корзина пуста</p>
            <a href="route('categories')">Выберите товары</a>
            @else

            <div class="basket">
                <div class="products-list">
                    @foreach ($orderItems as $item)
                        <div class="product">
                            <div class="product-image">
                                <img src="{{ asset('storage/'. $item['path_img'])  }}" alt="">
                            </div>
                            <div class="product-info">
                                <div class="product-name">
                                    {{ $item['name'] }}
                                </div>
                                <div class="product-size">
                                {{ $item['characteristic']}}
                                </div>
                            </div>
                            <div class="product-count">
                                <a href="{{ route('order.minus-item',['product_id' => $item['product_id']]) }}" class="count-change">-</a> {{$item['quantity']}} <a href="{{ route('order.plus-item', ['product_id' => $item['product_id']]) }}" class="count-change">+</a>
                            </div>
                            <div class="product-price">
                            {{ $item['price']*$item['quantity'] }}
                            </div>
                            <form action="{{route('order.remove-item')}}" method="POST">
                                @method('delete')
                                @csrf
                                <input type="hidden" name='product_id' value="{{$item['product_id']}}">
                                <button type="submit" id="remove-product">
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