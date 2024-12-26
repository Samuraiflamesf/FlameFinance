<?php

namespace App\Filament\Pages\Tenancy;

use App\Models\Account;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Pages\Tenancy\RegisterTenant;

class RegisterAccount extends RegisterTenant
{
    protected static ?string $navigationIcon = 'heroicon-m-document-text';

    public function isCachingForms(): bool
    {
        return false;
    }

    /**
     * @return string
     */
    public static function getSlug(): string
    {
        return 'register-account';
    }

    public static function getLabel(): string
    {
        return __('messages.registerAccount');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('messages.name'))
                    ->placeholder(__('messages.personalAccount')),
            ]);
    }

    protected function handleRegistration(array $data): Account
    {
        return auth()->user()->ownedAccounts()->create($data);
    }
}
