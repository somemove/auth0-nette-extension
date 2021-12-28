<?php
	declare(strict_types=1);

	namespace Somemove\Auth0NetteExtesion\DI;

	use \Auth0\SDK\Auth0;
	use \Nette\DI\CompilerExtension;

	final class Auth0NetteExtesion extends CompilerExtension {

		/** @var array<string, mixed> */
		public array $defaults = [
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

		public function loadConfiguration(): void {
			$config = $this->validateConfig($this->defaults);

			$builder = $this->getContainerBuilder();

			$builder
				->addDefinition($this->prefix('auth0storage'))
				->setClass('Somemove\Auth0NetteExtesion\Auth0NetteStorage');

			$builder
				->addDefinition($this->prefix('auth0'))
				->setFactory(Auth0::class, [$config])
			;
		}

	}
