<?php
namespace Mindedge\CloudwatchLogger;


use Dotenv\Dotenv;
use Aws\Credentials\Credentials;
use Dotenv\Exception\InvalidPathException;
use Aws\Credentials\CredentialProvider as BaseProvider;
use function GuzzleHttp\Promise\promise_for as Promisify;


class CredentialProvider extends BaseProvider{

    /**
     * Provider that creates credentials from environment variables
     * AWS_ACCESS_KEY_ID, AWS_SECRET_ACCESS_KEY, and AWS_SESSION_TOKEN.
     *
     * @return callable
     */
    public static function dotenv():callable {
        $dotenv = Dotenv::create(__DIR__ . '/../')->load(); 
        
        return function () use ($dotenv){
            if($dotenv['AWS_ACCESS_KEY_ID'] && $dotenv['AWS_SECRET_ACCESS_KEY']){
                return Promisify(
                    new Credentials(getenv('AWS_ACCESS_KEY_ID'), getenv(self::ENV_SECRET), getenv(self::ENV_SESSION) ?: NULL)
                );
           }
        
           return self::reject('Could not find environment variable credentials in ' . self::ENV_KEY . '/' . self::ENV_SECRET);

        };
    }
}