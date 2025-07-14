<?php

return [
    /*
     * The webhook URLs that we'll use to send a message to Slack.
     */
    'webhook_urls' => [
        'default' => env('SLACK_ALERT_WEBHOOK'),
        'scrum' => 'https://hooks.slack.com/services/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'

    ],

    /*
     * This job will send the message to Slack. You can extend this
     * job to set timeouts, retries, etc...
     */
    'job' => Spatie\SlackAlerts\Jobs\SendToSlackChannelJob::class,
    'queue' => env('SLACK_ALERT_QUEUE', 'default'),
];
