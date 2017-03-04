<?php
namespace ErayAkartuna\n11Client\Client;

class SoapRequestTest extends \PHPUnit_Framework_TestCase{

    public function testMakeRequest()
    {
        $request = new SoapRequest();
        $response = $request->makeRequest($GLOBALS['soap_test_wsdl'],$GLOBALS['soap_test_wsdl_method']);
        $this->assertEquals('success',$response->result->status);
    }
}