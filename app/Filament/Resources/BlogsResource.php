<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Blog;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BlogsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BlogsResource\RelationManagers;
// use Filament\Forms\Components\FileUpload;


class BlogsResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationGroup = 'Blogs';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)->schema([
                    Grid::make()->schema([
                        Card::make()->schema([
                            TextInput::make('title')->required()->maxValue(255)
                                ->live(onBlur: true)
                                ->afterStateUpdated(function (Set $set, $state) {
                                    $set('slug', Str::slug($state));
                                }),
                            TextInput::make('slug')->readOnly(),
                        ]),

                        Card::make()->schema([
                            RichEditor::make('body')->required(),
                        ]),
                    ])->columnSpan(2),
                    Grid::make()->schema([
                        Card::make()->schema([
                            Radio::make('status')
                                ->options([
                                    0 => 'Draft',
                                    1 => 'Published'
                                ])->default(0)
                        ]),
                        Card::make()->schema([
                            FileUpload::make('image')
                                ->resize(50)
                                ->optimize('webp')
                                ->image()->previewable(true),
                        ]),
                        Card::make()->schema([

                            Select::make('category_id')
                                ->relationship(name: 'category', titleAttribute: 'title')
                                ->native(false)
                                ->searchable()
                                ->required()
                                ->preload()
                                ->createOptionForm([
                                    Forms\Components\TextInput::make('title')
                                        ->required()
                                        ->maxLength(255)
                                        ->live(onBlur: true)
                                        ->afterStateUpdated(function (Set $set, $state) {
                                            $set('slug', Str::slug($state));
                                        }),
                                    Forms\Components\TextInput::make('slug')->readOnly(),
                                ])
                        ]),


                        Card::make()->schema([
                            TagsInput::make('tags')->columns(2),
                        ]),
                    ])->columnSpan(1),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('user.name')->searchable(),
                Tables\Columns\TextColumn::make('category.title')->searchable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlogs::route('/create'),
            'edit' => Pages\EditBlogs::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {

        $query = parent::getEloquentQuery()->withoutGlobalScopes([
            SoftDeletingScope::class,
        ]);

        if (auth()->user()->hasRole('super_admin')) {
            return $query;
        } else {
            return $query->where('user_id', auth()->id());
        }
    }
}
