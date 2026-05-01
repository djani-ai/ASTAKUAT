<?php

namespace App\Filament\Resources\SuratPacs;

use App\Filament\Resources\SuratPacs\Pages\ManageSuratPacs;
use App\Models\SuratPac;
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

class SuratPacResource extends Resource
{
    protected static ?string $model = SuratPac::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'DataSuratPac';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('DataSuratPac')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('DataSuratPac')
            ->columns([
                TextColumn::make('DataSuratPac')
                    ->searchable(),
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
            'index' => ManageSuratPacs::route('/'),
        ];
    }
}
