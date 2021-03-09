<?php

declare(strict_types=1);

namespace App\Model;

use Netlte\Navigation\IManager;
use Nette\Application\UI\Presenter;
use Nette\StaticClass;

class NavigationManagerFiller {
	use StaticClass;

	static public function prefill(IManager $manager, Presenter $presenter) {
		$section = $manager->createSection('main', 'MAIN NAVIGATION');

		$item = $section->createItem('dashboard', 'Dashboard')
			->setIcon('dashboard')
			->setLink('#')
			->setUrl(true)
			->addActiveCondition(function() use ($presenter): bool{
				return $presenter->isLinkCurrent(':Homepage:*');
			});

		$item->createItem('v1', 'Dashboard v1')
			->setLink('Homepage:default')
			->addActiveCondition(function() use ($presenter): bool{
				return $presenter->isLinkCurrent('Homepage:default');
			});

		$item->createItem('v2', 'Dashboard v2')->setLink('#')->setUrl(true);

		$section->createItem('layout_options', 'Layout Options')
			->setLink('#')
			->setUrl(true)
			->setIcon('files-o')
			->setLabel('4');

		$section->createItem('widgets', 'Widgets')
			->setLink('#')
			->setUrl(true)
			->setIcon('th')
			->setLabel('new', 'green');

		$item = $section->createItem('charts', 'Charts')
			->setLink('#')
			->setUrl(true)
			->setIcon('pie-chart');

		$item->createItem('chartjs', 'ChartJS')->setLink('#')->setUrl(true);
		$item->createItem('morris', 'Morris')->setLink('#')->setUrl(true);
		$item->createItem('flot', 'Flot')->setLink('#')->setUrl(true);
		$item->createItem('inline_charts', 'Inline charts')->setLink('#')->setUrl(true);

		$item = $section->createItem('ui_elements', 'UI Elements')
			->setLink('#')
			->setUrl(true)
			->setIcon('laptop');

		$item->createItem('general', 'General')->setLink('#')->setUrl(true);
		$item->createItem('icons', 'Icons')->setLink('#')->setUrl(true);
		$item->createItem('buttons', 'Buttons')->setLink('#')->setUrl(true);
		$item->createItem('slides', 'Sliders')->setLink('#')->setUrl(true);
		$item->createItem('timeline', 'Timeline')->setLink('#')->setUrl(true);
		$item->createItem('modals', 'Modals')->setLink('#')->setUrl(true);

		$item = $section->createItem('forms', 'Forms')
			->setLink('#')
			->setUrl(true)
			->setIcon('edit');

		$item->createItem('general', 'General Elements')->setLink('#')->setUrl(true);
		$item->createItem('advanced', 'Advanced Elements')->setLink('#')->setUrl(true);
		$item->createItem('editors', 'Editors')->setLink('#')->setUrl(true);

		$item = $section->createItem('tables', 'Tables')
			->setLink('#')
			->setUrl(true)
			->setIcon('table');

		$item->createItem('simple', 'Simple tables')->setLink('#')->setUrl(true);
		$item->createItem('data', 'Data tables')->setLink('#')->setUrl(true);

		$section->createItem('calendar', 'Calendar')
			->setLink('#')
			->setUrl(true)
			->setIcon('calendar')
			->setLabel('3', 'red');

		$section->createItem('mailbox', 'Mailbox')
			->setLink('#')
			->setUrl(true)
			->setIcon('envelope')
			->setLabel('12', 'yellow');

		$item = $section->createItem('examples', 'Examples')
			->setLink('#')
			->setUrl(true)
			->setIcon('folder');

		$item->createItem('invoice', 'Invoice')->setLink('#')->setUrl(true);
		$item->createItem('profile', 'Profile')->setLink('#')->setUrl(true);
		$item->createItem('login', 'Login')->setLink('#')->setUrl(true);
		$item->createItem('register', 'Register')->setLink('#')->setUrl(true);
		$item->createItem('lockscreen', 'Lockscreen')->setLink('#')->setUrl(true);
		$item->createItem('404', '404 Error')->setLink('#')->setUrl(true);
		$item->createItem('500', '500 Error')->setLink('#')->setUrl(true);
		$item->createItem('blank', 'Blank page')->setLink('#')->setUrl(true);
		$item->createItem('pace', 'Pace page')->setLink('#')->setUrl(true);

		$item = $section->createItem('multilevel', 'Multilevel')
			->setLink('#')
			->setUrl(true)
			->setIcon('share');

		$item->createItem('item1', 'Level One')->setLink('#')->setUrl(true);
		$subitem = $item->createItem('item2', 'Level One')->setLink('#')->setUrl(true);
		$item->createItem('item3', 'Level One')->setLink('#')->setUrl(true);

		$subitem->createItem('item1', 'Level Two')->setLink('#')->setUrl(true);
		$subsubitem = $subitem->createItem('item2', 'Level Two')->setLink('#')->setUrl(true);

		$subsubitem->createItem('item1', 'Level Three')->setLink('#')->setUrl(true);
		$subsubitem->createItem('item2', 'Level Three')->setLink('#')->setUrl(true);

		$section->createItem('documentation', 'Documentation')
			->setLink('#')
			->setUrl(true)
			->setIcon('book');

		$section = $manager->createSection('labels', 'LABELS');


		$section->createItem('important', 'Important')
			->setLink('#')->setUrl(true)
			->setIcon('circle-o', 'red');
		$section->createItem('warning', 'Warning')
			->setLink('#')->setUrl(true)
			->setIcon('circle-o', 'yellow');
		$section->createItem('information', 'Information')
			->setLink('#')->setUrl(true)
			->setIcon('circle-o', 'aqua');
	}
}