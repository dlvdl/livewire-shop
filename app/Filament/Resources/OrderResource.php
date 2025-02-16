<?php

namespace App\Filament\Resources;

use App\Enums\ShippingStatusType;
use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Money\Money;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->autofocus()->required()->disabled(),
                TextInput::make('email')->required()->disabled(),
                TextInput::make('phone')->required()->disabled(),
                Select::make('status')->required()
                    ->options(collect(ShippingStatusType::cases())->mapWithKeys(function ($item) {
                        return [$item->value => ucfirst($item->value)];
                    })->toArray()),
                TextInput::make('shipping_method')->required()->disabled(),
                TextInput::make('nova_post_department')->required()->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID'),
                TextColumn::make('email'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state) => match ($state) {
                        'pending' => 'warning',
                        'completed' => 'success',
                    }),
                TextColumn::make('phone'),
                TextColumn::make('Products count')
                    ->getStateUsing(fn ($record) => $record->items()->count()),
                TextColumn::make('total_price')
                    ->label('Total Price')
                    ->getStateUsing(fn ($record) => Money::UAH($record->items()->sum('subtotal'))),
                TextColumn::make('created_at')
                    ->sortable()
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options(collect(ShippingStatusType::cases())->mapWithKeys(function ($item) {
                        return [$item->value => ucfirst($item->value)];
                    })->toArray())
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ProductsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
