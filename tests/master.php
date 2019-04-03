<?php
declare(strict_types=1);

use Config;

final class master
{
    public function start(): void
    {
	session_start();
    }

    public function unset(): void
    {
	    session_unset();
    }

    public function destroy(): void
    {
	    die();
    }
}
