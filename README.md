# N11 Web Servis
Bu kütüphane ile n11 web servislerine erişebilirsiniz.

###Örnek Kod
```php
$client = new n11Client();

// App key ve app secretları giriyoruz.
$client->auth(array('appKey' => 'xxxx-xxxx-xxxx','appSecret' => 'xxxxxxx'));

$categories = $client->getTopLevelCategories(); //Kategorileri Çekiyoruz
$cities = $client->getCities(); //İl listesine ulaşıyoruz.

//Ürün ekleme - daha fazlası için n11 dökümanına bakabilirsiniz.
$client->saveProduct([
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
        ]);
```

Yazılan diğer metodları görmek için client/Gateway.php dosyasını inceleyebilirsiniz.

Geliştirmek için kodlarınızı n11Client.php içine ekleyebilirsiniz.

