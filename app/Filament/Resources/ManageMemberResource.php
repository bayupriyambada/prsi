<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Membership;
use Filament\Tables\Table;
use App\Models\ManageMember;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\BulkAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\BulkActionGroup;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ManageMemberResource\Pages;
use App\Filament\Resources\ManageMemberResource\RelationManagers;

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
                FileUpload::make('photo')->columnSpanFull()
                ->image()
                ->disk('public') // Pastikan ini sesuai
                ->optimize('webp', 'jpg', 'png')
                ->resize(50)
                ->directory('memberships/photos')
                ->required()
                ->previewable(true),
                FileUpload::make('ktp')->columnSpanFull()
                ->image()
                ->disk('public') // Pastikan ini sesuai

                ->optimize('webp', 'jpg', 'png')
                ->directory('memberships/ktp')
                ->resize(50)
                ->required()
                ->previewable(true),
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
                
            ])
            ->actions([
               BulkActionGroup::make([
                   Tables\Actions\EditAction::make(),
                Action::make('photo')
                ->label('View Photo')
                ->url(fn ($record) => $record->photo ? asset('storage/' . $record->photo) : null)
                ->openUrlInNewTab()
                ->color('primary')
                ->icon('heroicon-o-document-text')
                ->disabled(fn ($record) => !$record->photo),
                Action::make('ktp')
                ->label('View KTP')
                ->url(fn ($record) => $record->ktp ? asset('storage/' . $record->ktp) : null)
                ->openUrlInNewTab()
                ->color('primary')
                ->icon('heroicon-o-document-text')
                ->disabled(fn ($record) => !$record->ktp),
               ]),
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
