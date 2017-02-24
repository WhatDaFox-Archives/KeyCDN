<?php

use Carbon\Carbon;

/**
 * Reports API
 */

// Traffic
$keycdn->traffic(Carbon::now()->subDays(30)->timestamp, Carbon::now()->timestamp);
$keycdn->traffic(Carbon::now()->subDays(30)->timestamp, Carbon::now()->timestamp, ZONE_ID);

// Storage
$keycdn->storage(Carbon::now()->subDays(30)->timestamp, Carbon::now()->timestamp);
$keycdn->storage(Carbon::now()->subDays(30)->timestamp, Carbon::now()->timestamp, ZONE_ID);

// Status
$keycdn->status(Carbon::now()->subDays(30)->timestamp, Carbon::now()->timestamp);
$keycdn->status(Carbon::now()->subDays(30)->timestamp, Carbon::now()->timestamp, ZONE_ID);

// Credits
$keycdn->credits(Carbon::now()->subDays(30)->timestamp, Carbon::now()->timestamp);
