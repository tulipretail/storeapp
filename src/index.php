<?php

require ('../vendor/autoload.php');
require ('stores.php');

// Use the RestClient library to create an API connection
// See for details: https://github.com/tcdent/php-restclient

$api_key = "yyy";  // your applications API key
$config = array(
    'base_url' => "https://zzz.tulipretail.com/",  // HTTPS host for your API requests
    'headers' => array('X-Tulip-ApiKey' => $api_key)           // API key, included with every request
);
$api = new RestClient($config);

// get a list of all stores

$stores = new Stores($api);
$store_json = $stores->get();

?>
<!DOCTYPE html>
<html lang="en">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <head>
        <title>StoreApp | Tulip Retail</title>
    </head>
    <body>
        <div ng-app="storeApp" ng-controller="storesCtrl">
            <div ng-repeat="store in data.stores">
                <strong>{{ store.name }}</strong>
                <p>{{ store.address }}<br />{{store.city}} {{store.postal_code}}<br />{{store.phone}}</p>
            </div>
        </div>
        <script>
            var app = angular.module('storeApp', []);
            app.controller('storesCtrl', function ($scope) {
               $scope.data = <?php echo $store_json; ?>; 
            });
        </script>
    </body>
</html>