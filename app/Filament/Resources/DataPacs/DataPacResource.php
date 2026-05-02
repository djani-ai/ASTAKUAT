<?php

namespace App\Filament\Resources\DataPacs;

use App\Filament\Resources\DataPacs\Pages\ManageDataPacs;
use App\Models\DataPac;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
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
                Fieldset::make('Pengurus Pimpinan Anak Cabang')
                    ->schema([
                        TextInput::make('nama_pac')
                            ->label('Nama PAC')
                            ->placeholder('Nama Pimpinan Anak Cabang (PAC)')
                            ->required(),
                        TextInput::make('ketua')
                            ->label('Ketua')
                            ->placeholder('Nama Lengkap Ketua PAC')
                            ->required(),
                        TextInput::make('ket_mds')
                            ->label('Ketua MDS')
                            ->placeholder('Nama Lengkap Ketua MDS')
                            ->required(),
                        TextInput::make('satkoryon')
                            ->label('Ketua Satkoryon')
                            ->placeholder('Nama Lengkap Ketua Satkoryon')
                            ->required(),
                    ])->columnSpanFull(),
                Fieldset::make('SK dan Masa Khidmad')
                    ->schema([
                        FileUpload::make('sk_upload')
                            ->label('File SK')
                            ->acceptedFileTypes(['application/pdf'])
                            ->disk('public')
                            ->directory('documents')
                            ->maxSize(10240)
                            ->previewable(true)
                            ->downloadable()
                            ->previewable(true)
                            ->openable()
                            ->columnSpanFull(),
                        TextInput::make('ms_khidmad')
                            ->label('Masa Khidmad')
                            ->mask('9999-9999')
                            ->placeholder('YYYY-YYYY')
                            ->required(),
                        DatePicker::make('sk_berakhir')
                            ->label('SK Berakhir')
                            ->native(false)
                            ->required(),
                    ])->columnSpanFull(),
                Fieldset::make('Media Sosial')
                    ->schema([
                        TextInput::make('fb')
                            ->label('Facebook')
                            ->url()
                            ->prefixIcon(Heroicon::Newspaper)
                            ->prefixIconColor('gray')
                            ->copyable(copyMessage: 'Copied!', copyMessageDuration: 1500)
                            ->placeholder('Masukkan URL Facebook'),
                        TextInput::make('ig')
                            ->label('Instagram')
                            ->url()
                            ->prefixIcon(Heroicon::Newspaper)
                            ->prefixIconColor('gray')
                            ->copyable(copyMessage: 'Copied!', copyMessageDuration: 1500)
                            ->placeholder('Masukkan URL Instagram'),
                    ])->columnSpanFull(),
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
                TextColumn::make('ms_khidmad')
                    ->label('Masa Khidmad')
                    ->searchable(),
                TextColumn::make('sk_berakhir')
                    ->label('SK Berakhir')
                    ->date()
                    ->sortable(),
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
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
                ForceDeleteAction::make(),
                RestoreAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageDataPacs::route('/'),
        ];
    }
    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
