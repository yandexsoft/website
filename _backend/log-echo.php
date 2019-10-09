<?php

require_once __DIR__ . '/bootstrap.php';

// Setup sentry error logging
if (
    getenv('PHPENV') == 'production' &&
    isset($config['sentry_dsn']) &&
    $config['sentry_dsn'] !== false
) {
    Sentry\init(['dsn' => $config['sentry_dsn'] ]);
}

// Log an error and also echo it.
function log_echo($msg, $echo = false) {
    global $sentry;
    error_log($msg);
    if (
        getenv('PHPENV') == 'production' &&
        isset($config['sentry_dsn']) &&
        $config['sentry_key'] !== false
    ) {
        Sentry\captureException($msg););
    }
    if ( $echo ) echo $msg.PHP_EOL;
}
