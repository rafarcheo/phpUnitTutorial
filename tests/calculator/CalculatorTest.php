<?php
// vendor\bin\phpuniy
namespace App;


/**
 * add composers autoload
 */
$path = join(DIRECTORY_SEPARATOR, array('..', '..', 'vendor', 'autoload.php'));
/** @noinspection PhpIncludeInspection */
require __DIR__ . DIRECTORY_SEPARATOR . $path;

use App\Calculator\Calculator;
use App\Calculator\Addition;
use App\Calculator\Division;

class CalculatorTest extends \PHPUnit_Framework_TestCase
{
	/** @test */
	public function can_set_single_opetation()
	{
		$addition = new Addition;
		$addition->setOperands([5,10]);

		$calculator = new Calculator;
		$calculator->setOperation($addition);

		$this->assertCount(1, $calculator->getOperations());
	}


	/** @test */
	public function can_set_multiple_operations()
	{
		$addition = new Addition;
		$addition->setOperands([5, 10]);

		$addition1 = new Addition;
		$addition1->setOperands([2, 2]);

		$calculator = new Calculator;
		$calculator->setOperations([$addition, $addition1]);

		$this->assertCount(2, $calculator->getOperations());
	}

	/** @test */
	public function operations_are_ignored_if_not_instance_of_operation_interface()
	{
		$addition = new Addition;
		$addition->setOperands([5, 10]);

		$calculator = new Calculator;
		$calculator->setOperations([$addition, 'test']);

		$this->assertCount(1, $calculator->getOperations());
	}

	/** @test */
	public function can_calculate_result()
	{
		$addition = new Addition;
		$addition->setOperands([5, 10]);

		$calculator = new Calculator;
		$calculator->setOperation($addition);

		$this->assertEquals(15, $calculator->calculate());
	}

	/** @test */
	public function calculate_mathood_returns_multiple_result()
	{
		$addition = new Addition;
		$addition->setOperands([5, 10]);

		$division = new Division;
		$division->setOperands([50, 10]);

		$calculator = new Calculator;
		$calculator->setOperations([$addition, $division]);

		$this->assertInternalType('array', $calculator->calculate());
		$this->assertEquals(15, $calculator->calculate()[0]);
		$this->assertEquals(5, $calculator->calculate()[1]);
	}
}




