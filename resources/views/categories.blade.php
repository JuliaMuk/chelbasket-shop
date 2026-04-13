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
                @foreach ($categories as $category)
                    <a href="{{ route('catalog', ['category' => $category->slug]) }}" class="card">
                        <img src="{{ asset('storage/' . $category->path_img) }}" alt="{{ $category->name }}">
                    </a>
                @endforeach     
                <a href="{{ route('catalog', ['category' => 'new-collection']) }}" class="card">
                        <img src="{{ asset('storage/category-images/news.svg') }}" alt="новая коллекция">
                </a>              
            </div>
      </div>
    </main>
</x-main-layout>