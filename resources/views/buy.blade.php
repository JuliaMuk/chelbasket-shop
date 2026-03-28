@push('vite')
    @vite('resources/css/buy.css')
@endpush

<x-main-layout>
    <x-slot:title>
        Челбаскет
    </x-slot:title>
    <div class="main">
        <div class="main-container">
            <div class="headline">ОФОРМЛЕНИЕ ЗАКАЗА</div>
            <div class="buy-wrap">
                <form id="buy-form">
                    <input type="text" name="fullname" placeholder="ФИО*" required>
                    <input type="email" name="email" placeholder="Эл.почта*"required>
                    <input type="tel" name="phone" placeholder="Номер телефона*" required>
                    <input type="text" name="city" placeholder="Город*" required>
                    <input type="text" name="pick-up-point" placeholder="Пункт получения*" required>
                    <input type="text" name="comment" placeholder="Комментарий*" required>
                    <button id="place-an-order" type="submit">ОФОРМИТЬ ЗАКАЗ</button>
                </form>
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
                </div>
            </div>
        </div>
    </div>
</x-main-layout>