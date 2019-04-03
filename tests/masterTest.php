<?php
declare(strict_types=1);

use Config;

final class masterTest
{
	public function getConnection(): PDO
	{
		try {
    			$dsn = 'mysql:host=localhost;dbname=test;charset=utf8';
    			$db = new PDO($dsn, 'travis', '');
		}catch(PDOException $ex){
    			echo "<script>console.log('Failed to open database')</script>";
		}
	}


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
