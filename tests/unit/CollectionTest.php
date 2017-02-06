<?php
// vendor\bin\phpuniy
namespace App;

use IteratorAggregate;
use ArrayIterator;


/**
 * add composers autoload
 */
$path = join(DIRECTORY_SEPARATOR, array('..', '..', 'vendor', 'autoload.php'));
/** @noinspection PhpIncludeInspection */
require __DIR__ . DIRECTORY_SEPARATOR . $path;


class CollectionTest extends \PHPUnit_Framework_TestCase
{
	/** @test */
	public function empty_instantiated_collection_returns_no_items()
	{
		$collection = new \App\Support\Collection;
		$this->assertEmpty($collection->get());
	}

	/** @test */
	public function count_is_correct_items_quantity()
	{
		$collection = new \App\Support\Collection([
			'one', 'two', 'three'
			]);

		$this->assertEquals(3, $collection->count());
	}

		/** @test */
	public function items_returned_match_items_passed_in()
	{
		$collection = new \App\Support\Collection([
			'one', 'two'
			]);

		$this->assertCount(2, $collection->get());
		$this->assertEquals($collection->get()[0], 'one');
		$this->assertEquals($collection->get()[1], 'two');
	}

	/** @test */
	public function collection_is_instance_of_aggregate()
	{
		$collection = new \App\Support\Collection;

		$this->assertInstanceOf(IteratorAggregate::class, $collection);
	}

	/** @test */
	public function collection_can_be_iterated()
	{
		$collection = new \App\Support\Collection([
			'one', 'two', 'three'
			]);

		$items = [];

		foreach ($collection as $item) {
			$items[] = $item;
		}

		$this->assertCount(3, $items);
		$this->assertInstanceOf(ArrayIterator::class, $collection->getIterator());
	}

	/** @test */ 
	public function collection_can_be_marged_with_another_collection()
	{
		$collection1 = new \App\Support\Collection(['one', 'two', 'three']);			
		$collection2 = new \App\Support\Collection(['four', 'five']);		

		$collection1->merge($collection2);

		$this->assertCount(5, $collection1->get());
		$this->assertEquals(5, $collection1->count());
	}

	/** @test */
	public function can_add_to_existing_collection()
	{
		$collection = new \App\Support\Collection(['one', 'two', 'three']);	
		$collection->add(['three']);

		$this->assertCount(4, $collection->get());
		$this->assertEquals(4, $collection->count());

	}

	/** @test */
	public function return_json_encoded_items()
	{
		$collection = new \App\Support\Collection([
			['username' => 'billy'],
			['username' => 'alan']
		]);	

		var_dump($collection->toJson());
		$this->assertInternalType('string', $collection->toJson());
		$this->assertEquals('[{"username":"billy"},{"username":"alan"}]', $collection->toJson());
	}

	/** @test */
	public function json_encoding_a_collection_object_returns_json()
	{
		$collection = new \App\Support\Collection([
			['username' => 'billy'],
			['username' => 'alan']
		]);

		$encoded = json_encode($collection);
		$this->assertInternalType('string', $encoded);
		$this->assertEquals('[{"username":"billy"},{"username":"alan"}]', $encoded);		
	}
}

