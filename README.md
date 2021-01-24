# NovaPoshtaAPI
A simple library for working with API 2.0 of Nova Poshta (https://devcenter.novaposhta.ua/start)


Requirements:
- PHP 5.6 or higher

## Installation


### Step 1
Run the following command

    composer require riddman/nova-poshta-api

## Usage

Example


    <?php

        use Riddman\NovaPoshtaApi\NovaPoshta;

        /* Some of your code*/

        $apiKey = 'your api key';

        $citiesList = NovaPoshta::getCities($apiKey);
        $departmentsList = NovaPoshta::getDepartments($apiKey);

    // Get departments with pagination
    $itemsPerPage = 2;
    $pageNumber = 1;
    $departmentsList = NovaPoshta::getDepartments($apiKey, $itemsPerPage, $pageNumber);



Method **getCities** returns the following data:

    {
        "success": true,
        "data": [
            // here will be list of cities
        ],
        "errors": [],
        "warnings": [],
        "info": {
            "totalCount": 5964
        },
        "messageCodes": [],
        "errorCodes": [],
        "warningCodes": [],
        "infoCodes": []
    }
