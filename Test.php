<?php

namespace Riddman\NovaPoshtaApi;

use Riddman\NovaPoshtaApi\NovaPoshta;

class Test
{
    public static function getCities($key)
    {
        $cities = NovaPoshta::getCities($key);

        foreach ($cities as $key => $item) {
            dump($key);
        }

        dump(reset($cities['data']));
        dump(reset($cities['info']));



    }

    public static function getDepartments($key)
    {
        $departments = NovaPoshta::getDepartments($key);

        foreach ($departments as $key => $item) {
            dump($key);
        }

        dump(reset($departments['data']));

        dump('===============');

        $departments = NovaPoshta::getDepartments($key, 5, 1);

        foreach ($departments as $key => $item) {
            dump($key);
        }

        dump($departments);
    }
}