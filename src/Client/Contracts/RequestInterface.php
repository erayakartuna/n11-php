<?php
namespace ErayAkartuna\n11Client\Client\Contracts;

interface RequestInterface
{
    /**
     * @param string $url
     * @param string $method
     * @param array $temp_params | temporary parameters
     * @return mixed
     */
    public function makeRequest($url,$method,$temp_params = []);

    /**
     * @param array $params
     */
    public function setParams($params = []);

    /**
     * @return string
     */
    public function getParams();

    /**
     * @param $key
     * @param $value
     */
    public function setParam($key,$value);

    /**
     * @param $key
     * @return mixed
     */
    public function getParam($key);

    /**
     * @param $key
     * @return boolean
     */
    public function deleteParam($key);
}