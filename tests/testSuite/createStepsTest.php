<?php
require __DIR__ . "/../stubs/createAlgo/createSteps.php";
use PHPUnit\Framework\TestCase;
final class createStepsTest extends TestCase
{

    public function testNoDirectionAdded(): void
    {
        $steps = new createSteps();

        $this->assertFalse($steps->test(0,0,0,0));
    }

        public function testOneDirectionAdded(): void
    {
        $steps = new createSteps();

        $this->assertFalse($steps->test(1,0,0,0));
    }

    public function testTwoDirectionAdded(): void
    {
        $steps = new createSteps();

        $this->assertTrue($steps->test(1,1,0,0));
    }

    public function testSecondDirectionAdded(): void
    {
        $steps = new createSteps();

        $this->assertTrue($steps->test(0,1,0,0));
    }

    public function testDisconnectedDirectionAdded(): void
    {
        $steps = new createSteps();

        $this->assertFalse($steps->test(0,0,0,1));
    }


}
?>


