<?php

namespace App\Filament\Resources\DataSuratPacs\Pages;

use App\Filament\Resources\DataSuratPacs\DataSuratPacResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageDataSuratPacs extends ManageRecords
{
    protected static string $resource = DataSuratPacResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
