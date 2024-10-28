<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ManageMemberResource\Pages;
use App\Filament\Resources\ManageMemberResource\RelationManagers;
use App\Models\ManageMember;
use App\Models\Membership;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ManageMemberResource extends Resource
{
    protected static ?string $model = Membership::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('full_name')->required(),
                TextInput::make('email')->required(),
                TextInput::make('phone')->required(),
                TextInput::make('birthdate')->required(),
                TextInput::make('address')->required(),
                TextInput::make('job')->required(),
                TextInput::make('reason')->required(),
                TextInput::make('photo')->required(),
                TextInput::make('ktp')->required(),
                Select::make('shirt_size')->options([
                    's' => 'S',
                    'm'=> 'M',
                    'l' => 'L',
                    'xl' => 'XL',
                    'xxl' => 'XXL',
                    'xxxl' => 'XXXL'
                ])->default('s'),
                Select::make('status')->options([
                    'Pending'=> 'Pending',
                    'Approved'=> 'Approved',
                    'Rejected'=> 'Rejected',
                ])->default('Pending'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('full_name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('birthdate'),
                Tables\Columns\TextColumn::make('address'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListManageMembers::route('/'),
            'create' => Pages\CreateManageMember::route('/create'),
            'edit' => Pages\EditManageMember::route('/{record}/edit'),
        ];
    }
}
