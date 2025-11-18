<?php

namespace App\Filament\Resources\Trains\Pages;

use App\Filament\Resources\Trains\TrainsResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditTrains extends EditRecord
{
    protected static string $resource = TrainsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
