# KeyCDN PHP SDK
[![Packagist](https://img.shields.io/packagist/v/WhatDaFox/KeyCDN.svg?maxAge=2592000?style=flat-square)](https://packagist.org/packages/whatdafox/keycdn)
[![Travis](https://img.shields.io/travis/WhatDaFox/KeyCDN/master.svg?maxAge=2592000?style=flat-square)](https://travis-ci.org/WhatDaFox/KeyCDN)

PHP Wrapper to interact with the KeyCDN API.

## Installation

```bash
composer require whatdafox/keycdn
```

## Usage

Simply create an KeyCDN object, with a valid API Token in the constructor: 

```php
$keycdn = KeyCDN::create($token);
```

### Zones

```php
// List all zones
$keycdn->zones()->all();

// View one specific zone
$keycdn->zones()->find($zoneId);

// Add a zone
$keycdn->zones()->add('foo', 'pull', 'http://foo.com');

// Edit a zone
$keycdn->zone($zoneId)->update([
    'gzip' => 'enabled'
]);

// Delete a zone
$keycdn->zone($zoneId)->delete();

// Purge a zone
$keycdn->zone($zoneId)->purge();

// Purge URLs
$keycdn->zone($zoneId)->purge(['http://foo.com']);
$keycdn->zone($zoneId)->purgeUrls(['http://foo.com']);

// Purge Tags
$keycdn->zone($zoneId)->purge(['http://foo.com'], true);
$keycdn->zone($zoneId)->purgeTags(['http://foo.com']);
```

### Zone Aliases

```php
// List zone aliases
$keycdn->aliases()->all();

// Add a zone alias
$keycdn->aliases()->add($zoneId, 'cdn.foo.com');

// Edit a zone alias
$keycdn->alias($aliasId)->update([
    'name' => 'cdn.bar.com'
]);

// Delete a zone alias
$keycdn->alias($aliasId)->delete();
```

### Zone Referrers

```php
// List zone referrers
$keycdn->referrers()->all();

// Add a zone referrer
$keycdn->referrers()->add($zoneId, 'cdn.foo.com');

// Edit a zone referrer
$keycdn->referrer($referrerId)->update([
    'name' => 'cdn.bar.com'
]);

// Delete a zone referrer
$keycdn->referrer($referrerId)->delete();
```

### Reports

*Examples using [Carbon/Carbon](http://carbon.nesbot.com/)*

```php
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
```