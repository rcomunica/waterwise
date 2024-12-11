<?php

namespace App\Enums;


enum MeasureStatus: int
{
    case Active = 1;
    case Disable = 2;
    case Deleted = 3;
}
