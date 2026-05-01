<?php

namespace App\Filament\Resources\DataPacs;

use App\Filament\Resources\DataPacs\Pages\ManageDataPacs;
use App\Models\DataPac;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DataPacResource extends Resource
{
    protected static ?string $model = DataPac::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Data PAC';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_pac')
                    ->required(),
                TextInput::make('ketua')
                    ->required(),
                TextInput::make('ket_mds')
                    ->required(),
                TextInput::make('satkoryon')
                    ->required(),
                TextInput::make('sk_upload'),
                TextInput::make('ms_khidmad')
                    ->required(),
                DatePicker::make('sk_berakhir')
                    ->required(),
                TextInput::make('fb'),
                TextInput::make('ig'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Data PAC')
            ->columns([
                TextColumn::make('nama_pac')
                    ->searchable(),
                TextColumn::make('ketua')
                    ->searchable(),
                TextColumn::make('ket_mds')
                    ->searchable(),
                TextColumn::make('satkoryon')
                    ->searchable(),
                TextColumn::make('sk_upload')
                    ->searchable(),
                TextColumn::make('ms_khidmad')
                    ->searchable(),
                TextColumn::make('sk_berakhir')
                    ->date()
                    ->sortable(),
                TextColumn::make('fb')
                    ->searchable(),
                TextColumn::make('ig')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageDataPacs::route('/'),
        ];
    }
}
