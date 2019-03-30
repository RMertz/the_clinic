<?php
declare(strict_types=1);

use master;
require __DIR__ . "/../webpages/Email.php";
use PHPUnit\Framework\TestCase;

final class EmailTest extends TestCase
{

    public function testCannotBeCreatedFromInvalidEmailAddress(): void
    {
	start();    
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
