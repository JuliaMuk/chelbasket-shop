<div class="filter-panel" id="filterPanel">

    <div class="filter-header">
        <h2>ФИЛЬТРЫ</h2>
        <button class="filter-close-btn" id="filterClose">✕</button>
    </div>

    @php
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