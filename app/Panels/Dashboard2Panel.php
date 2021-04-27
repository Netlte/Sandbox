<?php declare(strict_types = 1);

namespace App\Panels;

use Netlte\Boxes\Box;
use Netlte\Boxes\InfoBox;
use Netlte\Panel\AbstractPanel;
use Netlte\UI\HtmlControl;
use Nette\Utils\Html;

class Dashboard2Panel extends AbstractPanel {

	protected function startup(): void {

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

		$orders = new InfoBox(
			'CPU TRAFFIC',
			'ios-settings-outline',
			'aqua',
			90
		);

		$bounce = new InfoBox(
			'LIKES',
			'logo-googleplus',
			'red',
			41410
		);

		$registrations = new InfoBox(
			'SALES',
			'ios-cart-outline',
			'green',
			760
		);

		$visitors = new InfoBox(
			'NEW MEMBERS',
			'ios-people-outline',
			'yellow',
			2000
		);

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
		$left = new HtmlControl(Html::el('section class=col-md-8'));

		$v_content = new HtmlControl(Html::el('p')->setText('Visitors Report Map'));

		$visitors = new Box('Visitors Report');
		$visitors->setBackground('success');
		$visitors->setSolid(false);
		$visitors->setBorder(true);
		$visitors->setCollapsable(true);
		$visitors->setRemovable(true);
		$visitors->addComponent($v_content, 'report');

		$left->addComponent($visitors, 'visitors');

		return $left;
	}

	protected function rightColumnFactory(): HtmlControl {
		$right = new HtmlControl(Html::el('section class=col-md-4'));

		$v_content = new HtmlControl(Html::el('p')->setText('Visitors Report Map'));

		$inventory = new InfoBox(
			'INVENTORY',
			'ios-pricetag-outline',
			'yellow',
			5200,
			100/2,
			"50% Increase in 30 Days"
		);

		$mentions = new InfoBox(
			'MENTIONS',
			'ios-heart-outline',
			'green',
			92050,
			20,
			"20% Increase in 30 Days"
		);

		$downloads = new InfoBox(
			'DOWNLOADS',
			'ios-cloud-download-outline',
			'red',
			114381,
			70,
			"70% Increase in 30 Days"
		);

		$messages = new InfoBox(
			'DIRECT MESSAGES',
			'ios-chatbubbles-outline',
			'aqua',
			163921,
			40,
			"40% Increase in 30 Days"
		);

		$right->addComponent($inventory, 'inventory');
		$right->addComponent($mentions, 'mentions');
		$right->addComponent($downloads, 'downloads');
		$right->addComponent($messages, 'messages');

		return $right;
	}
}