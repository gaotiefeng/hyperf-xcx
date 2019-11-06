<?php


namespace HyperfTest\Cases;


use HyperfTest\HttpTestCase;

class IndexTest extends HttpTestCase
{
    public function testIndexIndex()
    {
        $this->assertTrue(true);
        $this->assertTrue(is_array($this->get('/')));
    }
}