<?php
use PHPUnit\Framework\TestCase;
class OutputTest extends TestCase
{
 public function testExpectFooActualFoo()
 {
 $this->expectOutputString('foo');
 print 'foo';
 }
