<?php
session_start();
include("masterTest.php");
require __DIR__ . "/../webpages/php/addDiagnosis.php";
use PHPUnit\Framework\TestCase;
final class addDiagnosisTest extends TestCase
{
    public function testsInstantiation(): void
    {
	    $masterTest = masterTest();
	    $db = masterTest->getConnection();
	    session_start();
	    $newaddDiagnosis = new addDiagnosis();
	    $this->assertEquals("AddedDiagnosis",$newaddDiagnosis->addDiagnosisToPatient('123','diagnosis'));
	     
    }

}
?>
