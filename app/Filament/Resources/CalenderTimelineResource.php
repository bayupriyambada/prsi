<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\CalenderTimeline;
use Filament\Resources\Resource;
use App\Models\YearCalenderTimeline;
use Filament\Forms\Components\Select;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CalenderTimelineResource\Pages;
use App\Filament\Resources\CalenderTimelineResource\RelationManagers;

class CalenderTimelineResource extends Resource
{
    protected static ?string $model = CalenderTimeline::class;

    protected static ?string $navigationGroup = 'Calendar Timeline';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('date')
                    ->required(),
                Forms\Components\TextInput::make('category'),
                Forms\Components\TextInput::make('district')
                    ->maxLength(255),
                Forms\Components\TextInput::make('country')
                    ->maxLength(255),
                Forms\Components\Select::make('year_calender_timeline_id')
                    ->relationship(name: 'yearCalenderTimeline', titleAttribute: 'year')
                    ->native(false),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category')
                    ->searchable(),
                Tables\Columns\TextColumn::make('yearCalenderTimeline.year')
                    ->label('Year')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('district')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('country')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->getStateUsing(function ($record) {
                        $date = Carbon::parse($record->date); // Pastikan ini sesuai dengan format tanggal Anda
                        $today = Carbon::today();
                        return $date->isFuture() ? 'Mendatang' : 'Selesai';
                    })->color(fn($state) => $state === 'Mendatang' ? 'success' : 'danger') // Ganti dengan warna yang sesuai
                    ->icon(fn($state) => $state === 'Mendatang' ? 'heroicon-s-calendar' : 'heroicon-s-check-circle'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('year_calender_timeline_id')
                    ->relationship('yearCalenderTimeline', 'year')
                    ->label('Year')
                    ->getOptionLabelUsing(fn($record) => $record->year),

            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListCalenderTimelines::route('/'),
            'create' => Pages\CreateCalenderTimeline::route('/create'),
            'view' => Pages\ViewCalenderTimeline::route('/{record}'),
            'edit' => Pages\EditCalenderTimeline::route('/{record}/edit'),
        ];
    }
}
