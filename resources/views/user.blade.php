@push('vite')
    @vite('resources/css/user.css')
@endpush

<x-main-layout>
    <x-slot:title>
        Челбаскет
    </x-slot:title>
    <div class="main">
      <h2 class="main-title">Личный кабинет</h2>

      <div class="main-navigation">
        <a href="{{ route('history') }}"><button class="btn-history">История заказов</button></a>
        <a href="#"><button class="btn-status">Статус заказа</button></a>
      </div>

      <div class="blocks">
        <div class="personal-information">
          <h3 class="blocks-title">Личная информация</h3>

          <div class="information-users">
            <div class="information-user">
              <p class="blocks-text">Иван Иванов Иванович</p>
              <button onclick="" class="blocks-btn">
                <img src="img/icons/edit.svg" alt="edit" />
              </button>
            </div>
            <div class="information-user">
              <p class="blocks-text">01.01.2000</p>
              <button onclick="" class="blocks-btn">
                <img src="img/icons/edit.svg" alt="edit" />
              </button>
            </div>
            <div class="information-user">
              <p class="blocks-text">email_pochta@gmail.com</p>
              <button onclick="" class="blocks-btn">
                <img src="img/icons/edit.svg" alt="edit" />
              </button>
            </div>
            <div class="information-user">
              <p class="blocks-text">+7 999 123-45-67</p>
              <button onclick="" class="blocks-btn">
                <img src="img/icons/edit.svg" alt="edit" />
              </button>
            </div>
          </div>
        </div>

        <div class="address">
          <h3 class="blocks-title">Адреса</h3>
          <div class="information-address">
            <p class="blocks-text">
              Россия, г. Город, ул. Уличная, д. 1, кв. 1
            </p>
            <p class="blocks-text">
              Россия, г. Город, ул. Уличная, д. 1а, кв. 2
            </p>
          </div>
        </div>
      </div>
    </div>
</x-main-layout>