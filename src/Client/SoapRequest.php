<?php
namespace ErayAkartuna\n11Client\Client;

use ErayAkartuna\n11Client\Client\Contracts\RequestAbstract;

class SoapRequest extends RequestAbstract{

    /**
     * @param string $url
     * @param string $method
     * @param array $temp_params
     * @return mixed
     */
    public function makeRequest($url,$method,$temp_params = [])
    {
        $response = "";

        $soap_options = $this->getParam('soap_options') ? $this->getParam('soap_options') : [];
        $this->deleteParam('soap_options');

        $params = !empty($this->getParams()) ? array_merge($this->getParams(),$temp_params) : $temp_params;

        try{
            $client = new \SoapClient($url,$soap_options);
            $response = $client->{$method}($params);
        }
        catch(\SoapFault $fault){
            trigger_error("SOAP Fault: (faultcode: {$fault->faultcode}, faultstring: {$fault->faultstring})", E_USER_ERROR);
        }

        return $response;
    }

}