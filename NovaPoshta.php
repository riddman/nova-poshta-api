<?php

namespace Riddman\NovaPoshtaApi;



class NovaPoshta
{
    protected static $url = 'https://api.novaposhta.ua/v2.0/json/';

    protected static function query($url, $data)
    {
        $post = json_encode($data);
        $ch   = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        $result = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($result, true);
        return (empty($result['data'])) ? false : $result['data'];
    }

    public static function getCities($novaPoshtaApiKey)
    {
        $citiesData = array(
            'modelName'        => 'Address',
            'calledMethod'     => 'getCities',
            //'methodProperties' => array(),
            'apiKey'           => $novaPoshtaApiKey
        );

        return self::query(self::$url, $citiesData);
    }

    public static function getDepartments($novaPoshtaApiKey)
    {
        $departmentsData = array(
            'modelName'        => 'AddressGeneral',
            'calledMethod'     => 'getWarehouses',
            //'methodProperties' => array(),
            'apiKey'           => $novaPoshtaApiKey
        );

        return self::query(self::$url, $departmentsData);
    }
}
