<?php

namespace App\Filament\Pages;

use Filament\Forms;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Register extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-user-add';

    protected static string $view = 'filament.pages.register';

    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->required()
                ->label('Name'),
            Forms\Components\TextInput::make('email')
                ->email()
                ->required()
                ->label('Email'),
            Forms\Components\TextInput::make('password')
                ->password()
                ->required()
                ->label('Password'),
            Forms\Components\TextInput::make('password_confirmation')
                ->password()
                ->required()
                ->label('Confirm Password'),
        ];
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('success', 'User registered successfully.');

        return redirect()->route('login');
    }
}
