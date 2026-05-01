<?php

namespace App\Filament\Resources\DataAnggotas\Pages;

use App\Filament\Resources\DataAnggotas\DataAnggotaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageDataAnggotas extends ManageRecords
{
    protected static string $resource = DataAnggotaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
