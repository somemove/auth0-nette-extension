[![Latest Stable Version](https://poser.pugx.org/somemove/nette-auth0-extension/v/stable)](https://packagist.org/packages/somemove/nette-auth0-extension)
[![Total Downloads](https://poser.pugx.org/somemove/nette-auth0-extension/downloads)](https://packagist.org/packages/somemove/nette-auth0-extension)

# Auth0 Nette Extension

## Installation

Download extension using Composer.

```
composer require somemove/nette-auth0-extension
```

``` 
extensions:
	auth0: \Somemove\NetteAuth0\DI\NetteAuth0Extension
```

## Configuration

Configure extension in your `config.neon` file:

```
auth0:
	'domain' : 'your.auth0.com'
	'audience' : 'https://audience.url'
	'scope' : 'openid profile offline_access'
	'client_id' : '{CLIENT_ID}'
	'client_secret' : '{CLIENT_SECRET}'
	'redirect_uri' : 'https://your.callback'
	'persist_user' : false
	'persist_access_token': false
	'persist_refresh_token': false
	'persist_id_token': false
	'store': false
	'debug': true
```

## Usage

```php
class Your Service {

	/**
	 * @var \Auth0\SDK\Auth0
	 */
	public $auth0;

	public function __construct(\Auth0\SDK\Auth0 $auth0) {
		$this->auth0 = $auth0;
	}

}
```
