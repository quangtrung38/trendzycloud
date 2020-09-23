# Laravel TrendzyCloud
API Upload to TrendzyCloud

-----
**Install with composer**.

Install (Laravel)
-----------------
Install via composer
```
composer require quangtrung38/trendzycloud
php artisan vendor:publish --provider="quangtrung38\trendzycloud\TrendzyCloudServiceProvider"
```

Upload Image to cloud

```
Use Jacksonit\Shipping\GHN;

$trendzyCloud = new TrendzyCloud();
$result = $trendzyCloud->uploadImage($imageData);
```