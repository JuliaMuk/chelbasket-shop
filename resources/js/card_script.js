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
