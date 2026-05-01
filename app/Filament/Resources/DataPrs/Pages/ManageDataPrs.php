<?php

namespace App\Filament\Resources\DataPrs\Pages;

use App\Filament\Resources\DataPrs\DataPrResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageDataPrs extends ManageRecords
{
    protected static string $resource = DataPrResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
