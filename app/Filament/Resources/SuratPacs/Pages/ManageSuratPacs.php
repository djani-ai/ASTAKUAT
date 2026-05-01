<?php

namespace App\Filament\Resources\SuratPacs\Pages;

use App\Filament\Resources\SuratPacs\SuratPacResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageSuratPacs extends ManageRecords
{
    protected static string $resource = SuratPacResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
