<?php
	declare(strict_types=1);

	namespace Somemove\Auth0NetteExtesion\DI;

	use \Nette\DI\Compiler;
	use \Nette\DI\CompilerExtension;

	final class Auth0NetteExtesion extends CompilerExtension {

		public $defaults = [
			'response_mode' => 'query',
			'response_type' => 'code',
			'domain' => NULL,
			'audience' => NULL,
			'scope' => NULL,
			'client_id' => NULL,
			'client_secret' => NULL,
			'redirect_uri' => NULL,
			'persist_user' => true,
			'persist_access_token' => true,
			'persist_refresh_token' => true,
			'persist_id_token' => true,
			'state_handler' => false,
			'store' => '@auth0.auth0storage',
			'debug' => false,
		];

		public function loadConfiguration() {
			$config = $this->validateConfig($this->defaults);

			$builder = $this->getContainerBuilder();

			$builder
				->addDefinition($this->prefix('auth0storage'))
				->setClass('Somemove\Auth0NetteExtesion\Auth0NetteStorage');

			$builder
				->addDefinition($this->prefix('auth0'))
				->setClass('Auth0\SDK\Auth0', [$config])
			;
		}

	}
