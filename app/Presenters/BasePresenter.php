<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Controls\Sidebar;
use App\Model\NavigationManagerFiller;
use Netlte\Navigation\IManager as NavigationManager;
use Netlte\Navigation\Navigation;
use Nette;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter {

	protected NavigationManager $manager;

	public function injectBaseServices(NavigationManager $manager): void {
		NavigationManagerFiller::prefill($manager, $this);
		$this->manager = $manager;
	}

	protected function createComponentSidebar(): Sidebar {

		$sidebar = new Sidebar();
		$navigation = new Navigation();
		$navigation->setManager($this->manager);
		$sidebar->addComponent($navigation, 'navigation');
		return $sidebar;
	}

}
