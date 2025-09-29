<?php

function short_detail($inputDataArray) {

    $convertedArray = array_map(function ($item) {
            unset($item['bed']);
            return $item;
        }, $inputDataArray['detail_data']);

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
        }
        else {
            $row['day_count'] = $lastDayCount - $day;
        }
        $row['end_at'] = $convertedArray[count($convertedArray) - 1]['end_at'];
        $output[] = $row;

        $short_data_array = $output;
        return $short_data_array;
}
