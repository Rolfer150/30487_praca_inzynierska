<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyResource\Pages;
use App\Filament\Resources\CompanyResource\RelationManagers;
use App\Models\Company;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $navigationLabel = 'Firmy';


    protected static ?string $navigationGroup = 'Kontent';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label("Tytuł Firmy")
                    ->required()
                    ->maxLength(64)
                    ->unique()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                        if ($operation !== 'create') {
                            return;
                        }

                        $set('slug', Str::slug($state));
                    }),
                Forms\Components\TextInput::make('slug')
                    ->label("Slug")
                    ->required()
                    ->maxLength(2048),
                Forms\Components\RichEditor::make('description')
                    ->label("Opis")
                    ->required(),
                Forms\Components\TextInput::make('employees_amount')
                    ->label("Liczba pracowników")
                    ->numeric(),
                Forms\Components\TextInput::make('addresses.city')
                    ->label("Miasto")
                    ->required(),
                Forms\Components\TextInput::make('addresses.street')
                    ->label("Ulica")
                    ->required(),
                Forms\Components\TextInput::make('addresses.home_nr')
                    ->label("Numer domu")
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('addresses.flat_nr')
                    ->label("Numer mieszkania")
                    ->numeric(),
                Forms\Components\TextInput::make('addresses.zip_code')
                    ->label("Kod pocztowy")
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label("ID")
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label("Nazwa")
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label("Slug")
                    ->searchable(),
                Tables\Columns\TextColumn::make('employees_amount')
                    ->label("Liczba pracowników")
                    ->sortable(),
                Tables\Columns\TextColumn::make('addresses.city')
                    ->label("Miasto")
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label("Data Utworzenia")
                    ->dateTime()
                    ->sortable(),
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
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }
}
