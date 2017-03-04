<?php
namespace ErayAkartuna\n11Client\Client;

use ErayAkartuna\n11Client\Client\Contracts\GatewayAbstract;

class Gateway extends GatewayAbstract
{
    /**
     * @param array $soap_options
     */
    public function __construct($soap_options = [])
    {
        $soapClient = new SoapRequest();
        $soapClient->setParam('soap_options',$soap_options);
        parent::setClient($soapClient);
    }

    /**
     * @param array $secrets
     */
    public function auth($secrets = [])
    {
        $this->client->setParam('auth',['appKey' => $secrets['appKey'],'appSecret' => $secrets['appSecret']]);
    }

    /**
     * @return mixed
     */
    public function getTopLevelCategories()
    {
        $response = $this->client->makeRequest('https://api.n11.com/ws/CategoryService.wsdl','getTopLevelCategories');
        return isset($response->categoryList->category) ? $response->categoryList->category : $response;
    }

    /**
     * @param $category_id
     * @return mixed
     */
    public function getSubCategories($category_id)
    {
        $response = $this->client->makeRequest('https://api.n11.com/ws/CategoryService.wsdl','getTopLevelCategories',['category_id' => $category_id]);
        return isset($response->categoryList->category) ? $response->categoryList->category : $response;
    }

    /**
     * @param int $limit
     * @param int $page
     * @return mixed
     */
    public function getProductList($limit = 20,$page = 0)
    {
        $response = $this->client->makeRequest('https://api.n11.com/ws/ProductService.wsdl','getProductList',['pagingData' => ['pageSize' => $limit,'currentPage' => $page]]);
        return isset($response->products->product) ? $response->products->product : $response;
    }

    /**
     * @param $sellerCode
     * @return mixed
     */
    public function getProductBySellerCode($sellerCode)
    {
        $response = $this->client->makeRequest('https://api.n11.com/ws/ProductService.wsdl','getProductBySellerCode',['sellerCode' => $sellerCode]);
        return isset($response->product) ? $response->product : $response;
    }

    /**
     * @param array $product
     * @return mixed
     */
    public function saveProduct($product = [])
    {
        $response = $this->client->makeRequest('https://api.n11.com/ws/ProductService.wsdl','saveProduct',['product' => $product]);
        return $response;
    }

    /**
     * @param $sellerCode
     * @return mixed
     */
    public function deleteProductBySellerCode($sellerCode)
    {
        $response = $this->client->makeRequest('https://api.n11.com/ws/ProductService.wsdl','deleteProductBySellerCode',['productSellerCode' => $sellerCode]);
        return $response;
    }

    /**
     * @param array $searchData
     * @return mixed
     */
    public function getOrderList($searchData = [])
    {
        $response = $this->client->makeRequest('https://api.n11.com/ws/OrderService.wsdl','orderList',['searchData' => $searchData]);
        return $response;
    }

    /**
     * @param $sellerCode
     * @param $price
     * @param string $currencyType
     * @return mixed
     */
    public function updateProductPriceBySellerCode($sellerCode,$price,$currencyType = "")
    {
        $response = $this->client->makeRequest('https://api.n11.com/ws/ProductService.wsdl','UpdateProductPriceBySellerCode',['productSellerCode' => $sellerCode,'price' => $price,'currencyType' => $currencyType]);
        return isset($response->products->product) ? $response->product : $response;
    }

    /**
     * @param $sellerCode
     * @return mixed
     */
    public function getProductStockBySellerCode($sellerCode)
    {
        $response = $this->client->makeRequest('https://api.n11.com/ws/ProductStockService.wsdl','UpdateProductPriceBySellerCode',['productSellerCode' => $sellerCode]);
        return isset($response->products->product) ? $response->product : $response;
    }

    /**
     * @param $sellerCode
     * @param $quantity
     * @return mixed
     */
    public function updateStockByStockSellerCodeRequest($sellerCode,$quantity)
    {
        $response = $this->client->makeRequest('https://api.n11.com/ws/ProductStockService.wsdl','UpdateProductPriceBySellerCode',['productSellerCode' => $sellerCode,'quantity' => $quantity]);
        return $response;
    }

    /**
     * @return mixed
     */
    public function getCities() {
        $response = $this->client->makeRequest('https://api.n11.com/ws/CityService.wsdl','getCities');
        return isset($response->cities->city) ? $response->cities->city : $response;
    }

}