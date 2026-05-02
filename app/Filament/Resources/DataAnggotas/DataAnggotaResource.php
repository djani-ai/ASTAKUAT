<?php

namespace App\Filament\Resources\DataAnggotas;

use App\Filament\Resources\DataAnggotas\Pages\ManageDataAnggotas;
use App\Models\DataAnggota;
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
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class DataAnggotaResource extends Resource
{
    protected static ?string $model = DataAnggota::class;
    protected static ?string $slug = 'data-anggota';
    protected static ?string $label = 'Data Anggota';
    protected static ?string $pluralLabel = 'Data Anggota';
    protected static ?int $navigationSort = 1;
    protected static string | UnitEnum | null $navigationGroup = 'Kaderisasi';
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->label('Nama Lengkap')
                    ->required(),
                TextInput::make('t_lahir')
                    ->label('Tempat Lahir')
                    ->required(),
                DatePicker::make('tgl_lahir')
                    ->label('Tanggal Lahir')
                    ->required(),
                TextInput::make('pekerjaan')
                    ->label('Pekerjaan')
                    ->required(),
                Select::make('p_kaderisasi')
                    ->label('Status Kaderisasi')
                    ->multiple()
                    ->options([
                        'PKD' => 'PKD',
                        'PKL' => 'PKL',
                        'PKN' => 'PKN',
                        'PKP' => 'PKP',
                        'DIKLATSAR' => 'DIKLATSAR',
                        'DIKLATNAS' => 'DIKLATNAS',
                        'DIKLATNAS LANJUT' => 'DIKLATNAS LANJUT',
                    ])
                    ->required(),
                FileUpload::make('foto')
                    ->label('Foto'),
                FileUpload::make('ktp')
                    ->label('KTP')
                    ->acceptedFileTypes(['image/*', 'application/pdf']),
                FileUpload::make('kta')
                    ->label('KTA')
                    ->acceptedFileTypes(['image/*', 'application/pdf']),
                FileUpload::make('sertifikat')
                    ->label('Sertifikat Kaderisasi')
                    ->acceptedFileTypes(['image/*', 'application/pdf']),
                Select::make('user_id')
                    ->label('User')
                    ->relationship('user', 'name')
                    ->required(),
                Select::make('pr_id')
                    ->label('PR')
                    ->relationship('pr', 'nama_pr')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->label('Nama Lengkap')
                    ->searchable(),
                TextColumn::make('t_lahir')
                    ->label('Tempat Lahir')
                    ->searchable(),
                TextColumn::make('tgl_lahir')
                    ->label('Tanggal Lahir')
                    ->date(),
                TextColumn::make('pekerjaan')
                    ->label('Pekerjaan')
                    ->searchable(),
                TextColumn::make('p_kaderisasi')
                    ->label('Status Kaderisasi')
                    ->searchable(),
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->searchable(),
                ImageColumn::make('ktp')
                    ->label('KTP')
                    ->searchable(),
                ImageColumn::make('kta')
                    ->label('KTA')
                    ->searchable(),
                ImageColumn::make('sertifikat')
                    ->label('Sertifikat Kaderisasi')
                    ->searchable(),
                TextColumn::make('user.name')
                    ->label('User')
                    ->searchable(),
                TextColumn::make('pr.nama_pr')
                    ->label('PR')
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
