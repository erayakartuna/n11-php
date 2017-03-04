<?php
namespace ErayAkartuna\n11Client\Client\Contracts;

class GatewayAbstractTest extends \PHPUnit_Framework_TestCase{

    public function setUp()
    {
        $this->stub = $this->getMockForAbstractClass('\ErayAkartuna\n11Client\Client\Contracts\GatewayAbstract');
    }

    public function testSetAndGetClient()
    {
        $request = $this->getMockForAbstractClass('\ErayAkartuna\n11Client\Client\Contracts\RequestAbstract');
        $this->stub->setClient($request);
        $this->assertTrue(($request == $this->stub->getClient()));
    }

    public function testAuth()
    {
        $this->stub
            ->expects($this->any())
            ->method('auth')
            ->will($this->returnValue(TRUE));
        $this->assertTrue($this->stub->auth());
    }
}