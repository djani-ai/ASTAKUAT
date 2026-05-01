<?php

namespace App\Filament\Resources\DataPrs;

use App\Filament\Resources\DataPrs\Pages\ManageDataPrs;
use App\Models\DataPr;
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

class DataPrResource extends Resource
{
    protected static ?string $model = DataPr::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'DataPr';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_pr')
                    ->required(),
                TextInput::make('ketua')
                    ->required(),
                TextInput::make('ket_mds')
                    ->required(),
                TextInput::make('satkorkel')
                    ->required(),
                TextInput::make('sk_upload'),
                TextInput::make('ms_khidmad')
                    ->required(),
                DatePicker::make('sk_berakhir')
                    ->required(),
                TextInput::make('fb'),
                TextInput::make('ig'),
                TextInput::make('pac_id')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('DataPr')
            ->columns([
                TextColumn::make('nama_pr')
                    ->searchable(),
                TextColumn::make('ketua')
                    ->searchable(),
                TextColumn::make('ket_mds')
                    ->searchable(),
                TextColumn::make('satkorkel')
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
                TextColumn::make('pac_id')
                    ->numeric()
                    ->sortable(),
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
            'index' => ManageDataPrs::route('/'),
        ];
    }
}
