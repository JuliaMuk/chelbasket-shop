@push('vite')
    @vite(['resources/css/card.css'])
    @vite('resources/css/overlay.css')
@endpush

<x-main-layout>
    <x-slot:title>
        Челбаскет
    </x-slot:title>
    <div class="main">
        <div class="main-product">
            <div class="width">
                <div class="product-container">
                    <div class="product-gallery">
                        <div class="gallery-container">
                            <div class="gallery-thumbs-vertical">
                                <div class="thumb thumb-active" style="background-image: url('img/mauka/mauka_black_1.jpg')"></div>
                                <div class="thumb" style="background-image: url('img/mauka/mauka_black_1.jpg')"></div>
                                <div class="thumb" style="background-image: url('img/mauka/mauka_black_1.jpg')"></div>
                            </div>
                            <div class="gallery-main">
                                <div class="swiper product-main-slider">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="img/mauka/mauka_black_1.jpg" alt="Товар">
                                        </div>
                                    </div> 
                                </div>
                                 <div class="gallery-nav-bottom">
                                        <button class="gallery-nav-btn-bottom prev-btn">&lt;</button>
                                        <button class="gallery-nav-btn-bottom next-btn">&gt;</button>
                                </div>
                                <div class="rating-badge">
                                    <span class="star">★</span>
                                    <span>5</span>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    
                    <div class="product-info">
                        <div>
                            <h1 class="product-title">{{ $product->name }}</h1>
                        </div>
                        <div class="size-section">
                            <h3 class="section-title">Размер</h3>
                            <div class="size-grid">
                                @foreach ($product->characteristics  as $key => $value)
                                <button class="size-btn" data-size="{{ $key  }}" {{ $value == 0 ? 'disabled':'' }}>
                                    {{ $key  }}
                                </button>
                                @endforeach
                                
                            </div>
                        </div>

                        <div class="description-section">
                            <h3 class="section-title">Описание</h3>
                            <p class="description-text">
                                {{ $product->description }}
                            </p>
                        </div>

                        <div class="action-buttons">
                            <button class="btn btn-primary" id="addToCartBtn">В КОРЗИНУ</button>
                            {{--<button class="btn btn-secondary" id="leaveReviewBtn">ОСТАВИТЬ ОТЗЫВ</button>--}}
                        </div>
                    </div>
                </div>

                {{-- <section class="reviews-section">
                    <h2 class="section-title-large">ОТЗЫВЫ</h2>
                    <div class="swiper reviews-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-button-prev reviews-button-prev">&lt;</div>
                            <div class="swiper-slide">
                                <div class="review-card">
                                    <div class="review-header">
                                        <span class="review-name">ЕКАТЕРИНА</span>
                                        <span class="review-date">10 ноября</span>
                                        <span class="review-rating">★★★★★</span>
                                    </div>
                                    <p class="review-text">
                                        Товар хороший, но размер оказался немного больше, чем ожидала. Цвет насыщенный, но ткань могла бы быть чуть плотнее.
                                    </p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="review-card">
                                    <div class="review-header">
                                        <span class="review-name">АЛЕКСАНДР</span>
                                        <span class="review-date">15 ноября</span>
                                        <span class="review-rating">★★★★★</span>
                                    </div>
                                    <p class="review-text">
                                        Отличная качество! Быстрая доставка. Рекомендую! Логотип нанесён аккуратно и держится отлично.
                                    </p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="review-card">
                                    <div class="review-header">
                                        <span class="review-name">МАКСИМ</span>
                                        <span class="review-date">1 ноября</span>
                                        <span class="review-rating">★★★★★</span>
                                    </div>
                                    <p class="review-text">
                                        Качество отличное, все как на фото! Рекомендую всем болельщикам. Оформление красивое и оригинальное.
                                    </p>
                                </div>
                            </div>
                            <div class="swiper-button-next reviews-button-next">&gt;</div>
                        </div>
                        
                        
                    </div>
                </section>--}}
            </div>
        </div>
        <div class="modal modal-size" id="modalSize">
            <div class="modal-content">
                <button class="modal-close" data-modal="modalSize">✕</button>
                <h2 class="modal-title">Выберите размер</h2>
                <div class="modal-size-grid">
                    <button class="modal-size-btn" data-size="XS">
                        <span>XS</span>
                        <span>40</span>
                    </button>
                    <button class="modal-size-btn" data-size="S">
                        <span>S</span>
                        <span>42</span>
                    </button>
                    <button class="modal-size-btn" data-size="M">
                        <span>M</span>
                        <span>44</span>
                    </button>
                    <button class="modal-size-btn" data-size="L">
                        <span>L</span>
                        <span>46</span>
                    </button>
                    <button class="modal-size-btn" data-size="XL">
                        <span>XL</span>
                        <span>48</span>
                    </button>
                    <button class="modal-size-btn" data-size="XXL">
                        <span>XXL</span>
                        <span>50</span>
                    </button>
                    <button class="modal-size-btn" data-size="3XL">
                        <span>3XL</span>
                        <span>52</span>
                    </button>
                    <button class="modal-size-btn" data-size="4XL">
                        <span>4XL</span>
                        <span>56</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="modal modal-review" id="modalReview">
            <div class="modal-content">
                <button class="modal-close" data-modal="modalReview">✕</button>
                <h2 class="modal-title">Оставить отзыв</h2>
                
                <div class="modal-product-info">
                    <img src="img/mauka/mauka_black_1.jpg" alt="Товар" class="modal-product-img">
                    <div>
                        <p class="modal-product-name">Футболка с логотипом</p>
                        <p class="modal-product-size">Размер: <span id="selectedSizeDisplay">XS</span></p>
                    </div>
                </div>

                <form class="review-form" id="reviewForm">
                    <!-- Рейтинг -->
                    <div class="form-group">
                        <label>Оценка</label>
                        <div class="rating-selector">
                            <span class="star" data-rating="1">★</span>
                            <span class="star" data-rating="2">★</span>
                            <span class="star" data-rating="3">★</span>
                            <span class="star" data-rating="4">★</span>
                            <span class="star" data-rating="5">★</span>
                        </div>
                    </div>

                    <!-- Текст отзыва -->
                    <div class="form-group">
                        <label for="reviewText">Комментарий</label>
                        <textarea id="reviewText" placeholder="Поделитесь вашим мнением..." rows="5"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">ОСТАВИТЬ ОТЗЫВ</button>
                </form>
            </div>
        </div>

        <!-- ОВЕРЛЕЙ для модальных окон -->
        <div class="modal-overlay" id="modalOverlay"></div>
    </div>
</x-main-layout>