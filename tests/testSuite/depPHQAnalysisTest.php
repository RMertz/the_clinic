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

}
?>

