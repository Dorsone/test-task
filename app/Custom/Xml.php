<?php

namespace App\Custom;

/**
 * Class for Xml handling
 */
class Xml
{
    /**
     * Method that converts xml string to array
     *
     * @param string $xml
     * @param bool $associative
     * @return array
     */
    public static function toArray(string $xml, bool $associative = true): array
    {
        $xmlObject = simplexml_load_string($xml);
        $json = json_encode($xmlObject);
        return json_decode($json, $associative);
    }
}
