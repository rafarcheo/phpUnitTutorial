<?php
// vendor\bin\phpuniy
namespace App;

use App\Calculator\Addition;
/**
 * add composers autoload
 */
$path = join(DIRECTORY_SEPARATOR, array('..', '..', 'vendor', 'autoload.php'));
/** @noinspection PhpIncludeInspection */
require __DIR__ . DIRECTORY_SEPARATOR . $path;


class AdditionTest extends \PHPUnit_Framework_TestCase
{
	/** @test */
	public function adds_up_given_operands()
	{
		$addition = new Addition;
		$addition->setOperands([5, 10]);

		$this->assertEquals(15, $addition->calculate());
	}

	/** @test */
	public function no_opperands_given_throws_exception_when_calculating()
	{
		$this->expectException(\App\Calculator\Exceptions\NoOperandsException::class);

		$addition = new Addition;
		$addition->calculate();
	}
}