<?php

namespace ExpertSender\Statics\Messages;

class Error
{
    public static $unexpectedError = 'Unexpected ExpertSender error.';

    public static $missingApiKey = 'API key field is missing.';

    public static $missingEventId = 'Event ID field is missing.';

    public static $missingSubscriberId = 'Subscriber ID field is missing.';

    public static $missingDataFields = 'Data fields array is missing.';

    public static $wrongDataFieldsType = 'Data fields is not array.';

    public static $wrongOneOfDataFieldObjects = 'One of data fields objects is not DataField class instance.';

    public static $missingEmail = 'E-mail field is missing.';

    public static $missingData = 'Data field is missing.';

    public static $missingEventDataField = 'Event data field is missing.';

    public static $wrongSubscriberDataFieldType = 'Data field is not instance of SubscriberData class.';

    public static $propertiesIsNotArray = 'Properties field is not array.';

    public static $wrongOneOfPropertiesFieldObjects = 'One of properties field objects is not Property class instance.';

    public static $missingMode = 'Mode field is missing.';

    public static $missingListId = 'List id field is missing.';

    public static $missingPropertyId = 'Missing property id field.';

    public static $propertyIdFieldIsNotInt = 'Property id field is not integer.';

    public static $missingPropertyValue = 'Missing property value field.';
}
