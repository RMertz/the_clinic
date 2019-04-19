<?php
require __DIR__ . "/../stubs/bipolar/bipolarD1-1.php";
use PHPUnit\Framework\TestCase;
final class scheduleVisitTest extends TestCase
{

    public function testVisitAdded(): void
    {
	$bipolar = new bipolarD11();
	$actual = $bipolar->test("2019-05-01");

	$this->assertEquals('Next Visit Added.', $actual);
    }

    public function testVisitNotAdded(): void
    {
	    $bipolar = new bipolarD11();
	    $actual = $bipolar->test("2019-04-01");

	    $this->assertEquals('Next Visit Not Added, Please Select a Valid Date.', $actual);

    }
}
?>

