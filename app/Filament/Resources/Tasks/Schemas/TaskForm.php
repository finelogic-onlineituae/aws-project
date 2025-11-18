<?php

namespace App\Filament\Resources\Tasks\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TaskForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('task_name')
                    ->required(),
                TextInput::make('task_desc')
                    ->required(),
                DatePicker::make('scheduled_date')
                    ->required(),
                TextInput::make('duration')
                    ->required()
                    ->numeric(),
            ]);
    }
}
