<?php

namespace ExpertSender\Packages;

use ExpertSender\Statics\Entities;

class XMLSerializer
{
    public static function generateValidXmlFromObject($object)
    {
        $nodesWithDataTypes = [];

        if(array_key_exists(class_basename($object), Entities::$nodesWithDataTypes)) {
            $nodesWithDataTypes = Entities::$nodesWithDataTypes[class_basename($object) ?: []];
        }

        return self::appendDataTypes(
            Entities::packXml(self::generateXmlFromArray(get_object_vars($object), $object->dontPackNodes())),
            $nodesWithDataTypes
        );
    }

    private static function generateXmlFromArray($array, array $dontPackNodes)
    {
        $xml = '';

        $nodeName = null;

        if (is_array($array) || is_object($array)) {

            if (is_object($array)) {
                $nodeName = class_basename($array);
            }

            if ($nodeName && !in_array($nodeName, $dontPackNodes)) {
                $xml .= '<' . ucfirst($nodeName) . '>';
            }

            foreach ($array as $key => $value) {

                if (!$value) {
                    continue;
                }

                if (!is_numeric($key)) {
                    $xml .= '<' . ucfirst($key) . '>';
                }

                $xml .= self::generateXmlFromArray($value, $dontPackNodes);

                if (!is_numeric($key)) {
                    $xml .= '</' . ucfirst($key) . '>';
                }

            }

            if ($nodeName && !in_array($nodeName, $dontPackNodes)) {
                $xml .= '</' . ucfirst($nodeName) . '>';
            }

        } else {

            $xml = htmlspecialchars($array, ENT_QUOTES);

        }

        return $xml;
    }

    private static function appendDataTypes(string $xml, array $nodesWithDataTypes): string
    {
        foreach ($nodesWithDataTypes as $dataType => $fields) {
            foreach ($fields as $field) {
                $xml = str_replace('<' . $field . '>', '<' . $field . ' xsi:type="xs:' . $dataType . '">', $xml);
            }
        }

        return $xml;
    }
}
