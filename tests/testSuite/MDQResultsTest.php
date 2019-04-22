<?php
require __DIR__ . "/../stubs/php/MDQResults.php";
use PHPUnit\Framework\TestCase;
final class MDQResultsTest extends TestCase
{
    public function testFullValues(): void
    {
        $results = new MDQResults();
        $actual = $results->getResults(1,2,3);

        $this->assertEquals('Possible Bipolar I Disorder', $actual['diagnosis']);
    }

    public function testSomeValues(): void
    {
        $results = new MDQResults();
        $actual = $results->getResults(null,2,3);

        $this->assertEquals('None', $actual['diagnosis']);
    }

    public function testNoValues(): void
    {
        $results = new MDQResults();
        $actual = $results->getResults(null,null,null);

        $this->assertEquals('None', $actual['diagnosis']);
    }

}
?>

