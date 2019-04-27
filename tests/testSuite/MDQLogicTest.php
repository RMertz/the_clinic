<?php
require __DIR__ . "/../stubs/php/MDQLogic.php";
use PHPUnit\Framework\TestCase;
final class MDQLogicTest extends TestCase
{
    public function testTotalTrue(): void
    {
	$mdq = new MDQLogic();
	$answers = array(1,1,1,1,1,1,1,1,1,1,1,1,1,1,1);
        $actual = $mdq->getAnswers($answers);

        $this->assertTrue($actual['total']);
    }

    public function testTotalFalse(): void
    {
        $mdq = new MDQLogic();
        $actual = $mdq->getAnswers(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);

        $this->assertFalse($actual['total']);
    }

    public function test13Is1(): void
    {
        $mdq = new MDQLogic();
        $answers = array(0,0,0,0,0,0,0,0,0,0,0,0,0,1,0);
        $actual = $mdq->getAnswers($answers);

        $this->assertTrue($actual['q2']);
    }

    public function test13Is0(): void
    {
        $mdq = new MDQLogic();
        $answers = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
        $actual = $mdq->getAnswers($answers);

        $this->assertFalse($actual['q2']);
    }

    public function test14Is2(): void
    {
        $mdq = new MDQLogic();
        $answers = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,2);
        $actual = $mdq->getAnswers($answers);

        $this->assertTrue($actual['q3']);
    }

    public function test14Is1(): void
    {
        $mdq = new MDQLogic();
        $answers = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,1);
        $actual = $mdq->getAnswers($answers);

        $this->assertFalse($actual['q3']);
    }
}
?>

