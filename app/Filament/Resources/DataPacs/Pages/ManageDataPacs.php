<?php

namespace App\Filament\Resources\DataPacs\Pages;

use App\Filament\Resources\DataPacs\DataPacResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageDataPacs extends ManageRecords
{
    protected static string $resource = DataPacResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
