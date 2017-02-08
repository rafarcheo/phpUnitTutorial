<?php namespace App\Calculator;

use App\Calculator\OperationInterface;
use App\Calculator\OperationAbstract;
use App\Calculator\Exceptions\NoOperandsException;

class Division extends OperationAbstract  implements OperationInterface
{

	public function calculate()
	{
		if(count($this->operands) === 0){
			throw new NoOperandsException;
		}

		// foreach ($this->operands as $index => $operand) {
		// 	if ($index === 0) {
		// 		$result = $operand;
		// 		continue;
		// 	}

		// 	$result = $result / $operand;
		// }

		// return $result;

		// return array_sum($this->operands);
		$cleadOperands = array_filter($this->operands); # remove from array 0, null.. ect.
		return array_reduce($cleadOperands, function($a, $b) {
			if ($a !== null && $b !== null) {
				return $a / $b;
			}

			return $b;
		}, null);
	}
}