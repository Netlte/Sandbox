<?php declare(strict_types = 1);

namespace App\Presenters;

use App\Controls\Sidebar;
use App\Model\NavigationManagerFiller;
use Netlte\Navigation\IManager as NavigationManager;
use Netlte\Navigation\Navigation;
use Netlte\Panel\AbstractPanel;
use Nette;
use Nette\Localization\Translator;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter {

	/** @inject */
	public Translator $translator;

	protected AbstractPanel $panel;

	/** @var AbstractPanel[] */
	protected array $panels = [];

	protected NavigationManager $manager;

	public function startup(): void {
		$this->panel = $this->panels[$this->action] ?? $this->panels['default'];
		parent::startup();

		$this->panel->getBread()->addBreadCrumb('Home', 'Dashboard:default');
		$this->addComponent($this->panel, 'panel');
		$this->setView('default');
	}

	/**
	 * @return string[] Templates file paths
	 */
	public function formatTemplateFiles(): array {
		$filename = static::getReflection()->getFileName();
		$dir = \dirname($filename !== false ? $filename : '');
		$dir = \is_dir("$dir/templates") ? $dir : \dirname($dir);
		return \array_merge(parent::formatTemplateFiles(), ["$dir/templates/$this->view.latte"]);
	}

	public function injectBaseServices(NavigationManager $manager): void {
		NavigationManagerFiller::prefill($manager, $this);
		$this->manager = $manager;
	}

	protected function createComponentPanel(): AbstractPanel {
		return $this->panel;
	}

	protected function createComponentSidebar(): Sidebar {

		$sidebar = new Sidebar();
		$navigation = new Navigation();
		$navigation->setManager($this->manager);
		$sidebar->addComponent($navigation, 'navigation');
		return $sidebar;
	}

}
