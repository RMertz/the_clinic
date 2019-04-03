<?php include("master.php"); ?>
<?php
require __DIR__ . "/../webpages/php/addDiagnosis.php";
use PHPUnit\Framework\TestCase;
final class addDiagnosisTest extends TestCase
{
    public function testsInstantiation(): void
    {
	    $newaddDiagnosis = new addDiagnosis;
	    $this->assertEquals("AddedDiagnosis",$newaddDiagnosis->addDiagnosisToPatient('123','diagnosis'));
	     
    }

}

