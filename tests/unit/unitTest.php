<?php
// vendor\bin\phpuniy
namespace App;
/**
 * add composers autoload
 */
$path = join(DIRECTORY_SEPARATOR, array('..', '..', 'vendor', 'autoload.php'));
/** @noinspection PhpIncludeInspection */
require __DIR__ . DIRECTORY_SEPARATOR . $path;


use App\Models\Cart; 

class UnitTest extends \PHPUnit_Framework_TestCase
{

	public function setUp()
	{
		var_dump('setup test');
	}

	/**
	 * @test
	 */
	public function get_user_id()
	{
		$cart = new Cart();
		$cart->setUserId(' 5 ');
		$this->assertEquals($cart->getUserId(), 5);
	}

	public function testThatWeCanGetCartUserId()
	{
		$cart = new Cart();
		$cart->setUserId(' 5 ');
		$this->assertEquals($cart->getUserId(), 5);
	}

	public function testUserVariablesContainCorectContent()
	{
		$cart = new Cart();
		$cart->setUserEmail('rafal@wp.pl');
		$cart->setUserId(' 5 ');

		$cartUserData = $cart->getUserData();
		$this->assertArrayHasKey('email', $cartUserData);
		$this->assertEquals($cart->getUserId(), 5);
		$this->assertEquals($cart->getUserEmail(), 'rafal@wp.pl');
	}
}
