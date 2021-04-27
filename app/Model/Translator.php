<?php declare(strict_types = 1);

namespace App\Model;

class Translator implements \Nette\Localization\Translator {

	/** @var string[] */
	private static array $strings = [
		'netlte.small_box.more_info' => 'More info',
	];

	/**
	 * Translates the given string.
	 * @param  mixed  $message
	 * @param  mixed  ...$parameters
	 */
	public function translate($message, ...$parameters): string {
		if (!isset(self::$strings[$message])) return $message;
		return self::$strings[$message];
	}
}