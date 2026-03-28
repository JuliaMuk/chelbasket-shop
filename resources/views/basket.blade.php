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
            <div class="basket">
                <div class="products-list">
                    <div class="product">
                        <div class="product-image">
                            <img src="img/basket/ball_basket.png" alt="">
                        </div>
                        <div class="product-info">
                            <div class="product-name">
                                Футболка с печатью
                            </div>
                            <div class="product-size">
                                s <br> 42-44
                            </div>
                        </div>
                        <div class="product-count">
                            <button class="count-change">-</button> 2 <button class="count-change">+</button>
                        </div>
                        <div class="product-price">
                            1 980₽
                        </div>
                        <button id="remove-product">
                            <img src="img/icons/trashcan.svg" alt="Удалить">
                        </button>
                    </div>
                    <div class="product">
                        <div class="product-image">
                            <img src="img/basket/ball_basket.png" alt="">
                        </div>
                        <div class="product-info">
                            <div class="product-name">
                                Футболка с печатью
                            </div>
                            <div class="product-size">
                                s <br> 42-44
                            </div>
                        </div>
                        <div class="product-count">
                            <button class="count-change">-</button> 2 <button class="count-change">+</button>
                        </div>
                        <div class="product-price">
                            1 980₽
                        </div>
                        <button id="remove-product">
                            <img src="img/icons/trashcan.svg" alt="Удалить">
                        </button>
                    </div>
                    <div class="product">
                        <div class="product-image">
                            <img src="img/basket/ball_basket.png" alt="">
                        </div>
                        <div class="product-info">
                            <div class="product-name">
                                Футболка с печатью
                            </div>
                            <div class="product-size">
                                s <br> 42-44
                            </div>
                        </div>
                        <div class="product-count">
                            <button class="count-change">-</button> 2 <button class="count-change">+</button>
                        </div>
                        <div class="product-price">
                            1 980₽
                        </div>
                        <button id="remove-product">
                            <img src="img/icons/trashcan.svg" alt="Удалить">
                        </button>
                    </div>
                </div>
                <div class="basket-order">
                    <div class="order-headline">ИТОГО</div>
                    <div class="total-price">12 440₽</div>
                    <a href="{{ route('buy') }}" style="width: 100%;">
                        <button id="place-an-order" style="width: 100%;">
                            ОФОРМИТЬ ЗАКАЗ
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-main-layout>