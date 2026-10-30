<?php

namespace App\Enums;

enum Department: string
{
    case ACTING = 'Acting';
    case DIRECTING = 'Directing';
    case WRITING = 'Writing';
    case PRODUCTION = 'Production';
    case CAMERA = 'Camera';
    case SOUND = 'Sound';
    case EDITING = 'Editing';
    case ART = 'Art';
    case VISUAL_EFFECTS = 'Visual Effects';
    case COSTUME = 'Costume & Make-Up';

    public function label(): string
    {
        return $this->value;
    }
}
