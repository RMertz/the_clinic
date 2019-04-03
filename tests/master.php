<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;


class master extends TestCase
{
	use TestCaseTrait;

	public function __construct(){

	}

	public function getConnection(): PDO
	{
		try {
    			$dsn = 'mysql:host=localhost;dbname=test;charset=utf8';
			$db = new PDO($dsn, 'travis', '');
			return $db;
		}catch(PDOException $ex){
    			echo "<script>console.log('Failed to open database')</script>";
		}
	}
	public function getDataSet()
	{

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
?>
