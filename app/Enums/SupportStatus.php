<?php

namespace App\Enums;

enum SupportStatus: string
{
    case Active = "Active";
    case Pending = "Pending";
    case Complete = "Complete";

    public static function fromValue(string $name): string
    {
        // dd($name);
        foreach (self::cases() as $status) {
            if ($name === $status->name) {
                return $status->value;
            }
        }

        throw new \ValueError("$status is not a valid");
    }
}