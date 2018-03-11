<?php declare(strict_types=1);

	namespace Somemove\Auth0NetteExtesion;

	use \Auth0\SDK\Store\StoreInterface;
	use \Nette\Http\Session;
	use \Nette\Http\SessionSection;

	class Auth0NetteStorage implements StoreInterface {

		const AUTH0_SECTION = 'auth0';

		private $session;

		public function __construct(Session $session) {
			$this->session = $session;
		}

		public function set($key, $value) {
			if ($this->isStoreAvailable()) {
				$this->getStore()->offsetSet($key, $value);
			}
		}

		public function get($key, $default = NULL) {
			return $this->isStoreAvailable() && $this->getStore()->offsetExists($key) ?
				$this->getStore()->$key :
				NULL;
		}

		public function delete($key) {
			if ($this->isStoreAvailable()) {
				$this->getStore()->offsetUnset($key);
			}
		}

		private function isStoreAvailable(): bool {
			return $this->session->isStarted();
		}

		private function getStore(): SessionSection {
			return $this->session->getSection(self::AUTH0_SECTION);
		}
	}

?>