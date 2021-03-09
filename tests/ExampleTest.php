<?php declare(strict_types = 1);

namespace App\Tests;

use Nette;
use Tester;
use Tester\Assert;

require __DIR__ . '/../vendor/autoload.php';


class ExampleTest extends Tester\TestCase {

	private Nette\DI\Container $container;


	public function __construct(Nette\DI\Container $container) {
		$this->container = $container;
	}


	public function setUp(): void {
	}


	public function testSomething(): void {
		Assert::type(Nette\DI\Container::class, $this->container);
		Assert::true(true);
	}
}


$container = \App\Bootstrap::bootForTests()
	->createContainer();

$test = new ExampleTest($container);
$test->run();
