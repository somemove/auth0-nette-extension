<?php declare(strict_types=1);

	namespace Somemove\Auth0NetteExtesion\DI;

	use \Nette\DI\Compiler;
	use \Nette\DI\CompilerExtension;

	final class Auth0NetteExtesion extends CompilerExtension {

		public $defaults = [
			'response_mode' => 'query',
			'response_type' => 'code',
			'persist_user' => false,
			'persist_access_token' => false,
			'persist_refresh_token' => false,
			'persist_id_token' => false,
			'state_handler' => false,
			'store' => false,
			'debug' => false,
		];
		
		public function loadConfiguration() {
			$builder = $this->getContainerBuilder();
			$config = $this->getConfig($this->defaults);

			$builder
				->addDefinition($this->prefix('auth0'))
				->setClass('Auth0\SDK\Auth0')
				->setArguments([$config]);
		}

	}

?>