@push('vite')
    @vite('resources/css/catalog.css')
@endpush

<x-main-layout>
    <x-slot:title>
        Челбаскет
    </x-slot:title>
    <main class="main-catalog">
        <div class="width">
            <h1 class="title-catalog">Каталог</h1>
            <div class="cards" id="cardsContainer">
                <a href="new-collection" class="card">
                    <img src="img/catalog/баннер1.svg" alt="">
                </a>
                <a href="sweatshirts" class="card">
                    <img src="img/catalog/баннер2.svg" alt="">
                </a>
                <a href="t-shirt" class="card">
                    <img src="img/catalog/баннер3.svg" alt="">
                </a>
                <a href="souvenirs" class="card">
                    <img src="img/catalog/баннер4.svg" alt="">
                </a>
                <a href="singlet" class="card">
                    <img src="img/catalog/баннер5.svg" alt="">
                </a>
                <a href="form" class="card">
                    <img src="img/catalog/баннер6.svg" alt="">
                </a>
                <a href="balls" class="card">
                    <img src="img/catalog/баннер7.svg" alt="">
                </a>
            </div>
      </div>
    </main>
</x-main-layout>