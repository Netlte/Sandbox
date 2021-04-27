<?php declare(strict_types = 1);

namespace App\Presenters;


use App\Panels\Dashboard1Panel;
use App\Panels\Dashboard2Panel;

final class DashboardPresenter extends BasePresenter {

	public function startup(): void {
		parent::startup();

		foreach ($this->panels as $panel) {
			$panel->setTranslator($this->translator);
		}
	}

	public function injectPanels(
		Dashboard1Panel $v1,
		Dashboard2Panel $v2
	): void {
		$this->panels['default'] = $v1;
		$this->panels['v2'] = $v2;
	}

	public function actionDefault(): void {
		$this->panel->getHeader()->setHeading('Dashboard')->setSubheading('Control panel');
		$this->panel->getBread()->addBreadCrumb('Dashboard', 'Dashboard:default');
	}

	public function actionV2(): void {
		$this->panel->getHeader()->setHeading('Dashboard')->setSubheading('Control panel');
		$this->panel->getBread()->addBreadCrumb('Dashboard', 'Dashboard:v2');
	}
}
