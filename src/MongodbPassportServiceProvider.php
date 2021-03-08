<?php

namespace DesignMyNight\Mongodb;

use Illuminate\Support\ServiceProvider;
use DesignMyNight\Mongodb\Passport\AuthCode;
use DesignMyNight\Mongodb\Passport\Bridge\RefreshTokenRepository;
use DesignMyNight\Mongodb\Passport\Client;
use DesignMyNight\Mongodb\Passport\PersonalAccessClient;
use DesignMyNight\Mongodb\Passport\RefreshToken;
use DesignMyNight\Mongodb\Passport\Token;
use Laravel\Passport\Bridge\RefreshTokenRepository as PassportRefreshTokenRepository;
use Laravel\Passport\Passport;

class MongodbPassportServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register()
    {
        if (class_exists('Illuminate\Foundation\AliasLoader')) {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Laravel\Passport\AuthCode', AuthCode::class);
            $loader->alias('Laravel\Passport\Client', Client::class);
            $loader->alias('Laravel\Passport\PersonalAccessClient', PersonalAccessClient::class);
            $loader->alias('Laravel\Passport\Token', Token::class);
        } else {
            class_alias('Laravel\Passport\AuthCode', AuthCode::class);
            class_alias('Laravel\Passport\Client', Client::class);
            class_alias('Laravel\Passport\PersonalAccessClient', PersonalAccessClient::class);
            class_alias('Laravel\Passport\Token', Token::class);
        }
    }
}
