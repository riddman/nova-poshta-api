# NovaPoshtaAPI
A simple library for working with API 2.0 of Nova Poshta (https://devcenter.novaposhta.ua/start)

Requirements:
- PHP 5.6 or higher

## Installation

### Step 1

Add to your ***composer.json*** file within ***repositories*** section next block

    {
        "type": "vcs",
        "url": "https://github.ideil.com/riddman/nova-poshta-api.git"
    }

Add to your ***composer.json*** file into  ***require*** section next line

     "riddman/nova-poshta-api": "1.0.0"

### Step 2
Run the following command

    composer update

## Usage

Example


    <?php

        use Riddman\NovaPoshtaApi\NovaPoshta;

        /* Some of your code*/

        $apiKey = 'your api key';

        $citiesList = NovaPoshta::getCities($apiKey);
        $departmentsList = NovaPoshta::getDepartments($apiKey);
