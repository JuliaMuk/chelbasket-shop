@push('vite')
    @vite('resources/css/balls.css')
    @vite('resources/css/cards.css')
    @vite('resources/css/overlay.css')
    @vite('app/Models/Product.php')
@endpush

<x-main-layout title="{{$category->name ?? 'Новая коллекция'}}" keywords="{{ $category->keywords ?? 'Челбаскет, футболки, майки, мячи, кофты, сувениры' }}" description="{{$category->meta_description ?? 'Новая коллекция' }}" >
        
    <div class="main">
        <div class="width">
            <!-- Хлебные крошки -->
            <nav class="nav-menu">
                <ul class="nav-items">
                    <li class="nav-item"><a href="{{ route('home') }}">Главная</a></li>
                    <li class="nav-item">/</li>
                    <li class="nav-item"><a href="{{ route('categories') }}">Каталог</a></li>
                </ul>
            </nav>
            <h1 class="title-catalog">{{ $category->name ?? 'Новая коллекция' }}</h1>

            


            <div class="more-cards">
                <div class="cards">

                    

                    @foreach ($products as $product)   
                            <a href="{{ route('card', ['product' => $product]) }}" class="card-link">
                                <x-card :product="$product" />
                            </a>
                    @endforeach

                </div>
            </div>

      
        </div>
    </div>
 
</x-main-layout>