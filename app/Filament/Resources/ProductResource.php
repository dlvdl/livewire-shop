<?php

namespace App\Filament\Resources;

use App\Enums\ImageType;
use App\Filament\Resources\ProductResource\Pages\CreateProduct;
use App\Filament\Resources\ProductResource\Pages\EditProduct;
use App\Filament\Resources\ProductResource\Pages\ListProducts;
use App\Models\Product;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->autofocus()->required(),
                TextInput::make('price')->required(),
                TextInput::make('description')->required(),
                Repeater::make('galleryImage')
                ->relationship('galleryImage')
                ->schema([
                    FileUpload::make('path')
                    ->disk('public')
                        ->directory('products')
                        ->required(),
                    Hidden::make('type')
                    ->default(ImageType::GALLERY)
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                ImageColumn::make('image')
                    ->getStateUsing(fn ($record) =>
                    $record->galleryImage
                        ? $record->galleryImage->path
                        : null
                    ),
                TextColumn::make('price'),
                TextColumn::make('created_at'),
                TextColumn::make('updated_at')
            ])
            ->actions([
                EditAction::make()->modal()
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProducts::route('/'),
            'create' => CreateProduct::route('/create'),
            'edit' => EditProduct::route('/{record}/edit'),
        ];
    }
}
