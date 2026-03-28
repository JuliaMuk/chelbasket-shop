<x-autorisation-layout>
    <x-slot:title>
        Регистрация
    </x-slot:title>

        <!-- <h1></h1> -->
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
            type="text"
            id="full-name"
            name="fullName"
            placeholder="ФИО*"
            required
          />
          <input
            class="input-text"
            type="email"
            id="email"
            name="email"
            placeholder="Эл. почта*"
            required
          />
          <input
            class="input-text"
            type="tel"
            id="phone"
            name="phone"
            placeholder="Номер телефона*"
            required
          />
          <input
            class="input-text"
            type="password"
            id="password"
            name="password"
            placeholder="Пароль*"
            required
          />

          <div class="agreement">
            <input type="checkbox" id="agreement" name="agreement" required />
            <label for="agreementDescription">
              Я согласен получать коммерческие сообщения о компаниях
              Бк“ЧЕЛБАСКЕТ“, их спонсорах и/или организациях, связанных с
              деятельностью Клуба.
            </label>
          </div>

          <p class="warning-text">
            Создавая учётную запись и регистрируясь, вы подтверждаете, что
            прочитали и принимаете политику конфиденциальности.
          </p>

          <input
            class="input-button"
            type="submit"
            name="entrance"
            id="btn-entrance"
            value="Зарегистрироваться"
          />
        </form>

    
</x-autorisation-layout>