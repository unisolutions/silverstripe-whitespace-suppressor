# Suppresses whitespaces in output HTML for Silverstripe 3
Extension to remove whitespaces from HTML output.

This is just simple idea how it can be impelented and it should not be used in production sites.

Ideally whitespaces should be removed when the template gets parsed and stored in cache.
Current approach removes whitespaces on every request so it adds additional load on the server.

## Requirements
* SilverStripe 3+

## Usage
The extension automatically removes whitespaces from HTML output.

No configuration required.