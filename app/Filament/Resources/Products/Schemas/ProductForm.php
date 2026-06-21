<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('sku')
                    ->label('SKU'),
                TextInput::make('barcode'),
                TextInput::make('cost_price')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->prefix('Bs.'),
                TextInput::make('sale_price')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->prefix('Bs.'),
                TextInput::make('currency')
                    ->required()
                    ->default('BOB'),
                TextInput::make('stock_quantity')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('unit')
                    ->required()
                    ->default('Unidad'),
                Textarea::make('description')
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
