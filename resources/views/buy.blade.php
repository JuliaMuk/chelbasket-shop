@push('vite')
    @vite(['resources/css/buy.css', 'resources/js/basket.js'])
@endpush

<x-main-layout>
    <x-slot:title>
        Челбаскет
    </x-slot:title>
    <div class="main">
        <div class="main-container">
            <div class="headline">ОФОРМЛЕНИЕ ЗАКАЗА</div>
            <div class="buy-wrap">
                <form id="buy-form" action="{{ route('order.create') }}" method="POST">
                    @csrf
                    <input type="text" name="customer_name" placeholder="ФИО*" required>
                    <input type="email" name="email" placeholder="Эл.почта*"required>
                    <input type="tel" name="phone" placeholder="Номер телефона*" required>
                    <input type="text" name="city" placeholder="Город*" required>
                    <input type="text" name="address" placeholder="Пункт получения*" required>
                    <input type="text" name="comment" placeholder="Комментарий*" required>
                    <button id="place-an-order" type="submit">ОФОРМИТЬ ЗАКАЗ</button>
                </form>
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
                            <div class="product-size">
                            {{ $item['characteristic']}}
                            </div>
                        </div>
                        <div class="product-count" data-id="{{ $item['product_id']}}" data-characteristic="{{ $item['characteristic'] }}">
                                <a href="{{ route('order.minus-item',['product_id' => $item['product_id'],'characteristic' => $item['characteristic']]) }}" class="count-change count-change-minus">-</a> <span>{{$item['quantity']}}</span> <a href="{{ route('order.plus-item', ['product_id' => $item['product_id'],'characteristic' => $item['characteristic']]) }}" class="count-change count-change-plus">+</a>
                            </div>
                        <div class="product-price">
                        {{ $item['price']*$item['quantity'] }}
                        </div>
                        <form action="{{route('order.remove-item')}}" method="POST" class="removeFromCartForm">
                                @method('delete')
                                @csrf
                                <input type="hidden" name='product_id' id='product_id' value="{{$item['product_id']}}">
                                <input type="hidden" name='characteristic' id='characteristic' value="{{$item['characteristic']}}">
                                <button type="submit" id="remove-product">
                                    <img src="img/icons/trashcan.svg" alt="Удалить">
                                </button>
                            </form>
                    </div>
                    @endforeach

                    <div class="order-headline">ИТОГО</div>
                    <div class="total-price">{{ $cost}}₽ </div>
                </div>
            </div>
        </div>
    </div>
</x-main-layout>