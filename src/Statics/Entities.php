<?php

namespace ExpertSender\Statics;

class Entities
{
    public static $openingEntity = '<ApiRequest xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xs="http://www.w3.org/2001/XMLSchema">';

    public static $closingEntity = '</ApiRequest>';

    public static $nodesWithDataTypes = [
        'AddAndUpdateSubscriberRequest' => ['string' => ['Value']]
    ];

    public static function packXml(string $xml): string
    {
        return implode('', [
            self::$openingEntity,
            $xml,
            self::$closingEntity
        ]);
    }
}
