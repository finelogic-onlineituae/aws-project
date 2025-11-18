<?php

namespace App\Filament\Resources\Trains;

use App\Filament\Resources\Trains\Pages\CreateTrains;
use App\Filament\Resources\Trains\Pages\EditTrains;
use App\Filament\Resources\Trains\Pages\ListTrains;
use App\Filament\Resources\Trains\Pages\ViewTrains;
use App\Filament\Resources\Trains\Schemas\TrainsForm;
use App\Filament\Resources\Trains\Schemas\TrainsInfolist;
use App\Filament\Resources\Trains\Tables\TrainsTable;
use App\Models\Trains;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TrainsResource extends Resource
{
    protected static ?string $model = Trains::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Train';

    public static function form(Schema $schema): Schema
    {
        return TrainsForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TrainsInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TrainsTable::configure($table);
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
            'index' => ListTrains::route('/'),
            'create' => CreateTrains::route('/create'),
            'view' => ViewTrains::route('/{record}'),
            'edit' => EditTrains::route('/{record}/edit'),
        ];
    }
}
