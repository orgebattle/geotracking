### Installation
```shell script
composer require orgebattle/geotracking
```

### How to use
```php
use orgebattle\Trilateration\Intersection;
use orgebattle\Trilateration\Sphere;
use orgebattle\Distance\Distance;

// 각각의 AP의 TxPower, RSSI를 이용하여 거리 측정
// $factor: 측정환경에 따른 인자 (기본값 2: free area)
$distanceByRssi = new Distance($txPower, $rssi, $factor);
$distance = $distanceByRssi->calculate();


// 3개의 구체 생성
$sphere1 = new Sphere($latitude1, $longitude1, $distance1);
$sphere2 = new Sphere($latitude2, $longitude2, $distance2);
$sphere3 = new Sphere($latitude3, $longitude3, $distance3);

// 삼변측량을 이용하여 위/경도 계산
$trilateration = new Intersection($sphere1, $sphere2, $sphere3);
$points = $trilateration->position();   // 리턴값 "latitude,longitude"
```
