<?php
declare(strict_types=1);

return [
    'tries'      => 10, //Max tries before sending to failed jobs table
    'retryAfter' => 1, //Seconds between tries
];
