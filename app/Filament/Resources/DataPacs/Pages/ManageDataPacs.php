<?php

namespace App\Filament\Resources\DataPacs\Pages;

use App\Filament\Resources\DataPacs\DataPacResource;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\ManageRecords;
use Filament\Support\Icons\Heroicon;

class ManageDataPacs extends ManageRecords
{
    protected static string $resource = DataPacResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah')
                ->icon(Heroicon::Plus)
                ->button()
                ->color('primary'),
        ];
    }
}
