<?php
require __DIR__ . "/../stubs/Login.php";
use PHPUnit\Framework\TestCase;

final class loginTest extends TestCase
{
    public function testLoginWithIncorrectInfo(): void
    {
        $login = new login();
        $actual = $login->test('incorrect', 'incorrect');

        $this->assertEquals('Your Login Name or Password is invalid', $actual);
    }

    public function testLoginWithCorrectInfo(): void
    {
        $login = new login();
        $actual = $login->test('username', 'password');

        $this->assertEquals('You are logged in', $actual);
    }

}
?>

