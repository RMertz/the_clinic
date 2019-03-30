<?php
declare(strict_types=1);

use Config.php;
require __DIR__ . "/../webpages/Email.php";
use PHPUnit\Framework\TestCase;

final class EmailTest extends TestCase
{

    public function testCannotBeCreatedFromInvalidEmailAddress(): void
    {
	session_start();    
	$this->expectException(InvalidArgumentException::class);

        Email::fromString('invalid');
    }

    public function testCanBeUsedAsString(): void
    {
        $this->assertEquals(
            'user@example.com',
            Email::fromString('user@example.com')
        );
    }
}
