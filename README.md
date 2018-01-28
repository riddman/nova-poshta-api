# NovaPoshtaAPI
A simple library for working with API 2.0 of Nova Poshta ( https://novaposhta.ua/job)

Usage

in your controller

<?php
...

use Riddman\NovaPoshtaApi\NovaPoshta;

...

$apiKey = 'your api key';

$citiesList      = NovaPoshta::getCities($apiKey);
$departmentsList = NovaPoshta::getDepartments($apiKey);
