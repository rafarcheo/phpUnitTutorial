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

	protected $cart;

	public function setUp()
	{
		$this->cart = new Cart();
	}

	/**
	 * @test
	 */
	public function get_user_id()
	{
		$this->cart->setUserId(' 5 ');
		$this->assertEquals($this->cart->getUserId(), 5);
	}

	public function testThatWeCanGetCartUserId()
	{
		$this->cart->setUserId(' 5 ');
		$this->assertEquals($this->cart->getUserId(), 5);
	}

	public function testUserVariablesContainCorectContent()
	{
		$this->cart->setUserEmail('rafal@wp.pl');
		$this->cart->setUserId(' 5 ');

		$cartUserData = $this->cart->getUserData();
		$this->assertArrayHasKey('email', $cartUserData);
		$this->assertEquals($this->cart->getUserId(), 5);
		$this->assertEquals($this->cart->getUserEmail(), 'rafal@wp.pl');
	}
}
