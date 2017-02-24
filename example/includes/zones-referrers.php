<?php

/**
 * Zone Referrers API
 */

// List zone referrers
$keycdn->referrers()->all();

// Add a zone referrer
$keycdn->referrers()->add(ZONE_ID, 'cdn.foo.com');

// Edit a zone referrer
$keycdn->referrer(ZONE_REFERRER_ID)->update([
    'name' => 'cdn.bar.com'
]);

// Delete a zone referrer
$keycdn->referrer(ZONE_REFERRER_ID)->delete();