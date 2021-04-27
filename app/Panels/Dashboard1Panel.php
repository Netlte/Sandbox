<?php declare(strict_types = 1);

namespace App\Panels;

use Netlte\ActionBar\Button;
use Netlte\Boxes\Box;
use Netlte\Boxes\SmallBox;
use Netlte\Boxes\TabsBox;
use Netlte\Panel\AbstractPanel;
use Netlte\UI\HtmlControl;
use Nette\Utils\Html;

class Dashboard1Panel extends AbstractPanel {

	protected function startup(): void {

		$this->getActionBar()->addButton(
			'lg_button',
			'Awesome button !!!',
			'pencil',
			"Awesome ajax button's title",
			Button::SIZE_XS,
			'success',
			true
		)->setTranslator($this->getTranslator());

		$this->getActionBar()->addButton(
			'disabled_button',
			'Awesome button !!!',
			'pencil',
			"Awesome ajax button's title",
			Button::SIZE_XS,
			'warning',
			true
		)
			->setDisabled(true)
			->setTranslator($this->getTranslator());

		$this->getActionBar()->addDropDown(
			'dropdown',
			'Awesome dropdown !!!',
			'user',
			"Awesome dropdown's title",
			Button::SIZE_XS,
			'primary',
			true
		)
			->addItem('one', 'Item 1')
			->addItem('two', 'Item 2')
			->addItem('three', 'Item 3')
			->setTarget(Button::TARGET_BLANK)
			->setTranslator($this->getTranslator());

		// Add stats to panel
		$this->addComponent($this->statsFactory(), 'stats');

		// Add content to panel
		$this->addComponent($this->contentFactory(), 'content');
	}

	protected function statsFactory(): HtmlControl {
		// Create main wrapper for all stats components
		$stats = new HtmlControl(Html::el('div class=row'));

		// Create dummy wrapper for boxes
		$wrapper = new HtmlControl(Html::el('div', ['class' => 'col-sm-12 col-md-6 col-lg-3']));

		$orders = new SmallBox(
			'New Orders',
			'md-basket',
			'aqua',
			'150',
			'this'
		);

		$bounce = new SmallBox(
			'Bounce Rate',
			'md-stats',
			'green',
			'53%',
			'this'
		);

		$registrations = new SmallBox(
			'User Registrations',
			'md-person-add',
			'yellow',
			'44',
			'this'
		);

		$visitors = new SmallBox(
			'Unique Visitors',
			'md-pie',
			'red',
			'65',
			'this'
		);

		$orders->setTranslator($this->getTranslator());
		$bounce->setTranslator($this->getTranslator());
		$registrations->setTranslator($this->getTranslator());
		$visitors->setTranslator($this->getTranslator());

		// Wrap Orders box and add it to stat's main wrapper
		$stats->addComponent((clone $wrapper)->addComponent($orders, 'box'), 'orders');
		$stats->addComponent((clone $wrapper)->addComponent($bounce, 'box'), 'bounce');
		$stats->addComponent((clone $wrapper)->addComponent($registrations, 'box'), 'registrations');
		$stats->addComponent((clone $wrapper)->addComponent($visitors, 'box'), 'visitors');

		return $stats;
	}

	protected function contentFactory(): HtmlControl {
		$content = new HtmlControl(Html::el('div class=row'));
		$content->addComponent($this->leftColumnFactory(), 'left');
		$content->addComponent($this->rightColumnFactory(), 'right');

		return $content;
	}

	protected function leftColumnFactory(): HtmlControl {
		$left = new HtmlControl(Html::el('section class=col-lg-7'));

		$d_content = new HtmlControl(Html::el('p')->setText('Donut graph'));
		$a_content = new HtmlControl(Html::el('p')->setText('Area graph'));

		$sales = new TabsBox();
		$sales->addTab('donut', 'Donut')->addComponent($d_content, 'example');
		$sales->addTab('area', 'Area')->addComponent($a_content, 'example');

		$left->addComponent($sales, 'sales');

		return $left;
	}

	protected function rightColumnFactory(): HtmlControl {
		$right = new HtmlControl(Html::el('section class=col-lg-5'));

		$v_content = new HtmlControl(Html::el('p')->setText('Visitors map'));

		$visitors = new Box('Visitors');
		$visitors->setBackground('primary');
		$visitors->setSolid(true);
		$visitors->setBorder(false);
		$visitors->setCollapsable(true);
		$visitors->addTool('cal', 'calendar');
		$visitors->addComponent($v_content, 'map');

		$right->addComponent($visitors, 'visitors');

		return $right;
	}
}