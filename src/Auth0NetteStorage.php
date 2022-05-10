<?php

declare(strict_types=1);

namespace Somemove\Auth0NetteExtesion;

use Auth0\SDK\Contract\StoreInterface;
use Nette\Http\Session;
use Nette\Http\SessionSection;

final class Auth0NetteStorage implements StoreInterface
{
	public const AUTH0_SECTION = 'auth0';

	private Session $session;

	public function __construct(Session $session)
	{
		$this->session = $session;
	}

	public function set($key, $value): void
	{
		if ($this->isStoreAvailable()) {
			$this->getStore()->offsetSet($key, $value);
		}
	}

	public function get($key, $default = null)
	{
		return $this->isStoreAvailable() && $this->getStore()->offsetExists($key) ?
			$this->getStore()->$key :
			$default;
	}

	public function delete($key): void
	{
		if ($this->isStoreAvailable()) {
			$this->getStore()->offsetUnset($key);
		}
	}

	private function isStoreAvailable(): bool
	{
		return $this->session->isStarted();
	}

	/**
	 * @return SessionSection<mixed>
	 */
	private function getStore(): SessionSection
	{
		return $this->session->getSection(self::AUTH0_SECTION);
	}

	public function purge(): void
	{
	}

	public function defer(bool $deferring): void
	{
	}
}
