@push('vite')
@vite(['resources/css/card.css'])
@endpush



<x-main-layout title="{{ $product->name ?? 'Челбаскет' }}" keywords="{{ $product->keywords ?? 'Челбаскет, футболки, майки, мячи, кофты, сувениры' }}" description="{{ $product->meta_description ?? 'Челбаскет - магазин футболок, майок, мячей, кофт и сувениров' }}" >


  <div class="main-product">
    <div class="width">
      <!-- Хлебные крошки -->
      <nav class="nav-menu">
        <ul class="nav-items">
          <li class="nav-item"><a href="{{ route('home') }}">Главная</a></li>
          <li class="nav-item">/</li>
          <li class="nav-item"><a href="{{ route('categories') }}">Каталог</a></li>
          @if ($product->category)
          <li class="nav-item">/</li>
          <li class="nav-item"><a href="{{ route('catalog', ['category' => $product->category->slug]) }}">{{ $product->category->name }}</a></li>
          @endif
        </ul>
      </nav>

      <!-- Основной контейнер товара -->
      <div class="product-container">
        <!-- Галерея слайдов -->
        <div class="product-gallery">
          <div class="gallery-container">
            <!-- Миниатюры слева -->
            <div class="gallery-thumbs-vertical">
              @isset($product->path_img)
              <div class="thumb thumb-active" style="background-image: url('{{ asset('storage/' . $product->path_img) }}')"></div>
              @else
              <div class="thumb thumb-active" style="background-image: url('{{ asset('img/no-image.webp' ) }}')"></div>
              @endisset
              @isset($product->extra_images)
              @foreach ($product->extra_images as $key => $value)
              <div class="thumb" style="background-image: url('{{ asset('storage/'. $value) }}')"></div>
              @endforeach
              @endisset
            </div>

            <!-- Главный слайдер -->
            <div class="gallery-main">
              <div class="swiper product-main-slider">
                <div class="swiper-wrapper">

                  <div class="swiper-slide">
                    @isset($product->path_img)
                    <img src="{{ asset('storage/' . $product->path_img) }}" alt="{{ $product->name }}">
                    @else
                    <img src="{{ asset('img/no-image.webp') }}" alt="{{ $product->name }}">
                    @endisset
                  </div>
                  @isset($product->extra_images)
                  @foreach ($product->extra_images as $key => $value)
                  <div class="swiper-slide">
                    <img src="{{ asset('storage/' . $value) }}" alt="{{ $product->name }}">
                  </div>
                  @endforeach
                  @endisset
                </div>
              </div>
              <div class="rating-badge">
                <span class="star">★</span>
                <span>{{ $product->rating }}</span>
              </div>
            </div>
          </div>

          <!-- Кнопки навигации снизу -->
          <div class="gallery-nav-bottom">
            <button class="gallery-nav-btn-bottom prev-btn">&lt;</button>
            <button class="gallery-nav-btn-bottom next-btn">&gt;</button>
          </div>
        </div>

        <!-- Информация о товаре -->
        <div class="product-info">
          <!-- Заголовок и рейтинг -->
          <div>
            <h1 class="product-title">{{ $product->name }}</h1>
            <div class="product-rating">
              <span class="star-rating">{{ str_repeat('★', round($product->rating)) . str_repeat('☆', 5 - round($product->rating)) }}</span>
              <span class="rating-count">(5 отзывов)</span>
            </div>
          </div>

          <!-- Выбор размера -->
          <form action="{{ route('order.add-item') }}" method="POST" id="addToCartForm">
            @csrf
            <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
            <input type="hidden" name="characteristic" id="selectedSizeInput" value="">

            @if (count($product->characteristics) > 0)
            <div class="size-section">
              <h3 class="section-title">Размер</h3>
              <div class="size-grid">
                @foreach ($product->characteristics as $key => $value)
                <button type="button" class="size-btn" data-size="{{ $key }}" {{ $value == 0 ? 'disabled' : '' }}>
                  <span>{{ $key }}</span>
                </button>
                @endforeach
              </div>
            </div>
            @endif

            <!-- Описание -->
            <div class="description-section">
              <h3 class="section-title">Описание</h3>
              <p class="description-text">
                {{ $product->description }}
              </p>
            </div>

            <!-- Кнопки действия -->
            <div class="action-buttons">
              @if ($product->stock_quantity > 0)
              <button type="submit" class="btn btn-primary">В КОРЗИНУ</button>
              @else
              <p>нет в наличии</p>
              @endif

              {{--<button type="button" class="btn btn-secondary" id="leaveReviewBtn">ОСТАВИТЬ ОТЗЫВ</button>--}}
            </div>
          </form>
        </div>
      </div>

      <!-- Отзывы -->
      {{--<section class="reviews-section">
                <h2 class="section-title-large">ОТЗЫВЫ</h2>
                <div class="swiper reviews-slider">
                    <div class="swiper-wrapper">
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
                    </div>
                    <div class="swiper-button-prev reviews-button-prev">&lt;</div>
                    <div class="swiper-button-next reviews-button-next">&gt;</div>
                </div>
            </section>--}}
    </div>
  </div>

  <!-- МОДАЛЬНОЕ ОКНО: ВЫБОР РАЗМЕРА -->
  <div class="modal modal-size" id="modalSize">
    <div class="modal-content">
      <button type="button" class="modal-close" data-modal="modalSize">✕</button>
      <h2 class="modal-title">Выберите размер</h2>
      <div class="modal-size-grid">
        @foreach ($product->characteristics as $key => $value)
        @if ($value > 0)
        <button type="button" class="modal-size-btn" data-size="{{ $key }}">
          <span>{{ $key }}</span>
        </button>
        @endif
        @endforeach
      </div>
      <button type="button" class="btn btn-primary" id="confirmSizeBtn">ПОДТВЕРДИТЬ</button>
    </div>
  </div>

  <!-- МОДАЛЬНОЕ ОКНО: ОСТАВИТЬ ОТЗЫВ -->
  <div class="modal modal-review" id="modalReview">
    <div class="modal-content">
      <button type="button" class="modal-close" data-modal="modalReview">✕</button>
      <h2 class="modal-title">Оставить отзыв</h2>

      <div class="modal-product-info">
        <img src="{{ asset('storage/' . $product->path_img) }}" alt="{{ $product->name }}" class="modal-product-img">
        <div>
          <p class="modal-product-name">{{ $product->name }}</p>
          <p class="modal-product-size">Размер: <span id="selectedSizeDisplay">—</span></p>
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
</x-main-layout>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
<script>
  // ============================================
  // ИНИЦИАЛИЗАЦИЯ SWIPER ДЛЯ ГАЛЕРЕИ ТОВАРА
  // ============================================

  const productMainSlider = new Swiper(".product-main-slider", {
    direction: "horizontal",
    loop: true,
    autoplay: {
      delay: 5000,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoHeight: false,
  });

  // ============================================
  // ИНИЦИАЛИЗАЦИЯ SWIPER ДЛЯ ОТЗЫВОВ
  // ============================================

  const reviewsSlider = new Swiper(".reviews-slider", {
    direction: "horizontal",
    loop: true,
    slidesPerView: 3,
    spaceBetween: 30,
    navigation: {
      nextEl: '.reviews-button-next',
      prevEl: '.reviews-button-prev',
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 25,
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 30,
      },
    },
  });

  // ============================================
  // УПРАВЛЕНИЕ МИНИАТЮРАМИ ГАЛЕРЕИ
  // ============================================

  const thumbs = document.querySelectorAll(".gallery-thumbs-vertical .thumb");
  const nextBtn = document.querySelector(".gallery-nav-btn-bottom.next-btn");
  const prevBtn = document.querySelector(".gallery-nav-btn-bottom.prev-btn");

  thumbs.forEach((thumb, index) => {
    thumb.addEventListener("click", () => {
      productMainSlider.slideToLoop(index);
      updateThumbActive(index);
    });
  });

  if (nextBtn) {
    nextBtn.addEventListener("click", () => {
      productMainSlider.slideNext();
    });
  }

  if (prevBtn) {
    prevBtn.addEventListener("click", () => {
      productMainSlider.slidePrev();
    });
  }

  // Обновление активной миниатюры при смене слайда
  productMainSlider.on("slideChange", () => {
    const activeIndex = productMainSlider.realIndex;
    updateThumbActive(activeIndex);
  });

  function updateThumbActive(index) {
    thumbs.forEach((thumb, i) => {
      if (i === index) {
        thumb.classList.add("thumb-active");
      } else {
        thumb.classList.remove("thumb-active");
      }
    });
  }

  // ============================================
  // УПРАВЛЕНИЕ РАЗМЕРАМИ
  // ============================================

  const sizeButtons = document.querySelectorAll(".size-btn");
  let selectedSize = null;

  sizeButtons.forEach((btn) => {
    btn.addEventListener("click", () => {
      sizeButtons.forEach((b) => b.classList.remove("active"));
      btn.classList.add("active");
      selectedSize = btn.dataset.size;
      updateSelectedSizeDisplay();
    });
  });

  function updateSelectedSizeDisplay() {
    const display = document.getElementById("selectedSizeDisplay");
    if (display) {
      display.textContent = selectedSize || "—";
    }
    const sizeInput = document.getElementById("selectedSizeInput");
    if (sizeInput) {
      sizeInput.value = selectedSize || "";
    }
  }

  // ============================================
  // УПРАВЛЕНИЕ МОДАЛЬНЫМИ ОКНАМИ
  // ============================================

  const modalOverlay = document.getElementById("modalOverlay");
  const modalSize = document.getElementById("modalSize");
  const modalReview = document.getElementById("modalReview");
  const addToCartBtn = document.getElementById("addToCartBtn");
  const leaveReviewBtn = document.getElementById("leaveReviewBtn");
  const confirmSizeBtn = document.getElementById("confirmSizeBtn");
  const closeButtons = document.querySelectorAll(".modal-close");

  // Открытие модального окна выбора размера
  if (addToCartBtn) {
    addToCartBtn.addEventListener("click", () => {
      openModal(modalSize);
      updateModalSizeActive();
    });
  }

  // Открытие модального окна отзыва
  if (leaveReviewBtn) {
    leaveReviewBtn.addEventListener("click", () => {
      openModal(modalReview);
    });
  }

  // Подтверждение размера и отправка формы
  if (confirmSizeBtn) {
    confirmSizeBtn.addEventListener("click", () => {
      if (!selectedSize) {
        alert("Пожалуйста, выберите размер");
        return;
      }
      // Установить размер в скрытое поле и отправить форму
      const sizeInput = document.getElementById("selectedSizeInput");
      if (sizeInput) {
        sizeInput.value = selectedSize;
      }
      closeModal(modalSize);
      // Отправить форму
      document.getElementById("addToCartForm").submit();
    });
  }

  // Закрытие модальных окон
  closeButtons.forEach((btn) => {
    btn.addEventListener("click", () => {
      const modalId = btn.dataset.modal;
      const modal = document.getElementById(modalId);
      closeModal(modal);
    });
  });

  // Закрытие при клике на оверлей
  if (modalOverlay) {
    modalOverlay.addEventListener("click", () => {
      closeModal(modalSize);
      closeModal(modalReview);
    });
  }

  function openModal(modal) {
    if (!modal) return;
    modalOverlay.classList.add("active");
    modal.classList.add("active");
    document.body.style.overflow = "hidden";
  }

  function closeModal(modal) {
    if (!modal) return;
    modalOverlay.classList.remove("active");
    modal.classList.remove("active");
    document.body.style.overflow = "";
  }

  // ============================================
  // ВЫБОР РАЗМЕРА В МОДАЛЬНОМ ОКНЕ
  // ============================================

  const modalSizeButtons = document.querySelectorAll(".modal-size-btn");

  modalSizeButtons.forEach((btn) => {
    btn.addEventListener("click", () => {
      modalSizeButtons.forEach((b) => b.classList.remove("selected"));
      btn.classList.add("selected");
      selectedSize = btn.dataset.size;
      updateSelectedSizeDisplay();
    });
  });

  function updateModalSizeActive() {
    modalSizeButtons.forEach((btn) => {
      if (btn.dataset.size === selectedSize) {
        btn.classList.add("selected");
      } else {
        btn.classList.remove("selected");
      }
    });
  }

  // ============================================
  // ОТПРАВКА ОТЗЫВА
  // ============================================

  const reviewForm = document.getElementById("reviewForm");
  const starRatings = document.querySelectorAll(".rating-selector .star");
  let selectedRating = 0;

  starRatings.forEach((star) => {
    star.addEventListener("click", () => {
      selectedRating = parseInt(star.dataset.rating);
      updateStarRatings();
    });

    star.addEventListener("mouseover", () => {
      const hoverRating = parseInt(star.dataset.rating);
      starRatings.forEach((s, index) => {
        if (index < hoverRating) {
          s.classList.add("active");
        } else {
          s.classList.remove("active");
        }
      });
    });
  });

  function updateStarRatings() {
    starRatings.forEach((star, index) => {
      if (index < selectedRating) {
        star.classList.add("active");
      } else {
        star.classList.remove("active");
      }
    });
  }

  if (reviewForm) {
    reviewForm.addEventListener("submit", (e) => {
      e.preventDefault();

      const reviewText = document.getElementById("reviewText").value;

      if (!selectedRating) {
        alert("Пожалуйста, выберите оценку");
        return;
      }

      if (!reviewText.trim()) {
        alert("Пожалуйста, напишите комментарий");
        return;
      }

      alert(
        `Отзыв отправлен!\nРазмер: ${selectedSize || "не выбран"}\nОценка: ${selectedRating} звёзд\nКомментарий: ${reviewText}`
      );

      reviewForm.reset();
      selectedRating = 0;
      updateStarRatings();

      closeModal(modalReview);
    });
  }

  // ============================================
  // ИНИЦИАЛИЗАЦИЯ
  // ============================================

  // Устанавливаем первый активный размер при загрузке
  const firstActiveSize = document.querySelector(".size-btn:not(:disabled)");
  if (firstActiveSize) {
    firstActiveSize.click();
  }

  // ============================================
  // ДОБАВЛЕНИЕ ТОВАРА В КОРЗИНУ
  // ============================================

  document.addEventListener("DOMContentLoaded", () => {
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const addToCartForm = document.getElementById('addToCartForm');

    addToCartForm.addEventListener('submit', (e) => {

      e.preventDefault();
      fetch('/order/add-item', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token, // Required for Laravel "web" routes
            'Accept': 'application/json'
          },
          body: JSON.stringify({
            product_id: document.getElementById('product_id').value,
            characteristic: document.getElementById('selectedSizeInput').value
          })
        })
        .then(response => response.json())
        .then(data => {
          if (document.getElementById('basket-count').classList.contains('invisible')) {
            document.getElementById('basket-count').classList.remove('invisible')
          }
          document.getElementById('basket-count').textContent = data.count
        })
        .catch(error => console.error('Error:', error));
    })
  });
</script>