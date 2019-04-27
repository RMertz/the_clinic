<?php
require __DIR__ . "/../stubs/dep/depDiag.php";
use PHPUnit\Framework\TestCase;
final class DepDiagTest extends TestCase
{
    //The first eight should add up so long as they are >1 and the last two
    //don't count towards '$actual['severityScore']'
    public function testSeverity(): void
    {
	$diag = new depDiag();
	$answers = array(2,2,0,0,1,1,1,1,0,2);
        $actual = $diag->test($answers);
	$num = 4;
        $this->assertEquals($num, $actual['severityScore']);
    }

    public function testq11(): void
    {
	$diag = new depDiag();
	$answers = array(2,0,0,0,1,1,1,1,0,2);
        $actual = $diag->test($answers);
        $num = 1;
        $this->assertEquals($num, $actual['q1']);
    }
    
    public function testq12(): void
    {
        $diag = new depDiag();
        $answers = array(0,2,0,0,1,1,1,1,0,2);
        $actual = $diag->test($answers);
        $num = 1;
        $this->assertEquals($num, $actual['q1']);
    }
    
    public function testq10(): void
    {
        $diag = new depDiag();
        $answers = array(0,0,0,0,1,1,1,1,0,2);
        $actual = $diag->test($answers);
        $num = 0;
        $this->assertEquals($num, $actual['q1']);
    }

    public function testq91(): void
    {
        $diag = new depDiag();
        $answers = array(0,0,0,0,1,1,1,1,2,2);
        $actual = $diag->test($answers);
        $num = 1;
        $this->assertEquals($num, $actual['q9']);
    }

    public function testq90(): void
    {
        $diag = new depDiag();
        $answers = array(0,0,0,0,1,1,1,1,0,2);
        $actual = $diag->test($answers);
        $num = 0;
        $this->assertEquals($num, $actual['q9']);
    }

    public function testq21(): void
    {
        $diag = new depDiag();
        $answers = array(2,2,2,2,2,1,1,1,2,2);
        $actual = $diag->test($answers);
        $num = 1;
        $this->assertEquals($num, $actual['q2']);
    }

    public function testq20(): void
    {
        $diag = new depDiag();
        $answers = array(0,0,2,2,2,1,1,1,2,2);
        $actual = $diag->test($answers);
        $num = 0;
        $this->assertEquals($num, $actual['q2']);
    }

    public function testq31(): void
    {
        $diag = new depDiag();
        $answers = array(0,0,2,2,2,1,1,1,1,2);
        $actual = $diag->test($answers);
        $num = 1;
        $this->assertEquals($num, $actual['q3']);
    }

    public function testq30(): void
    {
        $diag = new depDiag();
        $answers = array(1,1,2,2,2,1,1,1,1,0);
        $actual = $diag->test($answers);
        $num = 0;
        $this->assertEquals($num, $actual['q3']);
    }

}
?>

