<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Account;
use App\Models\Category;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Enums\SpendTypeEnum;
use Filament\Resources\Resource;
use App\Enums\VisibilityStatusEnum;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use App\Tables\Columns\IconColorColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\ColorPicker;
use Guava\FilamentIconPicker\Forms\IconPicker;
use App\Filament\Resources\CategoryResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CategoryResource\RelationManagers\TransactionsRelationManager;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'lucide-layout-list';

    protected static ?int $navigationSort = 100;

    public static function getModelLabel(): string
    {
        return __('categories.title_singular');
    }

    public static function getPluralModelLabel(): string
    {
        return __('categories.title');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('messages.getNavigationGroup2');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->columns(2)
                    ->schema([
                        Radio::make('type')
                            ->label(__('categories.fields.type'))
                            ->columnSpan([
                                'sm' => 2,
                            ])
                            ->options(collect(__('categories.types'))->pluck('label', 'id')->reverse())
                            ->inline()
                            ->default(SpendTypeEnum::EXPENSE->value)
                            ->required(),
                        TextInput::make('name')
                            ->label(__('categories.fields.name'))
                            ->required()
                            ->maxLength(255),
                        ColorPicker::make('color')
                            ->label(__('categories.fields.color'))
                            ->default('#22b3e0'),
                        IconPicker::make('icon')
                            ->label(__('categories.fields.icon'))
                            //                            ->sets(['lucide-icons'])
                            ->sets(['heroicons', 'fontawesome-solid'])
                            ->columnSpan([
                                'sm' => 2,
                            ])
                            ->preload()
                            ->columns([
                                'default' => 1,
                                'lg' => 3,
                                '2xl' => 5,
                            ]),
                        Toggle::make('status')
                            ->label(__('categories.fields.is_visible'))
                            ->default(VisibilityStatusEnum::ACTIVE->value)
                            ->helperText(__('categories.fields.is_visible_help_text'))
                            ->afterStateHydrated(function (Toggle $component, string $state) {
                                $component->state($state == VisibilityStatusEnum::ACTIVE->value);
                            })
                            ->dehydrateStateUsing(fn(string $state): string => $state ? VisibilityStatusEnum::ACTIVE->value : VisibilityStatusEnum::INACTIVE->value),

                        // Atribui automaticamente o account_id
                        Hidden::make('account_id')
                            ->default(auth()->user()->account_id),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                IconColorColumn::make('icon')
                    ->label(__('categories.fields.icon')),
                Tables\Columns\TextColumn::make('name')
                    ->label(__('categories.fields.name'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->label(__('categories.fields.type'))
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        SpendTypeEnum::EXPENSE->value => 'warning',
                        SpendTypeEnum::INCOME->value => 'primary',
                    })
                    ->formatStateUsing(fn(string $state): string => __("categories.types.{$state}.label"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('monthly_balance')
                    ->label(__('categories.fields.monthly_balance')),
                Tables\Columns\IconColumn::make('status')
                    ->label(__('categories.fields.is_visible'))
                    ->icon(fn(string $state): string => match ($state) {
                        VisibilityStatusEnum::ACTIVE->value => 'lucide-check-circle',
                        VisibilityStatusEnum::INACTIVE->value => 'lucide-x-circle',
                        default => 'lucide-x-circle',
                    })
                    ->color(fn(string $state): string => match ($state) {
                        VisibilityStatusEnum::ACTIVE->value => 'success',
                        VisibilityStatusEnum::INACTIVE->value => 'danger',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->deferLoading()
            ->filters([
                Filter::make('status')
                    ->label(__('categories.fields.is_visible'))
                    ->query(fn(Builder $query): Builder => $query->where('status', VisibilityStatusEnum::ACTIVE->value))
                    ->toggle(),
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->slideOver(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ])
            ->reorderable('order')
            ->defaultSort('order')
            ->deferLoading()
            ->striped()
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()->slideOver(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            TransactionsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            //            'create' => Pages\CreateCategory::route('/create'),
            //            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
