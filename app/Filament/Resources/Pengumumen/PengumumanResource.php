<?php

namespace App\Filament\Resources\Pengumumen;

use App\Filament\Resources\Pengumumen\Pages\ManagePengumumen;
use App\Models\Pengumuman;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class PengumumanResource extends Resource
{
    protected static ?string $model = Pengumuman::class;
    protected static ?string $slug = 'pengumuman';
    protected static ?string $label = 'Pengumuman';
    protected static ?string $pluralLabel = 'Pengumuman';
    protected static ?int $navigationSort = 2;
    protected static string | UnitEnum | null $navigationGroup = 'Informasi';
    protected static ?string $recordTitleAttribute = 'Pengumuman';
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required(),
                Textarea::make('isi')
                    ->required()
                    ->columnSpanFull(),
                Hidden::make('user_id')
                    ->default(fn() => auth()->id())
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Pengumuman')
            ->columns([
                TextColumn::make('judul')
                    ->searchable(),
                TextColumn::make('user_id')
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
            'index' => ManagePengumumen::route('/'),
        ];
    }
}
