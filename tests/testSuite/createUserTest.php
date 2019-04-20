<?php
require __DIR__ . "/../stubs/createUser.php";
use PHPUnit\Framework\TestCase;

final class createUserTest extends TestCase
{

    public function testNewUserAdded(): void
    {
        $pat = new createUser();
        $actual = $pat->test('username', 'franklin', 'chad', 'password');

        $this->assertEquals('Success!', $actual);
    }

    public function testCopyUserAdded(): void
    {
        $pat = new createUser();
        $actual = $pat->test('copy', 'copy', 'copy', 'copy');

        $this->assertEquals('Sorry that combination already exists', $actual);
    }

}
?>

