<div class="filter-panel" id="filterPanel">

    <div class="filter-header">
        <h2>ФИЛЬТРЫ</h2>
        <button class="filter-close-btn" id="filterClose">✕</button>
    </div>

    @php
        $sizes = [
            ['name' => 'XS', 'range' => '42–44'],
            ['name' => 'S', 'range' => '44–46'],
            ['name' => 'M', 'range' => '48–50'],
            ['name' => 'L', 'range' => '52–54'],
            ['name' => 'XL', 'range' => '56–58'],
            ['name' => 'XXL', 'range' => '60–62'],
        ];

        $genders = ['Мужской', 'Женский', 'Унисекс'];

        $colors = [
            'Красный', 'Синий', 'Оранжевый',
            'Зеленый', 'Белый', 'Черный',
            'Желтый', 'Фиолетовый'
        ];
    @endphp

    <div class="filter-content">
        <h3>ЦЕНА &#8381</h3>
        <div class="price-box">
            <input type="text" name="price_from" placeholder="500">
            <span>—</span>
            <input type="text" name="price_to" placeholder="500">
        </div>
        <h3>РАЗМЕР</h3>
        <div class="size-box">
            @foreach($sizes as $size)
                <div class="size-item">
                    {{ $size['name'] }}<br>
                    {{ $size['range'] }}
                </div>
            @endforeach
        </div>
        <h3>ПОЛ</h3>
        @foreach($genders as $gender)
            <label class="custom-checkbox">
                <input type="checkbox" name="gender[]" value="{{ $gender }}">
                <span>{{ $gender }}</span>
            </label>
        @endforeach
        <h3>ЦВЕТ</h3>
        @foreach($colors as $color)
            <label class="custom-checkbox">
                <input type="checkbox" name="color[]" value="{{ $color }}">
                <span>{{ $color }}</span>
            </label>
        @endforeach
    </div>
    <button class="apply-btn">ПРИМЕНИТЬ ФИЛЬТРЫ</button>
</div>