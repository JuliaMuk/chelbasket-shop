<x-autorisation-layout>
    <x-slot:title>
        Авторизация
    </x-slot:title>

      <div class="main-navigation">
        <a href="{{ route('autorisation') }}">
          <button class="btn-autorisation">Вход</button>
        </a>
        <a href="{{ route('registration') }}">
          <button class="btn-registration">Регистрация</button>
        </a>
      </div>

      <form action="user" class="main-form">
        <input
          class="input-text"
          type="tel"
          id="phone"
          name="phone"
          placeholder="Номер телефона"
          required
        />
        <input
          class="input-text"
          type="password"
          id="password"
          name="password"
          placeholder="Пароль"
          required
        />
        <input
          class="input-button"
          type="submit"
          name="entrance"
          id="btn-entrance"
          value="Войти"
        />
      </form>

</x-autorisation-layout>