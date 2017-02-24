<?php

use Dotenv\Dotenv;
use KeyCDN\KeyCDN;

require_once __DIR__.'/../vendor/autoload.php';

$dotenv = new Dotenv(__DIR__ . '/../');
$dotenv->load();

$token = getenv('KEYCDN_TOKEN');

$keycdn = KeyCDN::create($token);

include __DIR__ . '/includes/reports.php';
include __DIR__ . '/includes/zones.php';
include __DIR__ . '/includes/zones-aliases.php';
include __DIR__ . '/includes/zones-referrers.php';