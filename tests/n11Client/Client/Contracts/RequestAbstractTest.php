<?php
namespace ErayAkartuna\n11Client\Client\Contracts;

class RequestAbstractTest extends \PHPUnit_Framework_TestCase{

    public function setUp()
    {
        $this->stub = $this->getMockForAbstractClass('\ErayAkartuna\n11Client\Client\Contracts\RequestAbstract');
    }

    public function testMakeRequest()
    {
        $this->stub
            ->expects($this->any())
            ->method('makeRequest')
            ->with($GLOBALS['soap_test_wsdl'],$GLOBALS['soap_test_wsdl_method'])
            ->will($this->returnValue(TRUE));

        $this->assertTrue($this->stub->makeRequest($GLOBALS['soap_test_wsdl'],$GLOBALS['soap_test_wsdl_method']));
    }

    public function testSetAndGetParam()
    {
        $array = ['key' => 'value'];
        $this->stub->setParam('test',$array);
        $this->assertTrue(($array == $this->stub->getParam('test')));
    }

    public function testSetAndGetParams()
    {
        $array = ['key' => 'value'];
        $this->stub->setParams($array);
        $params = $this->stub->getParams();
        $this->assertTrue((isset($params['key'])));
    }

    public function testDeleteParam()
    {
        $array = ['key' => 'value'];

        $this->assertFalse($this->stub->getParam(key($array)));

        $this->stub->setParams($array);
        $this->assertNotFalse($this->stub->getParam(key($array)));

        $this->stub->deleteParam(key($array));
        $this->assertFalse($this->stub->getParam(key($array)));
    }

}