<?php

namespace App\Filament\Resources\Documents;

use App\Filament\Resources\Documents\Pages\ManageDocuments;
use App\Models\Document;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class DocumentResource extends Resource
{
    protected static ?string $model = Document::class;
    protected static ?string $slug = 'document';
    protected static ?string $label = 'Document';
    protected static ?string $pluralLabel = 'Document';
    protected static ?int $navigationSort = 1;
    protected static string | UnitEnum | null $navigationGroup = 'Informasi';
    protected static ?string $recordTitleAttribute = 'Document';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_file')
                    ->label('Nama File')
                    ->required(),
                TextInput::make('jenis_file')
                    ->label('Jenis File')
                    ->required(),
                FileUpload::make('upload_path')
                    ->label('Upload Path')
                    ->previewable(true)
                    ->acceptedFileTypes(['application/pdf'])
                    ->directory('documents')
                    ->visibility('public')
                    ->maxSize(10240) // 10 MB in KB
                    ->downloadable()
                    ->required(),
                Hidden::make('user_id')
                    ->default(fn() => auth()->id()) // Menggunakan null safe operator (?->) agar tidak error jika session habis
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Document')
            ->columns([
                TextColumn::make('nama_file')
                    ->label('Nama File')
                    ->searchable(),
                TextColumn::make('jenis_file')
                    ->label('Jenis File')
                    ->searchable(),
                TextColumn::make('user.name')
                    ->label('Di Upload Oleh')
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
            'index' => ManageDocuments::route('/'),
        ];
    }
}
