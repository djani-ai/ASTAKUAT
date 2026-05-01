<?php

namespace App\Filament\Resources\DataAnggotas;

use App\Filament\Resources\DataAnggotas\Pages\ManageDataAnggotas;
use App\Models\DataAnggota;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DataAnggotaResource extends Resource
{
    protected static ?string $model = DataAnggota::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                TextInput::make('t_lahir')
                    ->required(),
                DatePicker::make('tgl_lahir')
                    ->required(),
                TextInput::make('pekerjaan')
                    ->required(),
                Select::make('p_kaderisasi')
                    ->label('Status Kaderisasi')
                    ->multiple()
                    ->options([
                        'kaderisasi' => 'Kaderisasi',
                        'non-kaderisasi' => 'Non-Kaderisasi',
                    ])
                    ->required(),
                FileUpload::make('foto')
                    ->image(),
                FileUpload::make('ktp')
                    ->image(),
                FileUpload::make('kta')
                    ->image(),
                FileUpload::make('sertifikat')
                    ->document(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->searchable(),
                TextColumn::make('t_lahir')
                    ->searchable(),
                TextColumn::make('tgl_lahir')
                    ->date()
                    ->sortable(),
                TextColumn::make('pekerjaan')
                    ->searchable(),
                TextColumn::make('p_kaderisasi')
                    ->searchable(),
                TextColumn::make('foto')
                    ->searchable(),
                TextColumn::make('ktp')
                    ->searchable(),
                TextColumn::make('kta')
                    ->searchable(),
                TextColumn::make('sertifikat')
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
            'index' => ManageDataAnggotas::route('/'),
        ];
    }
}
