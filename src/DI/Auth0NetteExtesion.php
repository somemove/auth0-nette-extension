<?php

declare(strict_types=1);

namespace Somemove\Auth0NetteExtesion\DI;

use Auth0\SDK\Auth0;
use Nette\DI\CompilerExtension;

final class Auth0NetteExtesion extends CompilerExtension
{
	/** @var array<string, mixed> */
	public array $defaults = [
		'responseMode' => 'query',
		'responseType' => 'code',
		'domain' => null,
		'audience' => null,
		'scope' => null,
		'clientId' => null,
		'clientSecret' => null,
		'redirectUri' => null,
		'persistUser' => true,
		'persistAccessToken' => true,
		'persistRefreshToken' => true,
		'persistIdToken' => true,
		'stateHandler' => false,
		'store' => '@auth0.auth0storage',
		'debug' => false,
	];

	public function loadConfiguration(): void
	{
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
