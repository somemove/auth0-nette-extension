<?php declare(strict_types=1);

	namespace Somemove\NetteAuth0;

	use \Nette\DI\Compiler;
	use \Nette\DI\CompilerExtension;

	final class NetteAuth0Extension extends CompilerExtension {

		public $defaults = [
			'response_mode' => 'query',
			'response_type' => 'code',
			'persist_user' => true,
			'persist_access_token' => false,
			'persist_refresh_token' => false,
			'persist_id_token' => false,
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