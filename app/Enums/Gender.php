<?php

namespace App\Enums;

enum Gender: string
{
    case FEMALE = 'Female';
    case MALE = 'Male';
    case NON_BINARY = 'Non-Binary';
    case NOT_SPECIFIED = 'Not Specified';

    public function label(): string
    {
        return $this->value;
    }
}
