<?php
namespace ErayAkartuna\n11Client\Client\Contracts;

abstract class RequestAbstract implements RequestInterface
{
    /**
     * @var string $params
     */
    protected $params;

    /**
     * @param string $url
     * @param string $method
     * @param array $temp_params | temporary parameters
     * @return mixed
     */
    abstract public function makeRequest($url,$method,$temp_params = []);

    /**
     * @param array $params
     */
    public function setParams($params = [])
    {
        $this->params = $params;
    }

    /**
     * @return string
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param $key
     * @param $value
     */
    public function setParam($key,$value)
    {
        $this->params[$key] = $value;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function getParam($key)
    {
        if(!isset($this->params[$key]))
            return false;

        return $this->params[$key];
    }

    /**
     * @param $key
     * @return bool
     */
    public function deleteParam($key)
    {
        if(!isset($this->params[$key]))
            return false;

        unset($this->params[$key]);
        return true;
    }


}