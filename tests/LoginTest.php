<?php

use PHPUnit\Framework\TestCase;

class loginTests extends TestCase
{
	public function testCountIsOne()
	{
		$login = new \webpages\Login();

		$expected = 1;

		$this->assertEquals($expected, $pages->render());

	}	
}
