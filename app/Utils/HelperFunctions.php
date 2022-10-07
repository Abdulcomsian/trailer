<?php

namespace App\Utils;

use Illuminate\Support\Facades\File;
use App\Models\TrailerTimming;

class HelperFunctions
{
    public static function saveFile($oldFile = null, $newFile, $filePath)
    {
        try {
            $public_path = public_path($filePath);
            File::isDirectory($public_path) or File::makeDirectory($public_path, 0777, true, true);
            if ($oldFile) {
                @unlink($oldFile);
            }
            $filename = time() . rand(10000, 99999) . '.' . $newFile->getClientOriginalExtension();
            $newFile->move($public_path, $filename);
            return $filePath . $filename;
        } catch (\Exception $exception) {
            return null;
        }
    }


    //get HIRED PERIOD TIMES
    public static function getHirePeriodTimes($start_time, $end_time)
    {
        $start_date = date('Y-m-d h:i A ', strtotime($start_time));
        $start_date = \Carbon\Carbon::parse($start_date);
        $end_date = date('Y-m-d h:i A ', strtotime($end_time));
        $end_date = \Carbon\Carbon::parse($end_date);
        $hire_period = $start_date->diffInDays($end_date, false);
        $hire_hours = $start_date->diffInHours($end_date, false);
        $hire_mins = $start_date->diffInMinutes($end_date, false);
        return array('hire_period' => $hire_period, 'hire_hours' => $hire_hours, 'hire_mins' => $hire_mins);
    }

    //get payment by time
    public static function getPaymentByHours($hours)
    {
        $where = '';
        if ($hours > 0 && $hours <= 6) {
            $where = '3 - 6 hrs';
        } elseif ($hours >= 6 && $hours <= 12) {
            $where = '6 - 12 hrs';
        } elseif ($hours > 12 && $hours <= 24) {
            $where = '24 hrs (1 Day)';
        } elseif ($hours > 24 && $hours <= 48) {
            $where = '24 - 48 hrs (2 Days)';
        } elseif ($hours > 48 && $hours <= 72) {
            $where = '48 - 72 hrs (3 Days)';
        } elseif ($hours > 72 && $hours <= 96) {
            $where = '72 - 96 hrs (4 Days) ';
        } elseif ($hours > 96 && $hours <= 120) {
            $where = '96 - 120 hrs (5 Days)';
        }


        if ($hours > 120) {
            $extrahours = $hours - 120;
            $onetwentyhourrate = TrailerTimming::where(['time' => '96 - 120 hrs (5 Days)'])->first();
            //let suppose extra hours rate is $10 then 
            $extrahoursrate = $extrahours * 10;
            $payment = $extrahoursrate + $onetwentyhourrate->price;
        } else {
            $payment = TrailerTimming::where(['time' => $where])->first();
            if ($payment) {
                $payment = $payment->price;
            } else {
                $payment = 0;
            }
        }
        return $payment;
    }
}
