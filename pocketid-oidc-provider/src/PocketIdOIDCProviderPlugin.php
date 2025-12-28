<?php

namespace Spoocy99\PocketIdOIDCProvider;

use App\Contracts\Plugins\HasPluginSettings;
use App\Traits\EnvironmentWriterTrait;
use Filament\Contracts\Plugin;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ColorPicker;
use Filament\Notifications\Notification;
use Filament\Panel;

class PocketIdOIDCProviderPlugin implements HasPluginSettings, Plugin
{
    use EnvironmentWriterTrait;

    public function getId(): string
    {
        return 'pocketid-oidc-provider';
    }

    public function register(Panel $panel): void
    {}

    public function boot(Panel $panel): void
    {}

    public function getSettingsForm(): array
    {
        return [
            TextInput::make('display_name')
                ->label('Display Name')
                ->placeholder('Pocket ID')
                ->autocomplete(false)
                ->default(fn () => config('pocketid-oidc-provider.display_name')),
            ColorPicker::make('display_color')
                ->label('Display Color')
                ->placeholder('#4458bd')
                ->default(fn () => config('pocketid-oidc-provider.display_color'))
                ->hex(),
        ];
    }

    public function saveSettings(array $data): void
    {
        $this->writeToEnvironment([
            'OAUTH_POCKETID_DISPLAY_NAME' => $data['display_name'],
            'OAUTH_POCKETID_DISPLAY_COLOR' => $data['display_color'],
        ]);

        Notification::make()
            ->title('Settings saved.')
            ->success()
            ->send();
    }


}
