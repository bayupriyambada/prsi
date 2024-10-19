<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Sponsor;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SponsorResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SponsorResource\RelationManagers;
use Joshembling\ImageOptimizer\Components\SpatieMediaLibraryFileUpload;

class SponsorResource extends Resource
{
    protected static ?string $model = Sponsor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = "Images";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')->required()->image()->optimize('webp')->previewable(true)->columnSpanFull(),
                Select::make('status')->options([
                    'sponsor' => 'Sponsor',
                    'co-sponsor' => 'Co-Sponsor',
                ])->native(false)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('status')->badge(function (Sponsor $record) {
                    if ($record->status == 'sponsor') {
                        return 'Sponsor';
                    } else {
                        return 'Co-Sponsor';
                    }
                }),
            ])->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')->options([
                    'sponsor' => 'Sponsor',
                    'co-sponsor' => 'Co-Sponsor',
                ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSponsors::route('/'),
            'create' => Pages\CreateSponsor::route('/create'),
            'edit' => Pages\EditSponsor::route('/{record}/edit'),
        ];
    }
}
