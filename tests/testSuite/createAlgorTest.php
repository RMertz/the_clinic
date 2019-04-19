<?php
require __DIR__ . "/../stubs/createAlgo/createAlgor.php";
use PHPUnit\Framework\TestCase;
final class createAlgorTest extends TestCase
{

    public function testAddingOneDirection(): void
    {
        $algo = new createAlgor();
        $actual = $algo->test(1);

        $this->assertEquals('create 1 set of directions', $actual);
    }
    public function testAddingTwoDirection(): void
    {   
        $algo = new createAlgor();
        $actual = $algo->test(2);

        $this->assertEquals('create 2 sets of directions', $actual);
    }
    public function testAddingThreeDirection(): void
    {   
        $algo = new createAlgor();
        $actual = $algo->test(3);

        $this->assertEquals('create 3 sets of directions', $actual);
    }
    public function testAddingMoreThanThreeDirection(): void
    {   
        $algo = new createAlgor();
        $actual = $algo->test(4);

        $this->assertEquals('not a valid number of directions', $actual);
    }
    public function testAddingLessThanOneDirection(): void
    {   
        $algo = new createAlgor();
        $actual = $algo->test(0);

        $this->assertEquals('not a valid number of directions', $actual);
    }

}
?>
