<?php
require __DIR__ . "/../stubs/createPatient.php";
use PHPUnit\Framework\TestCase;
final class createPatientTest extends TestCase
{

    public function testNewPatientAdded(): void
    {
        $pat = new createPatient();
        $actual = $pat->test('123', 'franklin', 'chad', 'sick');

        $this->assertEquals('Success!', $actual);
    }

    public function testCopyPatientAdded(): void
    {
        $pat = new createPatient();
        $actual = $pat->test(123, 'copy', 'copy', 'copy');

        $this->assertEquals('Sorry that combination already exists', $actual);
    }

}
?>
