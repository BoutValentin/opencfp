<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $container) {

    /**
     * Setting the default environement variable.
     * We are using a php file to test if the value exist from a .env and put it also as a default value
     * to avoid some conflict between browser and CLI.
     */

    $container->parameters()
        ->set('env(DATABASE_URL)', isset($_ENV['DATABASE_URL'])? $_ENV['DATABASE_URL']:'%database.url%');
    $container->parameters()
        ->set('env(DATABASE_HOST)', isset($_ENV['DATABASE_HOST'])? $_ENV['DATABASE_HOST']:'%database.host%');
    $container->parameters()
        ->set('env(DATABASE_DATABASE)', isset($_ENV['DATABASE_DATABASE'])? $_ENV['DATABASE_DATABASE']:'%database.database%');
    $container->parameters()
        ->set('env(DATABASE_USER)', isset($_ENV['DATABASE_USER'])? $_ENV['DATABASE_USER']:'%database.user%');
    $container->parameters()
        ->set('env(DATABASE_PASSWORD)', isset($_ENV['DATABASE_PASSWORD'])? $_ENV['DATABASE_PASSWORD']:'%database.password%');
    
    
    $container->parameters()
        ->set('env(MAILER_HOST)', isset($_ENV['MAILER_HOST'])? $_ENV['MAILER_HOST']:'%mail.host%');
    $container->parameters()
        ->set('env(MAILER_PORT)', isset($_ENV['MAILER_PORT'])? $_ENV['MAILER_PORT']: '%mail.port%');
    $container->parameters()
        ->set('env(MAILER_USERNAME)', isset($_ENV['MAILER_USERNAME'])? $_ENV['MAILER_USERNAME']:'%mail.username%');
    $container->parameters()
        ->set('env(MAILER_PASSWORD)', isset($_ENV['MAILER_PASSWORD'])? $_ENV['MAILER_PASSWORD']:'%mail.password%');
    $container->parameters()
        ->set('env(MAILER_ENCRYPTION)', isset($_ENV['MAILER_ENCRYPTION'])? $_ENV['MAILER_ENCRYPTION']:'%mail.encryption%');
    $container->parameters()
        ->set('env(MAILER_AUTH_MODE)', isset($_ENV['MAILER_AUTH_MODE'])? $_ENV['MAILER_AUTH_MODE']:'%mail.auth_mode%');

};
