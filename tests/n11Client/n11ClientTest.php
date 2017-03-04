<?php
namespace ErayAkartuna\n11Client;

/**
 * Class n11Client
 * @package ErayAkartuna\n11Client
 */
class n11ClientTest extends \PHPUnit_Framework_TestCase{

    public function setUp()
    {
        $this->client = new n11Client();
    }

    public function testToString()
    {
        $this->assertTrue(is_string($this->client->toString()));
    }
}