<?php declare(strict_types = 1);

namespace App\Controls;


use Netlte\UI\AbstractControl;

class Sidebar extends AbstractControl {

	public const DEFAULT_TEMPLATE = __DIR__ . \DS . 'templates' . \DS . 'sidebar.latte';
	static public string $DEFAULT_TEMPLATE = self::DEFAULT_TEMPLATE;

	public function render(): void {
		$this->getTemplate()->setFile($this->getTemplateFile() ?? self::$DEFAULT_TEMPLATE);
		$this->getTemplate()->setTranslator($this->getTranslator());
		$this->getTemplate()->render();
	}
}