<?php declare(strict_types = 1);

namespace App\Panels;

use Netlte\Boxes\Box;
use Netlte\Boxes\InfoBox;
use Netlte\Boxes\SmallBox;
use Netlte\Panel\AbstractPanel;
use Netlte\UI\HtmlControl;
use Nette\Utils\Html;

class WidgetsDefaultPanel extends AbstractPanel {

	protected function startup(): void {

		// Add stats to panel
		$this->addComponent($this->statsFactory(), 'stats');

		// Add progress to panel
		$this->addComponent($this->progressFactory(), 'progress');

		// Add small boxes to panel
		$this->addComponent($this->smallboxesFactory(), 'small_boxes');

		// Add boxes to panel
		$this->addComponent($this->boxesFactory(), 'boxes');

		// Add solid boxes to panel
		$this->addComponent($this->solidBoxesFactory(), 'solid_boxes');
	}

	protected function statsFactory(): HtmlControl {
		// Create main wrapper for all stats components
		$stats = new HtmlControl(Html::el('div class=row'));

		// Create dummy wrapper for boxes
		$wrapper = new HtmlControl(Html::el('div', ['class' => 'col-sm-12 col-md-6 col-lg-3']));

		$orders = new InfoBox(
			'MESSAGES',
			'ios-mail-outline',
			'aqua',
			1410
		);

		$bounce = new InfoBox(
			'BOOKMARKS',
			'ios-flag-outline',
			'green',
			410
		);

		$registrations = new InfoBox(
			'UPLOADS',
			'ios-copy-outline',
			'yellow',
			13648
		);

		$visitors = new InfoBox(
			'LIKES',
			'ios-star-outline',
			'red',
			93139
		);

		// Wrap Orders box and add it to stat's main wrapper
		$stats->addComponent((clone $wrapper)->addComponent($orders, 'box'), 'orders');
		$stats->addComponent((clone $wrapper)->addComponent($bounce, 'box'), 'bounce');
		$stats->addComponent((clone $wrapper)->addComponent($registrations, 'box'), 'registrations');
		$stats->addComponent((clone $wrapper)->addComponent($visitors, 'box'), 'visitors');

		return $stats;
	}

	protected function progressFactory(): HtmlControl {
		// Create main wrapper for all stats components
		$stats = new HtmlControl(Html::el('div class=row'));

		// Create dummy wrapper for boxes
		$wrapper = new HtmlControl(Html::el('div', ['class' => 'col-sm-12 col-md-6 col-lg-3']));

		$bookmarks = new InfoBox(
			'BOOKMARKS',
			'ios-bookmark-outline',
			'aqua',
			41410,
			70,
			'70% Increase in 30 Days'
		);

		$likes = new InfoBox(
			'LIKES',
			'ios-thumbs-up-outline',
			'green',
			41410,
			70,
			'70% Increase in 30 Days'
		);

		$events = new InfoBox(
			'EVENTS',
			'ios-calendar-outline',
			'yellow',
			41410,
			70,
			'70% Increase in 30 Days'
		);

		$comments = new InfoBox(
			'COMMENTS',
			'ios-chatbubbles-outline',
			'red',
			41410,
			70,
			'70% Increase in 30 Days'
		);

		// Wrap Orders box and add it to stat's main wrapper
		$stats->addComponent((clone $wrapper)->addComponent($bookmarks, 'box'), 'bookmarks');
		$stats->addComponent((clone $wrapper)->addComponent($likes, 'box'), 'likes');
		$stats->addComponent((clone $wrapper)->addComponent($events, 'box'), 'events');
		$stats->addComponent((clone $wrapper)->addComponent($comments, 'box'), 'comments');

		return $stats;
	}

	protected function smallboxesFactory(): HtmlControl {
		// Create main wrapper for all stats components
		$stats = new HtmlControl(Html::el('div class=row'));

		// Create dummy wrapper for boxes
		$wrapper = new HtmlControl(Html::el('div', ['class' => 'col-sm-12 col-md-6 col-lg-3']));

		$orders = new SmallBox(
			'New Orders',
			'md-cart',
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

	protected function solidBoxesFactory(): HtmlControl {
		// Create main wrapper for all stats components
		$stats = new HtmlControl(Html::el('div class=row'));

		// Create dummy wrapper for boxes
		$wrapper = new HtmlControl(Html::el('div', ['class' => 'col-sm-12 col-md-6 col-lg-3']));

		$content = new HtmlControl(Html::el('')->setText('The body of the box'));

		$expandable = new Box('Expandable');
		$expandable->setCollapsed(true);
		$expandable->addComponent(clone $content, 'body');

		$removable = new Box('Removable');
		$removable
			->setBackground('success')
			->setRemovable(true)
			->addComponent(clone $content, 'body');

		$collapsable = new Box('Collapsable');
		$collapsable
			->setBackground('warning')
			->setCollapsable(true)
			->addComponent(clone $content, 'body');

		$loading = new Box('Loading state');
		$loading
			->setBackground('danger')
			->setOverlay(true)
			->addComponent(clone $content, 'body');

		// Wrap Orders box and add it to stat's main wrapper
		$stats->addComponent((clone $wrapper)->addComponent($expandable, 'box'), 'expandable');
		$stats->addComponent((clone $wrapper)->addComponent($removable, 'box'), 'removable');
		$stats->addComponent((clone $wrapper)->addComponent($collapsable, 'box'), 'collapsable');
		$stats->addComponent((clone $wrapper)->addComponent($loading, 'box'), 'loading');

		return $stats;
	}

	protected function boxesFactory(): HtmlControl {
		// Create main wrapper for all stats components
		$stats = new HtmlControl(Html::el('div class=row'));

		// Create dummy wrapper for boxes
		$wrapper = new HtmlControl(Html::el('div', ['class' => 'col-sm-12 col-md-6 col-lg-3']));

		$content = new HtmlControl(Html::el('')->setText('The body of the box'));

		$expandable = new Box('Expandable');
		$expandable
			->setSolid(false)
			->setCollapsed(true)
			->addComponent(clone $content, 'body');

		$removable = new Box('Removable');
		$removable
			->setSolid(false)
			->setBackground('success')
			->setRemovable(true)
			->addComponent(clone $content, 'body');

		$collapsable = new Box('Collapsable');
		$collapsable
			->setSolid(false)
			->setBackground('warning')
			->setCollapsable(true)
			->addComponent(clone $content, 'body');

		$loading = new Box('Loading state');
		$loading
			->setSolid(false)
			->setBackground('danger')
			->setOverlay(true)
			->addComponent(clone $content, 'body');

		// Wrap Orders box and add it to stat's main wrapper
		$stats->addComponent((clone $wrapper)->addComponent($expandable, 'box'), 'expandable');
		$stats->addComponent((clone $wrapper)->addComponent($removable, 'box'), 'removable');
		$stats->addComponent((clone $wrapper)->addComponent($collapsable, 'box'), 'collapsable');
		$stats->addComponent((clone $wrapper)->addComponent($loading, 'box'), 'loading');

		return $stats;
	}
}