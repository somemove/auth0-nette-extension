[![Latest Stable Version](https://poser.pugx.org/somemove/auth0-nette-extension/v/stable)](https://packagist.org/packages/somemove/auth0-nette-extension)
[![Total Downloads](https://poser.pugx.org/somemove/auth0-nette-extensionn/downloads)](https://packagist.org/packages/somemove/auth0-nette-extension)

# Auth0 Nette Extension

This is Auth0 authentication extension for [Nette framework](https://github.com/nette/nette).

It integrates [Auth0 PHP SDK](https://github.com/auth0/auth0-php).

## Installation

Download extension using Composer.

```
composer require somemove/auth0-nette-extension
```

``` 
extensions:
	auth0: \Somemove\Auth0NetteExtesion\DI\Auth0NetteExtesion
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
	'state_handler': false
	'debug': true
```

Following properties have defaults values in the extension and can be ommited in your configuration:

* `persist_user`
* `persist_access_token`
* `persist_refresh_token`
* `persist_id_token`
* `store`
* `state_handler`
* `debug`

## Usage

```php
class YourPresenter extends Presenter {

	/**
	 * @var \Auth0\SDK\Auth0 @inject
	 */
	public $auth0;

	public function actionLogin() {
		$this->auth0->login();
	}

}
```
