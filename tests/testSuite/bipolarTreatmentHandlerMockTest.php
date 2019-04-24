<?php
require __DIR__ . "/../stubs/php/bipolarTreatmentHandler.php";
use PHPUnit\Framework\TestCase;
final class bipolarTreatmentHandlerTest extends TestCase
{

    public function testNoData(): void
    {
        $handler = new bipolarTreatmentHandler();
	$type = array();
	$type['bipolarDTreatment'] = null;
	$type['bipolarMTreatment'] = null;
	$actual = $handler->checkTreatment($type);

        $this->assertEquals('Bipolar_Depression Treatment ', $actual['biD']);
    }

    public function testFullData(): void
    {
        $handler = new bipolarTreatmentHandler();
        $type = array();
        $type['bipolarDTreatment'] = 1;
        $type['bipolarMTreatment'] = 1;
        $actual = $handler->checkTreatment($type);

        $this->assertEquals('Select Which Type of Bipolar Treatment You Would Like to Continue', $actual['title']);
    }

    public function testNullD(): void
    {
        $handler = new bipolarTreatmentHandler();
        $type = array();
        $type['bipolarDTreatment'] = null;
        $type['bipolarMTreatment'] = 1;
        $actual = $handler->checkTreatment($type);

        $this->assertEquals('Select If You Would Continue Manic Depression Treatment Or Start a New Bipolar Depression Treatment', $actual['title']);
    }

    public function testNullM(): void
    {
        $handler = new bipolarTreatmentHandler();
        $type = array();
        $type['bipolarDTreatment'] = 1;
        $type['bipolarMTreatment'] = null;
        $actual = $handler->checkTreatment($type);

        $this->assertEquals('Select If You Would Continue Bipolar Depression Treatment Or Start a New Bipolar Manic Treatment', $actual['title']);
    }


}
?>

