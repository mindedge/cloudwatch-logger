<?php

namespace Mindedge\CloudwatchLogger;

use Mindedge\CloudwatchLogger\CredentialProvider;
use Aws\CloudWatchLogs\CloudWatchLogsClient;

class LogClientFactory {

    protected $options;


    public function __construct(array $options)
    {
        $credentials = forward_static_call([CredentialProvider::class, 'dotenv']);
    
        $this->client = new CloudWatchLogsClient([
            'credentials' => $credentials,
            'region' => getenv('AWS_REGION'),
            'version' => 'latest',
            'debug' => $options['debug'] ?: false
        ]);

        return $this;
    }

    public function client(){
        return $this->client;
    }

}