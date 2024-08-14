<?php

namespace NW\WebService\References\Operations\Notification\Models;

class Contractor
{
    const TYPE_CUSTOMER = 0;
    public $id;
    public $type;
    public $name;

    /**
     * @throws \Exception
     */
    public static function getById(int $resellerId): self
    {
        $result = new self($resellerId); // fakes the getById method
        if (empty($result)) {
            throw new \Exception('Contractor not found', 400);
        }
        return $result;
    }

    public function getFullName(): string
    {
        return $this->name . ' ' . $this->id;
    }
}