<?php

/**
 * Zones API
 */

// List all zones
$keycdn->zones()->all();

// View one specific zone
$keycdn->zones()->find(ZONE_ID);

// Add a zone
$keycdn->zones()->add('foo', 'pull', 'http://foo.com');

// Edit a zone
$keycdn->zone(ZONE_ID)->update([
    'gzip' => 'enabled'
]);

// Delete a zone
$keycdn->zone(ZONE_ID)->delete();

// Purge a zone
$keycdn->zone(ZONE_ID)->purge();

// Purge URLs
$keycdn->zone(ZONE_ID)->purge(['http://foo.com']);
$keycdn->zone(ZONE_ID)->purgeUrls(['http://foo.com']);

// Purge Tags
$keycdn->zone(ZONE_ID)->purge(['http://foo.com'], true);
$keycdn->zone(ZONE_ID)->purgeTags(['http://foo.com']);