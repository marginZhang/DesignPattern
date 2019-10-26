<?php
class Preferences {
	private $props = array();
	private static $instance;

	private function __construct() {}

	private function clone() {}

	public static function getInstance() {
		if (empty(self::$instance)) {
			self::$instance = new Preferences();
		}
		return self::$instance;
	}

	public function setProperty($key, $val) {
		$this->props[$key] = $val;
	}
	
	public function getPRoperty($key) {
		return $this->props[$key];
	}
}	

$pref = Preferences::getInstance();
$pref->setProperty('name', 'matt');

unset($pref);

$pref2 = Preferences::getInstance();
print_r($pref2->getProperty('name'));
