<?php
namespace ErayAkartuna\n11Client\Client;

class GatewayTest extends \PHPUnit_Framework_TestCase{

    public static $gateway;

    public static function setUpBeforeClass()
    {
        $soap_options = [
            "trace" => 1,
            'exceptions' => 1,
            "stream_context" => stream_context_create(
                array(
                    'ssl' => array(
                        'verify_peer'       => false,
                        'verify_peer_name'  => false,
                    )
                )
            )
        ];
        self::$gateway = new Gateway($soap_options);
    }

    public function testAuth()
    {
        $secrets = ['appKey' => $GLOBALS['app_key'] , 'appSecret' => $GLOBALS['app_secret']];
        self::$gateway->auth($secrets);
        $this->assertEquals(($secrets == self::$gateway->getClient()->getParam('auth')),true);
    }

    /**
     * @depends testAuth
     */
    public function testGetTopLevelCategories()
    {
        $categories = self::$gateway->getTopLevelCategories();
        $this->assertEquals((count($categories) > 0),true);
    }

    /**
     * @depends testAuth
     */
    public function testGetSubCategories()
    {
        $categories = self::$gateway->getTopLevelCategories();
        $subcategories = self::$gateway->getSubCategories($categories[0]->id);
        $this->assertEquals((count($subcategories) > 0),true);
    }

    /**
     * @depends testAuth
     */
    public function testGetProductList()
    {
        $limit = 10;
        $page = 0;
        $products = self::$gateway->getProductList($limit,$page);
        $this->assertEquals((count($products) == 10),true);
    }

    /**
     * @depends testAuth
     */
    public function testGetProductBySellerCode()
    {
        $products = self::$gateway->getProductList();
        $sellerCode = $products[0]->productSellerCode;
        $product = self::$gateway->getProductBySellerCode($sellerCode);
        $this->assertEquals(($sellerCode == $product->productSellerCode),true);
    }

    /**
     *
     */
    public function testGetCities()
    {
        $cities = self::$gateway->getCities();
        $this->assertEquals((isset($cities->result->status)),false);
        $this->assertEquals((count($cities) > 0),true);
    }

    /**
     * @depends testAuth
     */
    public function testSaveProduct()
    {
        $product =  [
            'productSellerCode' => 'exp-111',
            'title' => 'Test Product',
            'subtitle' => 'Web service test ',
            'description' => 'test product detail',
            'attributes' =>
                [
                    'attribute' => Array()
                ],
            'category' =>
                [
                    'id' => 1000038
                ],
            'price' => 0.99,
            'currencyType' => 'TL',
            'images' =>
                [
                    'image' =>
                        [
                        ]
                ],
            'saleStartDate' => '',
            'saleEndDate' => '',
            'productionDate' => '',
            'expirationDate' => '',
            'productCondition' => '1',
            'preparingDay' => '3',
            'discount' => 10,
            'shipmentTemplate' => 'Kapıda Ödeme',
            'stockItems' =>
                [
                    'stockItem' =>
                        [
                        ]
                ]
        ];

        $result = self::$gateway->saveProduct($product);

        $this->assertEquals($result->result->status,'success');
    }
}