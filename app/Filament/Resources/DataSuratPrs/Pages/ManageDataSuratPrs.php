<?php

namespace App\Filament\Resources\DataSuratPrs\Pages;

use App\Filament\Resources\DataSuratPrs\DataSuratPrResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageDataSuratPrs extends ManageRecords
{
    protected static string $resource = DataSuratPrResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
