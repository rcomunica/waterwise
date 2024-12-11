<?php

namespace App\Enums;


enum DeviceStatus: int
{
    case Active = 1;
    case Disable = 2;
    case Deleted = 3;
}
