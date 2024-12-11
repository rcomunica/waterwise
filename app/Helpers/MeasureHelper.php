<?php

namespace App\Helpers;

use App\Models\Device;
use App\Models\Measure;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MeasureHelper
{
    public static function avarageConsumption($device)
    {
        $avgComsumption = Measure::where('device_id', $device)->avg('value');
        return number_format($avgComsumption, 2, '.', ',');
    }

    public static function avarageTimeConsum($device)
    {
        $avgCom = MeasureHelper::avarageConsumption($device);

        $avgTime = Measure::where('device_id', $device)
            ->where('value', '>', $avgCom)
            ->select(DB::raw('SEC_TO_TIME(AVG(TIME_TO_SEC(TIME(created_at)))) as average_time'))
            ->value('average_time');

        return Carbon::parse($avgTime)->format('g:i A');
    }

    public static function averageDayConsum($device)
    {
        $avgCom = MeasureHelper::avarageConsumption($device);

        $avgDay = Measure::where('device_id', $device)
            ->where('value', '>', $avgCom)
            ->select(DB::raw('DATE_FORMAT(AVG(DATE(created_at)), "%W") as average_day'))
            ->value('average_day');

        return $avgDay;
    }
}
