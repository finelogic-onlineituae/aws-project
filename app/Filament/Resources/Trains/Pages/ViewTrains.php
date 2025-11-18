<?php

namespace App\Filament\Resources\Trains\Pages;

use App\Filament\Resources\Trains\TrainsResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTrains extends ViewRecord
{
    protected static string $resource = TrainsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
