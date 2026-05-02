<?php

namespace App\Filament\Resources\DataPrs;

use App\Filament\Resources\DataPrs\Pages\ManageDataPrs;
use App\Models\DataPac;
use App\Models\DataPr;
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
use UnitEnum;

class DataPrResource extends Resource
{
    protected static ?string $model = DataPr::class;
    protected static ?string $label = 'Data PR';
    protected static ?string $slug = 'data-pr';
    protected static ?string $pluralLabel = 'Data PR';
    protected static ?int $navigationSort = 2;
    protected static string | UnitEnum | null $navigationGroup = 'Master Data';
    protected static ?string $recordTitleAttribute = 'DataPr';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_pr')
                    ->label('Nama Pimpinan Ranting')
                    ->required(),
                TextInput::make('ketua')
                    ->label('Ketua')
                    ->required(),
                TextInput::make('ket_mds')
                    ->label('Ketua MDS')
                    ->required(),
                TextInput::make('satkorkel')
                    ->label('Satkorkel')
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
                    ->label('Masa Aktif SK (Berakhir)')
                    ->required(),
                TextInput::make('fb')
                    ->label('Facebook')
                    ->placeholder('Masukkan URL Facebook'),
                TextInput::make('ig')
                    ->label('Instagram')
                    ->placeholder('Masukkan URL Instagram'),
                Select::make('pac_id')
                    ->label('Nama PAC')
                    ->options(DataPac::pluck('nama_pac', 'id')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('DataPr')
            ->columns([
                TextColumn::make('nama_pr')
                    ->label('Nama Pimpinan Ranting')
                    ->searchable(),
                TextColumn::make('ketua')
                    ->label('Ketua')
                    ->searchable(),
                TextColumn::make('ket_mds')
                    ->label('Ketua MDS')
                    ->searchable(),
                TextColumn::make('satkorkel')
                    ->label('Satkorkel')
                    ->searchable(),
                TextColumn::make('sk_upload')
                    ->label('Upload SK')
                    ->searchable(),
                TextColumn::make('ms_khidmad')
                    ->label('Masa Khidmad')
                    ->searchable(),
                TextColumn::make('sk_berakhir')
                    ->label('Masa Aktif SK (Berakhir)')
                    ->date()
                    ->sortable(),
                TextColumn::make('fb')
                    ->label('Facebook')
                    ->searchable(),
                TextColumn::make('ig')
                    ->label('Instagram')
                    ->searchable(),
                TextColumn::make('data_pac.nama_pac')
                    ->label('Nama PAC')
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
