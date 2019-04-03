<?php
declare(strict_types=1);

use Config;

final class master
{
    public function start(): void
    {
	session_start();
    }
}
?>
