<?php

/**
 * Zone Aliases API
 */

// List zone aliases
$keycdn->aliases()->all();

// Add a zone alias
$keycdn->aliases()->add(ZONE_ID, 'cdn.foo.com');

// Edit a zone alias
$keycdn->alias(ZONE_ALIAS_ID)->update([
    'name' => 'cdn.bar.com'
]);

// Delete a zone alias
$keycdn->alias(ZONE_ALIAS_ID)->delete();