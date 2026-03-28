@push('vite')
    @vite('resources/css/balls.css')
    @vite('resources/css/cards.css')
    @vite('resources/css/overlay.css')
    @vite('app/Models/Product.php')
@endpush

<x-main-layout>
    <x-slot:title>
        Мячи
    </x-slot:title>

    <div class="main">
        <div class="width">
            <h1 class="title-catalog">{{ $category->name ?? 'Новая коллекция' }}</h1>

            


            <div class="more-cards">
                <div class="cards">

                    

                    @foreach ($products as $product)
                        <a href="{{ route('card') }}" class="card-link">
                            <x-cards :products="[$product]" />
                        </a>
                    @endforeach

                </div>
            </div>

      
        </div>
    </div>
 
</x-main-layout>