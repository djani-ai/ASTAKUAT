<?php

namespace App\Filament\Resources\DataSuratPrs;

use App\Filament\Resources\DataSuratPrs\Pages\ManageDataSuratPrs;
use App\Models\DataSuratPr;
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

class DataSuratPrResource extends Resource
{
    protected static ?string $model = DataSuratPr::class;
    protected static ?string $slug = 'data-surat-pr';
    protected static ?string $label = 'Data Surat PR';
    protected static ?string $pluralLabel = 'Data Surat PR';
    protected static ?int $navigationSort = 3;
    protected static string | UnitEnum | null $navigationGroup = 'Administrasi';
    protected static ?string $recordTitleAttribute = 'DataSuratPr';

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
                TextInput::make('pr_id')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('DataSuratPr')
            ->columns([
                TextColumn::make('jns_surat')
                    ->searchable(),
                TextColumn::make('no_surat')
                    ->searchable(),
                TextColumn::make('upload')
                    ->searchable(),
                TextColumn::make('pr_id')
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
            'index' => ManageDataSuratPrs::route('/'),
        ];
    }
}
