<?php

namespace Riddman\NovaPoshtaApi

define('NOVA_POSHTA_APIKEY', '785bf3c3e8c8e453fee24fb02fbab3cb');

class NovaPoshta
{
    protected static $url = 'https://api.novaposhta.ua/v2.0/json/';

    protected static $citiesData = array(
        'modelName'        => 'Address',
        'calledMethod'     => 'getCities',
        //'methodProperties' => array(),
        'apiKey'           => NOVA_POSHTA_APIKEY
    );

    protected static $departmentsData = array(
        'modelName'        => 'AddressGeneral',
        'calledMethod'     => 'getWarehouses',
        //'methodProperties' => array(),
        'apiKey'           => NOVA_POSHTA_APIKEY
    );

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

    public static function getCities()
    {
        return self::query(self::$url, self::$citiesData);
    }

    public static function getDepartments()
    {
        return self::query(self::$url, self::$departmentsData);
    }
}
