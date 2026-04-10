<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
   use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::create(['name' => 'Мячи','slug' => Str::slug('Мячи', '-'),'path_img' => 'category-images/banner7.svg']);
        Category::create(['name' => 'Кофты','slug' => Str::slug('Кофты', '-'),'path_img' => 'category-images/banner2.svg']);
        Category::create(['name' => 'Футболки','slug' => Str::slug('Футболки', '-'),'path_img' => 'category-images/banner3.svg']);
        Category::create(['name' => 'Майки','slug' => Str::slug('Майки', '-'),'path_img' => 'category-images/banner5.svg']);
        Category::create(['name' => 'Форма','slug' => Str::slug('Форма', '-'),'path_img' => 'category-images/banner6.svg']);
        Category::create(['name' => 'Сувениры','slug' => Str::slug('Сувениры', '-'),'path_img' => 'category-images/banner4.svg']);

        ///Мячи(1) 
        Product::create([
            'category_id' => 1,
            'name' => 'Мяч баскетбольный',
            'slug' => Str::slug('Мяч баскетбольный', '-'),
            'is_new' => true,
            'description' => 'Официальный баскетбольный мяч с логотипом',
            'stock_quantity' => 0,
            'price' => 3990,
            'characteristics' => [],
            'path_img' => 'img/cards/ball-basket.jpg',
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Мяч мягкий',
            'slug' => Str::slug('Мяч мягкий', '-'),
            'description' => 'Мягкий антистресс-мяч',
            'stock_quantity' => 10,
            'price' => 1200,
            'characteristics' => [],
            'path_img' => 'img/cards/ball-soft_1.jpg',
        ]);

        //Кофты(2)
        Product::create([
            'category_id' => 2,
            'name' => 'Кофта',
            'slug' => Str::slug('Кофта', '-'),
            'is_new' => true,
            'description' => 'Тёплая кофта с логотипом',
            'stock_quantity' => 10,
            'price' => 3000,
            'characteristics' => [],
            'path_img' => 'images/kofta.jpg',
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Бомбер',
            'slug' => Str::slug('Бомбер', '-'),
            'description' => 'Стильный бомбер',
            'stock_quantity' => 10,
            'price' => 10990,
            'characteristics' => [],
            'path_img' => 'images/bomber.jpg',
        ]);

        //Футболки(3)
        Product::create([
            'category_id' => 3,
            'name' => 'Футболка "Квадрат"',
            'slug' => Str::slug('Футболка Квадрат', '-'),
            'description' => 'Футболка с дизайном "Квадрат"',
            'stock_quantity' => 10,
            'price' => 3500,
            'characteristics' => [],
            'path_img' => 'images/futbolka_kvadrat.jpg',
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Футболка "Logo Chelbasket"',
            'slug' => Str::slug('Футболка Logo Chelbasket', '-'),
            'is_new' => true,
            'description' => 'Футболка с логотипом Chelbasket',
            'stock_quantity' => 10,
            'price' => 2990,
            'characteristics' => [],
            'path_img' => 'images/futbolka_logo.jpg',
        ]);
        
        Product::create([
            'category_id' => 3,
            'name' => 'Футболка "ЧБК"',
            'slug' => Str::slug('Футболка ЧБК', '-'),
            'description' => 'Футболка с надписью ЧБК',
            'stock_quantity' => 10,
            'price' => 1990,
            'characteristics' => [],
            'path_img' => 'images/futbolka_chbk.jpg',
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Футболка "Championship"',
            'slug' => Str::slug('Футболка Championship', '-'),
            'is_new' => true,
            'description' => 'Футболка Championship',
            'stock_quantity' => 10,
            'price' => 2300,
            'characteristics' => [],
            'path_img' => 'images/futbolka_championship.jpg',
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Футболка "CHILL GUY"',
            'slug' => Str::slug('Футболка CHILL GUY', '-'), 
            'is_new' => true,
            'description' => 'Футболка Chill Guy',
            'stock_quantity' => 10,
            'price' => 1990,
            'characteristics' => [],
            'path_img' => 'images/futbolka_chill_guy.jpg',
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Поло "ЧБК"',
            'slug' => Str::slug('Поло ЧБК', '-'),
            'description' => 'Поло с логотипом ЧБК',
            'stock_quantity' => 10,
            'price' => 2500,
            'characteristics' => [],
            'path_img' => 'images/polo_chbk.jpg',
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Футболка с логотипом',
            'slug' => Str::slug('Футболка с логотипом', '-'),
            'description' => 'Базовая футболка с логотипом',
            'stock_quantity' => 10,
            'price' => 1990,
            'characteristics' => [],
            'path_img' => 'images/futbolka_logo_base.jpg',
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Футболка детская вышивка',
            'slug' => Str::slug('Футболка детская вышивка', '-'),
            'description' => 'Детская футболка с вышивкой',
            'stock_quantity' => 10,
            'price' => 1990,
            'characteristics' => [],
            'path_img' => 'images/futbolka_detskaya_vyshivka.jpg',
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Футболка детская с логотипом',
            'slug' => Str::slug('Футболка детская с логотипом', '-'),
            'description' => 'Детская футболка с принтом логотипа',
            'stock_quantity' => 10,
            'price' => 1500,
            'characteristics' => [],
            'path_img' => 'images/futbolka_detskaya_logo.jpg',
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Лонгслив "ВЫШЕ.БЫСТРЕЕ.СИЛЬНЕЕ."',
            'slug' => Str::slug('Лонгслив ВЫШЕ.БЫСТРЕЕ.СИЛЬНЕЕ.', '-'),
            'description' => 'Лонгслив с мотивационной надписью',
            'stock_quantity' => 10,
            'price' => 3200,
            'characteristics' => [],
            'path_img' => 'images/longsleeve_motivation.jpg',
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Лонгслив "ЧБК"',
            'slug' => Str::slug('Лонгслив ЧБК', '-'),
            'description' => 'Лонгслив с логотипом ЧБК',
            'stock_quantity' => 10,
            'price' => 2990,
            'characteristics' => [],
            'path_img' => 'images/longsleeve_chbk.jpg',
        ]);

        //Майки(4) 
        Product::create([
            'category_id' => 4,
            'name' => 'Майка тренировочная "ЧБК"',
            'slug' => Str::slug('Майка тренировочная ЧБК', '-'),
            'description' => 'Тренировочная майка ЧБК',
            'stock_quantity' => 10,
            'price' => 2000,
            'characteristics' => [],
            'path_img' => 'images/mayka_tren_chbk.jpg',
        ]);

        Product::create([
            'category_id' => 4,
            'name' => 'Майка игровая чёрная',
            'slug' => Str::slug('Майка игровая чёрная', '-'),
            'description' => 'Игровая майка чёрного цвета',
            'stock_quantity' => 10,
            'price' => 2500,
            'characteristics' => [],
            'path_img' => 'images/mayka_igrovaya_black.jpg',
        ]);

        Product::create([
            'category_id' => 4,
            'name' => 'Майка игровая белая',
            'slug' => Str::slug('Майка игровая белая', '-'),
            'description' => 'Игровая майка белого цвета',
            'stock_quantity' => 10,
            'price' => 2500,
            'characteristics' => [],
            'path_img' => 'images/mayka_igrovaya_white.jpg',
        ]);    
        
        Product::create([
            'category_id' => 4,
            'name' => 'Майка оранжевая игровая',
            'slug' => Str::slug('Майка оранжевая игровая', '-'),
            'description' => 'Яркая оранжевая игровая майка',
            'stock_quantity' => 10,
            'price' => 2500,
            'characteristics' => [],
            'path_img' => 'images/mayka_orange.jpg',
        ]);

        Product::create([
            'category_id' => 4,
            'name' => 'Майка "MEDIA BASKET"',
            'slug' => Str::slug('Майка MEDIA BASKET', '-'), 
            'description' => 'Майка с надписью MEDIA BASKET',
            'stock_quantity' => 10,
            'price' => 2500,
            'characteristics' => [],
            'path_img' => 'images/mayka_media.jpg',
        ]);

        Product::create([
            'category_id' => 4,
            'name' => 'Майка "Славянка-ЧКПЗ"',
            'slug' => Str::slug('Майка Славянка-ЧКПЗ', '-'),
            'description' => 'Майка Славянка-ЧКПЗ',
            'stock_quantity' => 10,
            'price' => 2000,
            'characteristics' => [],
            'path_img' => 'images/mayka_slavyanka.jpg',
        ]);

        //Форма(5)
        Product::create([
            'category_id' => 5,
            'name' => 'Костюм спортивный',
            'slug' => Str::slug('Костюм спортивный', '-'),
            'description' => 'Спортивный костюм (куртка + штаны)',
            'stock_quantity' => 10,
            'price' => 6990,
            'characteristics' => [],
            'path_img' => 'images/kostyum_sport.jpg',
        ]);

        Product::create([
            'category_id' => 5,
            'name' => 'Шорты',
            'slug' => Str::slug('Шорты', '-'),
            'description' => 'Спортивные шорты',
            'stock_quantity' => 10,
            'price' => 1990,
            'characteristics' => [],
            'path_img' => 'images/shorty.jpg',
        ]);

        Product::create([
            'category_id' => 5,
            'name' => 'Разминка игровая',
            'slug' => Str::slug('Разминка игровая', '-'),
            'description' => 'Игровая разминочная форма',
            'stock_quantity' => 10,
            'price' => 3500,
            'characteristics' => [],
            'path_img' => 'images/razminka.jpg',
        ]);

        //Сувениры(6)
        Product::create([
            'category_id' => 6,
            'name' => 'Значок железный',
            'slug' => Str::slug('Значок железный', '-'),
            'description' => 'Металлический значок с логотипом',
            'stock_quantity' => 10,
            'price' => 450,
            'characteristics' => [],
            'path_img' => 'images/znachok.jpg',
        ]);

        Product::create([
            'category_id' => 6,
            'name' => 'Леброша маленький',
            'slug' => Str::slug('Леброша маленький', '-'),
            'description' => 'Мини-леброша с логотипом',
            'stock_quantity' => 10,
            'price' => 1500,
            'characteristics' => [],
            'path_img' => 'images/lebroshe_small.jpg',
        ]);

        Product::create([
            'category_id' => 6,
            'name' => 'Леброша средний',
            'slug' => Str::slug('Леброша средний', '-'),
            'description' => 'Средний размер леброши',
            'stock_quantity' => 10,
            'price' => 2000,
            'characteristics' => [],
            'path_img' => 'images/lebroshe_medium.jpg',
        ]);

        Product::create([
            'category_id' => 6,
            'name' => 'Леброша большой',
            'slug' => Str::slug('Леброша большой', '-'),
            'description' => 'Большая мягкая леброша',
            'stock_quantity' => 10,
            'price' => 1500,
            'characteristics' => [],
            'path_img' => 'images/lebroshe_large.jpg',
        ]);

        Product::create([
            'category_id' => 6,
            'name' => 'Подушка',
            'slug' => Str::slug('Подушка', '-'),
            'description' => 'Декоративная подушка с принтом',
            'stock_quantity' => 10,
            'price' => 790,
            'characteristics' => [],
            'path_img' => 'images/podushka.jpg',
        ]);

        Product::create([
            'category_id' => 6,
            'name' => 'Наклейка большая',
            'slug' => Str::slug('Наклейка большая', '-'),
            'description' => 'Большая виниловая наклейка',
            'stock_quantity' => 10,
            'price' => 150,
            'characteristics' => [],
            'path_img' => 'images/nakleyka_big.jpg',
        ]);

        Product::create([
            'category_id' => 6,
            'name' => 'Стикерпак',
            'slug' => Str::slug('Стикерпак', '-'),
            'description' => 'Набор стикеров',
            'stock_quantity' => 10,
            'price' => 150,
            'characteristics' => [],
            'path_img' => 'images/stickerpack.jpg',
        ]);

        Product::create([
            'category_id' => 6,
            'name' => 'Браслет силиконовый',
            'slug' => Str::slug('Браслет силиконовый', '-'),
            'description' => 'Силиконовый браслет с логотипом',
            'stock_quantity' => 10,
            'price' => 150,
            'characteristics' => [],
            'path_img' => 'images/braslet.jpg',
        ]);

        Product::create([
            'category_id' => 6,
            'name' => 'Бейсболка детская',
            'slug' => Str::slug('Бейсболка детская', '-'),
            'description' => 'Детская бейсболка с логотипом',
            'stock_quantity' => 10,
            'price' => 1500,
            'characteristics' => [],
            'path_img' => 'images/beysbolka_detskaya.jpg',
        ]);

        Product::create([
            'category_id' => 6,
            'name' => 'Кепка',
            'slug' => Str::slug('Кепка', '-'),
            'description' => 'Классическая кепка с вышивкой',
            'stock_quantity' => 10,
            'price' => 1990,
            'characteristics' => [],
            'path_img' => 'images/kepka.jpg',
        ]);

        Product::create([
            'category_id' => 6,
            'name' => 'Бутылка для воды',
            'slug' => Str::slug('Бутылка для воды', '-'),
            'description' => 'Спортивная бутылка с логотипом',
            'stock_quantity' => 10,
            'price' => 690,
            'characteristics' => [],
            'path_img' => 'images/butilka_voda.jpg',
        ]);

        Product::create([
            'category_id' => 6,
            'name' => 'Ремувка',
            'slug' => Str::slug('Ремувка', '-'),
            'description' => 'Ремувка / бирка на рюкзак',
            'stock_quantity' => 10,
            'price' => 290,
            'characteristics' => [],
            'path_img' => 'images/remuvka.jpg',
        ]);

        Product::create([
            'category_id' => 6,
            'name' => 'Наушники',
            'slug' => Str::slug('Наушники', '-'),
            'description' => 'Проводные/беспроводные наушники',
            'stock_quantity' => 10,
            'price' => 1990,
            'characteristics' => [],
            'path_img' => 'images/naushniki.jpg',
        ]);

        Product::create([
            'category_id' => 6,
            'name' => 'Попсокет',
            'slug' => Str::slug('Попсокет', '-'),
            'description' => 'PopSocket с брендированным дизайном',
            'stock_quantity' => 10,
            'price' => 150,
            'characteristics' => [],
            'path_img' => 'images/popsoket.jpg',
        ]);

        Product::create([
            'category_id' => 6,
            'name' => 'Термос',
            'slug' => Str::slug('Термос', '-'),
            'description' => 'Термос для напитков',
            'stock_quantity' => 10,
            'price' => 1200,
            'characteristics' => [],
            'path_img' => 'images/termos.jpg',
        ]);

        Product::create([
            'category_id' => 6,
            'name' => 'Коврик для мыши',
            'slug' => Str::slug('Коврик для мыши', '-'),
            'description' => 'Игровой коврик с логотипом',
            'stock_quantity' => 10,
            'price' => 690,
            'characteristics' => [],
            'path_img' => 'images/kovrik_mouse.jpg',
        ]);

        Product::create([
            'category_id' => 6,
            'name' => 'Картахолдер',
            'slug' => Str::slug('Картахолдер', '-'),
            'description' => 'Картахолдер для карт',
            'stock_quantity' => 10,
            'price' => 290,
            'characteristics' => [],
            'path_img' => 'images/kartkholder.jpg',
        ]);

        Product::create([
            'category_id' => 6,
            'name' => 'Картахолдер из экокожи',
            'slug' => Str::slug('Картахолдер из экокожи', '-'),
            'description' => 'Стильный картахолдер из экокожи',
            'stock_quantity' => 10,
            'price' => 550,
            'characteristics' => [],
            'path_img' => 'images/kartkholder_eco.jpg',
        ]);

        Product::create([
            'category_id' => 6,
            'name' => '3D стикер',
            'slug' => Str::slug('3D стикер', '-'),
            'description' => 'Объёмный 3D-стикер',
            'stock_quantity' => 10,
            'price' => 100,
            'characteristics' => [],
            'path_img' => 'images/3d_sticker.jpg',
        ]);

        Product::create([
            'category_id' => 6,
            'name' => 'Кружка',
            'slug' => Str::slug('Кружка', '-'),
            'description' => 'Керамическая кружка с принтом',
            'stock_quantity' => 10,
            'price' => 450,
            'characteristics' => [],
            'path_img' => 'images/kruzhka.jpg',
        ]);

        Product::create([
            'category_id' => 6,
            'name' => 'Шарф',
            'slug' => Str::slug('Шарф', '-'),
            'description' => 'Тёплый шарф с логотипом',
            'stock_quantity' => 10,
            'price' => 1290,
            'characteristics' => [],
            'path_img' => 'images/sharf.jpg',
        ]);

        Product::create([
            'category_id' => 6,
            'name' => 'Ручка',
            'slug' => Str::slug('Ручка', '-'),
            'description' => 'Шариковая ручка с логотипом',
            'stock_quantity' => 10,
            'price' => 180,
            'characteristics' => [],
            'path_img' => 'images/ruchka.jpg',
        ]);

        Product::create([
            'category_id' => 6,
            'name' => 'Тетрадь',
            'slug' => Str::slug('Тетрадь', '-'),
            'description' => 'Тетрадь с брендированной обложкой',
            'stock_quantity' => 10,
            'price' => 290,
            'characteristics' => [],
            'path_img' => 'images/tetrad.jpg',
        ]);

        Product::create([
            'category_id' => 6,
            'name' => 'Чехол для телефона',
            'slug' => Str::slug('Чехол для телефона', '-'),
            'description' => 'Защитный чехол с логотипом команды',
            'stock_quantity' => 10,
            'price' => 990,
            'characteristics' => [],
            'path_img' => 'images/chehol_phone.jpg',
        ]);

        Product::create([
            'category_id' => 6,
            'name' => 'Колонка-ночник',
            'slug' => Str::slug('Колонка-ночник', '-'),
            'description' => 'Портативная Bluetooth-колонка с функцией ночника',
            'stock_quantity' => 10,
            'price' => 1200,
            'characteristics' => [],
            'path_img' => 'images/kolonka_nochnik.jpg',
        ]);

        Product::create([
            'category_id' => 6,
            'name' => 'Мешок для обуви',
            'slug' => Str::slug('Мешок для обуви', '-'),
            'description' => 'Стильный мешок для хранения/переноски обуви',
            'stock_quantity' => 10,
            'price' => 650,
            'characteristics' => [],
            'path_img' => 'images/meshok_obuv.jpg',
        ]);

        Product::create([
            'category_id' => 6,
            'name' => 'Носки',
            'slug' => Str::slug('Носки', '-'),
            'description' => 'Фирменные спортивные носки',
            'stock_quantity' => 10,
            'price' => 390,
            'characteristics' => [],
            'path_img' => 'images/noski.jpg',
        ]);
    }

}
