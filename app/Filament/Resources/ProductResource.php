<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';
    
    protected static ?string $navigationLabel = 'Товары';
    
    protected static ?string $modelLabel = 'товар';
    
    protected static ?string $pluralModelLabel = 'Товары';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Название')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('keywords')
                    ->label('Ключевые слова')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('meta_description')
                    ->label('Мета описание')
                    ->required()
                    ->rows(3),
                Forms\Components\Select::make('category_id')
                    ->label('Категория')
                    ->relationship('category', 'name')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->label('Описание')
                    ->rows(3),
                Forms\Components\TextInput::make('stock_quantity')
                    ->label('Количество на складе')
                    ->numeric()
                    ->default(0)
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->label('Цена')
                    ->numeric()
                    ->prefix('₽')
                    ->required(),
                Forms\Components\TextInput::make('sale_price')
                    ->label('Цена по акции')
                    ->numeric()
                    ->prefix('₽'),
                Forms\Components\TextInput::make('rating')
                    ->label('Рейтинг')
                    ->numeric()
                    ->required(),
                Forms\Components\Toggle::make('is_new')
                    ->label('Новинка')
                    ->default(false),
                Forms\Components\FileUpload::make('path_img')
                    ->label('Главное изображение')
                    ->image()
                    ->disk('public')
                    ->directory('product-images')
                    ->visibility('public'),
                Forms\Components\FileUpload::make('extra_images')
                    ->label('Галерея изображений')
                    ->helperText('Несколько фото товара. Порядок можно менять перетаскиванием.')
                    ->multiple()
                    ->reorderable()
                    ->appendFiles()
                    ->image()
                    ->disk('public')
                    ->directory('product-gallery')
                    ->visibility('public')
                    ->maxFiles(20),
                Forms\Components\KeyValue::make('characteristics')
                    ->label('Размеры')
                    ->reorderable()
                    ->keyLabel('Название')
                    ->valueLabel('Значение'),
                    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Название')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('keywords')
                    ->label('Ключевые слова')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('meta_description')
                    ->label('Мета описание')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Категория')
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('Цена')
                    ->money('RUB')
                    ->sortable(),
                Tables\Columns\TextColumn::make('rating')
                    ->label('Рейтинг')
                    ->sortable(),
                Tables\Columns\TextColumn::make('stock_quantity')
                    ->label('На складе')
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_new')
                    ->label('Новинка')
                    ->sortable(),
                Tables\Columns\ImageColumn::make('path_img')
                    ->label('Главное изображение')
                    ->getStateUsing(fn (Product $record) => $record->path_img_url)
                    ->square()
                    ->size(56),                
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->label('Категория')
                    ->relationship('category', 'name'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
