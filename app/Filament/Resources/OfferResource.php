<?php

namespace App\Filament\Resources;

use App\Enums\PaymentType;
use App\Filament\Resources\OfferResource\Pages;
use App\Filament\Resources\OfferResource\RelationManagers;
use App\Models\Offer;
use Filament\Actions\ActionGroup;
use Filament\Actions\ViewAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class OfferResource extends Resource
{
    protected static ?string $model = Offer::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationLabel = 'Oferty';

    protected static ?string $navigationGroup = 'Kontent';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Grid::make(2)->schema([
                            Forms\Components\TextInput::make('name')
                                ->label("Tytuł Oferty")
                                ->required()
                                ->maxLength(64)
                                ->unique(ignorable: fn($record) => $record)
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
                                ->unique(ignorable: fn($record) => $record)
                                ->maxLength(2048),
                            Forms\Components\TextInput::make('salary')
                                ->numeric()
                                ->label("Wypłata")
                                ->rules('regex:/^\d{1,6}(\.\d{0,2})?$/'),
                            Forms\Components\Select::make('payment')
                                ->label("Płatność")
                                ->options(PaymentType::class),
                        ]),
                        Forms\Components\RichEditor::make('description')
                            ->label("Opis")
                            ->required(),
                        Forms\Components\Toggle::make('active')
                            ->label("Aktywna")
                            ->required(),
                    ])->columnSpan(8),
                Forms\Components\Section::make()->schema([
                    Forms\Components\TextInput::make('vacancy')
                        ->numeric()
                        ->label("Wakat"),
                    Forms\Components\Select::make('category_id')
                        ->label("Kategoria")
                        ->relationship('category', 'name')
                        ->required(),
                    Forms\Components\Select::make('employment_id')
                        ->label("Wymiar pracy")
                        ->relationship('employment', 'name')
                        ->required(),
                    Forms\Components\Select::make('contract_id')
                        ->label("Rodzaj umowy")
                        ->relationship('contract', 'name')
                        ->required(),
                    Forms\Components\Select::make('work_mode_id')
                        ->label("Tryb pracy")
                        ->relationship('workMode', 'name')
                        ->required(),
                    Forms\Components\FileUpload::make('image_path')
                        ->label("Logo firmy")
                        ->directory('form-attachments')
                        ->preserveFilenames()
                        ->image(),
                ])->columnSpan(4),
            ])->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')
                    ->label("Logo firmy"),
                Tables\Columns\TextColumn::make('name')
                    ->label("Tytuł Oferty")
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label("URL"),
                Tables\Columns\TextColumn::make('category.name')
                    ->label("Kategoria")
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('salary')
                    ->label("Wypłata")
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('payment')
                    ->label("Płatność")
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('employment.name')
                    ->label("Wymiar pracy")
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('contract.name')
                    ->label("Rodzaj umowy")
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('work_mode.name')
                    ->label("Tryb pracy")
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('min_salary')
                    ->label("Min. Wypłata")
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('max_salary')
                    ->label("Maks. Wypłata")
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('vacancy')
                    ->label("Wakat")
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('active')
                    ->label("Aktywna")
                    ->boolean(),
                Tables\Columns\TextColumn::make('user.email')
                    ->label("E-mail")
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->label("Data utworzenia")
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label("Data aktualizacji")
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('active')
                    ->label("Aktywne oferty")
                    ->boolean()
                    ->trueLabel("Tylko aktywne oferty")
                    ->falseLabel("Tylko nieaktywne oferty")
                    ->native(false),

                Tables\Filters\SelectFilter::make('category')
                    ->label("Kategorie")
                    ->relationship('category', 'name'),

                Tables\Filters\SelectFilter::make('employment')
                    ->label("Wymiary pracy")
                    ->relationship('employment', 'name'),

                Tables\Filters\SelectFilter::make('contract')
                    ->label("Rodzaje umowy")
                    ->relationship('contract', 'name'),

                Tables\Filters\SelectFilter::make('work_mode')
                    ->label("Tryby pracy")
                    ->relationship('workMode', 'name'),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
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
            'index' => Pages\ListOffers::route('/'),
            'create' => Pages\CreateOffer::route('/create'),
            'view' => Pages\ViewOffer::route('/{record}'),
            'edit' => Pages\EditOffer::route('/{record}/edit'),
        ];
    }
}
