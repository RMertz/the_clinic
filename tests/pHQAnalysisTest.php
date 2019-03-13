<?php
declare(strict_types=1);

require __DIR__ . "/../webpages/php/pHQAnalysis.php";
use PHPUnit\Framework\TestCase;

final class testpHQAnalysis extends TestCase
{
	public function testpHQ()
	{
		$id1 = 1;
		$phq = new pHQAnalysis($id1);
		$id = $phq->getID();
		$this->assertEquals($id1,$id); 
	}
}
