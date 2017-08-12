# WordPressInfoAPI
PHP Wrapper for the WordPress Info API

Simplified usage of the WordPress API for search and plugin/theme information lookup.

Example usage:

Get the Plugin Information for a Plugin with slug 'wp-simple-firewall'
```php
$oCon = new \FernleafSystems\Apis\Wordpress\Org\Connection();

/** @var PluginInfoVO $oPlugin */
$oPlugin = ( new \FernleafSystems\Apis\Wordpress\Org\Plugins\Info() )
	->setConnection( $oCon )
	->setSlug( 'wp-simple-firewall' )
	->retrieveInfo();
```
Or you can search for themes with the term "twenty", to return
an array of `ThemeInfoVO[]` objects limited to 20 results.
```php
/** @var ThemeInfoVO[] $aThemes */
$aThemes = ( new \FernleafSystems\Apis\Wordpress\Org\Themes\Search() )
	->setConnection( $oCon )
	->setSearchTerm( 'twenty' )
	->setResultsLimit( 20 )
	->search();
```