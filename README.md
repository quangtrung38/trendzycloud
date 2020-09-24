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
use quangtrung38\trendzycloud\TrendzyCloud;

// upload

$data = [
    'file'   => $file, // input file
    'userId' => 1,
];

$trendzyCloud = new TrendzyCloud();
$result = $cloud->uploadFile($data);

$result = $cloud->uploadVideo($data);

$result = $cloud->uploadDocument($data);


// delete

$data = [
    'key'   => '5f6c4919e67b5',
    'userId' => \Auth::id(),
];

$cloud = new TrendzyCloud;
$result = $cloud->deleteImage($data);

$result = $cloud->deleteVideo($data);

$result = $cloud->deleteDocument($data);
```