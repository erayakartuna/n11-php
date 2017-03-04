<?php
namespace ErayAkartuna\n11Client\Client\Contracts;

abstract class GatewayAbstract
{
    /**
     * @var RequestInterface
     */
    protected $client;

    /**
     * @param array $secrets
     */
    abstract public function auth($secrets = []);

    /**
     * @param RequestInterface $request
     */
    public function setClient(RequestInterface $request)
    {
        $this->client = $request;
    }

    /**
     * @return RequestInterface
     */
    public function getClient()
    {
        return $this->client;
    }
}