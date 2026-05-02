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
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class DataPacResource extends Resource
{
    protected static ?string $model = DataPac::class;
    protected static ?string $slug = 'data-pac';
    protected static ?string $label = 'Data PAC';
    protected static ?string $pluralLabel = 'Data PAC';
    protected static ?int $navigationSort = 1;
    protected static string | UnitEnum| null $navigationGroup = 'Master Data';
    protected static ?string $recordTitleAttribute = 'Data PAC';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_pac')
                    ->label('Nama PAC')
                    ->required(),
                TextInput::make('ketua')
                    ->label('Ketua')
                    ->required(),
                TextInput::make('ket_mds')
                    ->label('Ketua MDS')
                    ->required(),
                TextInput::make('satkoryon')
                    ->label('Ketua Satkoryon')
                    ->required(),
                FileUpload::make('sk_upload')
                    ->label('Upload SK')
                    ->placeholder('Unggah SK Pimpinan Ranting dalam format PDF dengan ukuran maksimal 10 MB')
                    ->previewable(true)
                    ->acceptedFileTypes(['application/pdf'])
                    ->directory('documents')
                    ->visibility('public')
                    ->maxSize(10240) // 10 MB in KB
                    ->downloadable()
                    ->required(),
                TextInput::make('ms_khidmad')
                    ->label('Masa Khidmad')
                    ->required(),
                DatePicker::make('sk_berakhir')
                    ->label('SK Berakhir')
                    ->required(),
                TextInput::make('fb')
                    ->label('Facebook'),
                TextInput::make('ig')
                    ->label('Instagram'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Data PAC')
            ->columns([
                TextColumn::make('nama_pac')
                    ->label('Nama PAC')
                    ->searchable(),
                TextColumn::make('ketua')
                    ->label('Ketua')
                    ->searchable(),
                TextColumn::make('ket_mds')
                    ->label('Ketua MDS')
                    ->searchable(),
                TextColumn::make('satkoryon')
                    ->label('Ketua Satkoryon')
                    ->searchable(),
                TextColumn::make('sk_upload')
                    ->label('SK Upload')
                    ->searchable(),
                TextColumn::make('ms_khidmad')
                    ->label('Masa Khidmad')
                    ->searchable(),
                TextColumn::make('sk_berakhir')
                    ->label('SK Berakhir')
                    ->date()
                    ->sortable(),
                TextColumn::make('fb')
                    ->label('Facebook')
                    ->searchable(),
                TextColumn::make('ig')
                    ->label('Instagram')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Updated At')
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
