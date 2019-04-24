<?php
require __DIR__ . "/../stubs/dep/dep2.php";
use PHPUnit\Framework\TestCase;

final class dep2Test extends TestCase
{

    public function testVisitAdded(): void
    {
        $dep = new dep2();
        $actual = $dep->test("2019-05-01");

        $this->assertEquals('Next Visit Added.', $actual);
    }

    public function testVisitNotAdded(): void
    {
            $dep = new dep2();
            $actual = $dep->test("2019-04-01");

            $this->assertEquals('Next Visit Not Added, Please Select a Valid Date.', $actual);

    }
}
?>

