<?php

namespace App\Traits;

use Carbon\Carbon;

class DateTimeConversations
{
    public function dataRangeConvert($dateRange) {
        $from = null;
        $to = null;
        if (strpos($dateRange, " to ") !== false) {
            $dateParts = explode(" to ", $dateRange);
            $from = $this->customToStandard($dateParts[0]);
            if (count($dateParts) === 2) {
                $to = $this->customToStandard($dateParts[1]);
            }
        } else {
            $from = $this->customToStandard($dateRange);
        }

        if ($from && $to)
            return array('from' => $from, 'to' => $to);
        else if ($from)
            return array('from' => $from);
        else
            return array();
    }

    public function customToStandard($date) {
        $dateFormated = Carbon::createFromFormat(config('constants.dateTimeFormat'), $date)->format('Y-m-d H:i');

        return $dateFormated;
    }

    public function customCommaToStandard($date) {
        $dateFormated = Carbon::createFromFormat(config('constants.dateFormatComma'), $date)->format('Y-m-d');

        return $dateFormated;
    }

    public function standardToCustom($date) {
        $dateFormated = Carbon::createFromFormat('Y-m-d H:i', $date)->format(config('constants.dateTimeFormat'));

        return $dateFormated;
    }

    public function standardToCustomComma($date) {
        $dateFormated = $date ? Carbon::createFromFormat('Y-m-d', $date)->format(config('constants.dateFormatComma')) : null;

        return $dateFormated;
    }

    public static function standardToCustomCommaStatic($date, $time = null) {
        $formatTo = $time ? config('constants.dateTimeFormatComma') : config('constants.dateFormatComma');
        $formatFrom = $time ? 'Y-m-d H:i:s' : 'Y-m-d';

        $dateFormated = $date ? Carbon::createFromFormat($formatFrom, $date)->format($formatTo) : null;

        return $dateFormated;
    }

    public function standardDateTimeToCustom($date) {
        $date = substr($date, 0,10);
        $dateFormated = Carbon::createFromFormat('Y-m-d', $date)->format(config('constants.dateFormat'));

        return $dateFormated;
    }
}
