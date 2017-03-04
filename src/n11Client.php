<?php
namespace ErayAkartuna\n11Client;

use ErayAkartuna\n11Client\Client\Gateway;

/**
 * Class n11Client
 * @package ErayAkartuna\n11Client
 */
class n11Client extends Gateway
{
    /**
     * @return string
     */
    public function toString()
    {
        return "N11 Web Service Client";
    }
}