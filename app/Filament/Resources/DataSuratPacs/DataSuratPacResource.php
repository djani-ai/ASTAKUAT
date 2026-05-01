<?php

namespace App\Filament\Resources\DataSuratPacs;

use App\Filament\Resources\DataSuratPacs\Pages\ManageDataSuratPacs;
use App\Models\DataSuratPac;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class DataSuratPacResource extends Resource
{
    protected static ?string $model = DataSuratPac::class;
    protected static ?string $slug = 'data-surat-pac';
    protected static ?string $label = 'Data Surat PAC';
    protected static ?string $pluralLabel = 'Data Surat PAC';
    protected static ?int $navigationSort = 2;
    protected static string | UnitEnum| null $navigationGroup = 'Administrasi';
    protected static ?string $recordTitleAttribute = 'DataSuratPac';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('jns_surat')
                    ->required(),
                TextInput::make('no_surat')
                    ->required(),
                TextInput::make('upload')
                    ->required(),
                TextInput::make('pac_id')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('DataSuratPac')
            ->columns([
                TextColumn::make('jns_surat')
                    ->searchable(),
                TextColumn::make('no_surat')
                    ->searchable(),
                TextColumn::make('upload')
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
            'index' => ManageDataSuratPacs::route('/'),
        ];
    }
}
