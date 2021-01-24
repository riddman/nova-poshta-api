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
        return (empty($result)) ? false : $result;
    }

    public function getStreet($novaPoshtaApiKey, $streetName, $cityRef)
    {
        $streetData = array(
            'modelName'        => 'Address',
            'calledMethod'     => 'getStreet',
            'methodProperties' => array(
                'FindByString' => $streetName,
                'CityRef'      => $cityRef,
            ),
            'apiKey'           => $novaPoshtaApiKey
        );

        return self::query(self::$url, $departmentsData);
    }

    public static function getCities($novaPoshtaApiKey)
    {
        // https://devcenter.novaposhta.ua/docs/services/556d7ccaa0fe4f08e8f7ce43/operations/556d885da0fe4f08e8f7ce46
        $citiesData = array(
            'modelName'        => 'Address',
            'calledMethod'     => 'getCities',
            //'methodProperties' => array(),
            'apiKey'           => $novaPoshtaApiKey
        );

        return self::query(self::$url, $citiesData);
    }

    public static function getDepartments($novaPoshtaApiKey, $limit = null, $page = null)
    {
        // https://devcenter.novaposhta.ua/docs/services/556d7ccaa0fe4f08e8f7ce43/operations/556d8211a0fe4f08e8f7ce45
        $departmentsData = array(
            'modelName'        => 'AddressGeneral',
            'calledMethod'     => 'getWarehouses',
            //'methodProperties' => array(),
            'apiKey'           => $novaPoshtaApiKey
        );

        if ($limit && $page) {
            $departmentsData['methodProperties'] = [
                'Page' => $page,
                'Limit' => $limit
            ];
        }

        return self::query(self::$url, $departmentsData);
    }
}
