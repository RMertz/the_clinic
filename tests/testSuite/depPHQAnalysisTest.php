<?php
require __DIR__ . "/../stubs/dep/depPHQAnalysis.php";
use PHPUnit\Framework\TestCase;
final class depPHQAnalysisTest extends TestCase
{

    public function testType0Depression(): void
    {
        $analysis = new depPHQAnalysis();
        $actual = $analysis->test(0, 1, 1, 1, 0, 0);

        $this->assertEquals('Depression', $actual['diagnosis']);
    }
   
    public function testType0None(): void
    {   
        $analysis = new depPHQAnalysis();
        $actual = $analysis->test(0, 0, 1, 1, 0, 0);
        
        $this->assertEquals('None', $actual['diagnosis']);
    }

    public function testType1(): void
    {
        $analysis = new depPHQAnalysis();
        $actual = $analysis->test(1, 1, 0, 1, 0, 0);

        $this->assertEquals('', $actual['diagnosis']);
    }

    public function testType1q11q31(): void
    {
        $analysis = new depPHQAnalysis();
        $actual = $analysis->test(1, 1, 0, 1, 0, 0);

	$this->assertEquals('A Treatment change may be warranted because at least one of the first two questions
was rated a 2 or 3 OR question 10 was rated at least Somewhat difficult.', $actual['treatmentTF']);
    }

    public function testType1q10q31(): void
    {
        $analysis = new depPHQAnalysis();
        $actual = $analysis->test(1, 0, 0, 0, 0, 0);

        $this->assertEquals('A Treatment change may NOT be warranted because none of the first two questions
was rated a 2 or 3 OR question 10 was rated Somewhat difficult or above.', $actual['treatmentTF']);
    }

    public function testType1q91(): void
    {
        $analysis = new depPHQAnalysis();
        $actual = $analysis->test(1, 1, 0, 1, 1, 0);

        $this->assertEquals('Due to positive answer to question 9 it is recommenced that the patient is assessed for suicide risk.', $actual['suicide']);
    }

    public function testType1q90(): void
    {
        $analysis = new depPHQAnalysis();
        $actual = $analysis->test(1, 1, 0, 1, 0, 0);

        $this->assertEquals('Due to negative answer to question 9 it is NOT recommenced that the patient is assessed for suicide risk.', $actual['suicide']);
    }

   public function testType1Total5(): void
    {
        $analysis = new depPHQAnalysis();
        $actual = $analysis->test(1, 1, 0, 1, 0, 5);

        $this->assertEquals(' Minimal Symptoms ', $actual['tentativeDiag']);
   }

   public function testType1Total10(): void
    {
        $analysis = new depPHQAnalysis();
        $actual = $analysis->test(1, 1, 0, 1, 0, 10);

        $this->assertEquals(' Minor Depression Dysthymia or Major Depression, Mild ', $actual['tentativeDiag']);
    }

  public function testType1Total15(): void
    {
        $analysis = new depPHQAnalysis();
        $actual = $analysis->test(1, 1, 0, 1, 0, 15);

        $this->assertEquals(' Major Depression, Moderate ', $actual['tentativeDiag']);
    }

  public function testType1Total20(): void
    {
        $analysis = new depPHQAnalysis();
        $actual = $analysis->test(1, 1, 0, 1, 0, 20);

        $this->assertEquals(' Major Depression, Severe ', $actual['tentativeDiag']);
    }

  public function testType1Total0(): void
    {
        $analysis = new depPHQAnalysis();
        $actual = $analysis->test(1, 1, 0, 1, 0, 0);

        $this->assertEquals(' None ', $actual['tentativeDiag']);
    } 
}
?>

