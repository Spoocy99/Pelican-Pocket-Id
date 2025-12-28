<?php

namespace Spoocy99\PocketIdOIDCProvider\Extensions\OAuth\Schemas;

use App\Extensions\OAuth\Schemas\OAuthSchema;
use Filament\Forms\Components\TextInput;
use SocialiteProviders\PocketID\Provider;

final class PocketIdSchema extends OAuthSchema
{
    public function getId(): string
    {
        return 'pocketid';
    }

    public function getSocialiteProvider(): string
    {
        return Provider::class;
    }

    public function getServiceConfig(): array
    {
        return [
            'client_id' => config('pocketid-oidc-provider.client_id'),
            'client_secret' => config('pocketid-oidc-provider.client_secret'),
            'base_url' => config('pocketid-oidc-provider.redirect'),
        ];
    }

    public function getSettingsForm(): array
    {
        return array_merge(parent::getSettingsForm(), [
            TextInput::make('OAUTH_POCKETID_REDIRECT_URI')
                ->label('Redirect URL')
                ->placeholder('Redirect URL')
                ->columnSpan(2)
                ->required()
                ->url()
                ->autocomplete(false)
                ->default(config('pocketid-oidc-provider.redirect')),
        ]);
    }

    public function getName(): string
    {
        return config('pocketid-oidc-provider.display_name');
    }

    public function getIcon(): string
    {
        return 'tabler-key-f';
    }

    public function getHexColor(): string
    {
        return config('pocketid-oidc-provider.display_color');
    }
}
