<?php
namespace ErayAkartuna\n11Client\Client\Contracts;

interface GatewayInterface
{
    /**
     * @param array $secrets
     * @return mixed
     */
    public function auth($secrets = []);

    /**
     * @param RequestInterface $request
     */
    public function setClient(RequestInterface $request);

    /**
     * @return RequestInterface
     */
    public function getClient();
}