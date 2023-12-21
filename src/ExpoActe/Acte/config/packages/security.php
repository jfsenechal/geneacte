<?php

use ExpoActe\Acte\Entity\User;
use ExpoActe\Acte\Security\Authenticator\ExpoActeAuthenticator;
use Symfony\Config\SecurityConfig;

return static function (SecurityConfig $security) {
    $security->provider('pathfinder_user_provider', [
        'entity' => [
            'class' => User::class,
            'property' => 'email',
        ],
    ]);

    // @see Symfony\Config\Security\FirewallConfig
    $main = [
        'provider' => 'pathfinder_user_provider',
        'logout' => ['path' => 'app_logout'],
        'form_login' => [],
        'entry_point' => ExpoActeAuthenticator::class,
        'custom_authenticators' => [ExpoActeAuthenticator::class],
        'login_throttling' => [
            'max_attempts' => 6, //per minute...
        ],
        'remember_me' => [
            'secret' => '%kernel.secret%',
            'lifetime' => 604800,
            'path' => '/',
            'always_remember_me' => true,
        ],
    ];

    $security->firewall('main', $main);
};
