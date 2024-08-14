<?php

namespace NW\WebService\References\Operations\Notification;

class ResellerEmailSettings
{
    public static function getResellerEmailFrom()
    {
        return 'contractor@example.com';
    }

    public static function getEmailsByPermit($resellerId, $event)
    {
        // fakes the method
        return ['someemeil@example.com', 'someemeil2@example.com'];
    }
}