<?php

namespace App\Http\Controllers;

class TestController extends Controller
{
    public function test()
    {
         $jsonData = '[{"bed":{"id":1,"room_id":4,"room_type":1,"building_id":1,"floor_id":1,"is_ac":0,"name":"W1","short_name":"w1","bed_fee":"500.00","special_bed_fee":"300.00","is_used":1,"status":1,"created_by":null,"updated_by":null,"created_at":"2025-09-28T04:10:47.000000Z","updated_at":"2025-09-28T05:14:50.000000Z"},"bed_id":1,"bed_fee":"500.00","start_at":"2025-09-28 10:14:00","end_at":"2025-09-28 14:00:00","day":1,"minutes":226},{"bed":{"id":1,"room_id":4,"room_type":1,"building_id":1,"floor_id":1,"is_ac":0,"name":"W1","short_name":"w1","bed_fee":"500.00","special_bed_fee":"300.00","is_used":1,"status":1,"created_by":null,"updated_by":null,"created_at":"2025-09-28T04:10:47.000000Z","updated_at":"2025-09-28T05:14:50.000000Z"},"bed_id":1,"bed_fee":"500.00","start_at":"2025-09-28 14:00:00","end_at":"2025-09-29 14:00:00","day":2,"minutes":1440},{"bed":{"id":1,"room_id":4,"room_type":1,"building_id":1,"floor_id":1,"is_ac":0,"name":"W1","short_name":"w1","bed_fee":"500.00","special_bed_fee":"300.00","is_used":1,"status":1,"created_by":null,"updated_by":null,"created_at":"2025-09-28T04:10:47.000000Z","updated_at":"2025-09-28T05:14:50.000000Z"},"bed_id":1,"bed_fee":"500.00","start_at":"2025-09-29 14:00:00","end_at":"2025-09-29 15:23:00","day":0,"minutes":83}]';

        $inputDataArray = json_decode($jsonData, true);

        $convertedArray = array_map(function ($item) {
            unset($item['bed']);

            return $item;
        }, $inputDataArray);

        // dd($convertedArray);

        // Process the converted array to get the desired output
        $output = [];
        $row = [];
        $row['id'] = $convertedArray[0]['bed_id'];
        $row['start_at'] = $convertedArray[0]['start_at'];
        $day = 0;
        $lastDayCount = 0;

        for ($i = 1; $i < count($convertedArray); $i++) {
            if ($convertedArray[$i]['bed_id'] != $convertedArray[$i - 1]['bed_id']) {

                $row['id'] = $convertedArray[$i - 1]['bed_id'];
                $row['day_count'] = $convertedArray[$i - 1]['day'] - $day;
                $row['end_at'] = $convertedArray[$i - 1]['end_at'];
                $output[] = $row;

                // initialize for next bed
                $row = [];
                $row['start_at'] = $convertedArray[$i]['start_at'];
                $day = $convertedArray[$i - 1]['day'];
            }
            if ($convertedArray[$i]['day'] != 0) {
                $lastDayCount = $convertedArray[$i]['day'];
            }
        }

        $row['id'] = $convertedArray[count($convertedArray) - 1]['bed_id'];
        if ($lastDayCount < $day) {
            $row['day_count'] = 0;
        } else {
            $row['day_count'] = $lastDayCount - $day;
        }
        // add this for minimum 1 day count
        if ($row['day_count'] <= 0) {
            $row['day_count'] = 1;
        }
        $row['end_at'] = $convertedArray[count($convertedArray) - 1]['end_at'];
        $output[] = $row;

        // retun in json beutify
        return json_encode($output, JSON_PRETTY_PRINT);
        // $short_data_array = $output;
        // return $short_data_array;
    }
}
