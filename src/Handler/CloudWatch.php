<?php
namespace Mindedge\CloudwatchLogger\Handler;

use Monolog\Logger;
use Monolog\Formatter\LineFormatter;
use Aws\CloudWatchLogs\CloudWatchLogsClient;
use Monolog\Handler\AbstractProcessingHandler;


class CloudWatch extends AbstractProcessingHandler {
    
    /**
     * Requests per second limit (https://docs.aws.amazon.com/AmazonCloudWatch/latest/logs/cloudwatch_limits_cwl.html)
     */
    const RPS_LIMIT = 5;

    /**
     * Event size limit (https://docs.aws.amazon.com/AmazonCloudWatch/latest/logs/cloudwatch_limits_cwl.html)
     * "256 KB (maximum). This limit cannot be changed."
     *
     * @var int
     */
    const EVENT_SIZE = 262118; // 262144 - reserved 26

    /**
     * Pre-configured Cloudwatch Client
     * 
     * @param CloudWatchLogsClient $client
     */

    /**
     * The cloudwatch log group
     * @see https://docs.aws.amazon.com/AmazonCloudWatch/latest/logs/Working-with-log-groups-and-streams.html
     * 
     * @var string
     */
    private $group;

     public function __construct(CloudWatchLogsClient $client)
     {
         
     }

}