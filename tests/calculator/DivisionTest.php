<?php namespace App;

/**
 * add composers autoload
 */
$path = join(DIRECTORY_SEPARATOR, array('..', '..', 'vendor', 'autoload.php'));
/** @noinspection PhpIncludeInspection */
require __DIR__ . DIRECTORY_SEPARATOR . $path;


use App\Calculator\Division;


class DivisionTest extends \PHPUnit_Framework_TestCase
{

	/** @test */
	public function divides_given_opernds()
	{
		$division = new Division;
		$division->setOperands([100,4]);

		$this->assertEquals(25, $division->calculate());
	}

	/** @test */
	public function no_opperands_given_throws_exception_when_calculating()
	{
		$this->expectException(\App\Calculator\Exceptions\NoOperandsException::class);

		$division = new Division;
		$division->calculate();
	}

	/** @test */
	public function delete_division_by_zero_operands()
	{
		$division = new Division;
		$division->setOperands([10, 0, 5, 0]);

		$this->assertEquals(2, $division->calculate());
	}
}