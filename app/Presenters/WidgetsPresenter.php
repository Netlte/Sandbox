<?php declare(strict_types = 1);

namespace App\Presenters;


use App\Panels\WidgetsDefaultPanel;

final class WidgetsPresenter extends BasePresenter {

	public function startup(): void {
		parent::startup();

		foreach ($this->panels as $panel) {
			$panel->setTranslator($this->translator);
		}
	}

	public function injectPanels(
		WidgetsDefaultPanel $default
	): void {
		$this->panels['default'] = $default;
	}

	public function actionDefault(): void {
		$this->panel->getHeader()->setHeading('Widgets')->setSubheading('Preview page');
		$this->panel->getBread()->addBreadCrumb('Widgets', 'Widgets:default');
	}
}
