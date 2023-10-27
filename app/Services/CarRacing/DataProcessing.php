<?php

namespace App\Services\CarRacing;

use Illuminate\Support\Facades\File;

class DataProcessing
{
    protected ?array $cars;
    protected ?array $attempts;

    public function __construct ()
    {
        $this->cars = File::json(base_path('/data/data_cars.json'))['data'];
        $this->attempts = File::json(base_path('/data/data_attempts.json'))['data'];
    }

    public function getReadyData ()
    {
        $this->calculateTotalResult();
        $this->sortByTotal();
        return $this->cars;
    }

    public function sortByTotal ()
    {
        uasort($this->cars, function ($a, $b) {
            if ($a['total'] == $b['total']) {
                if ($a['attempts'][3] == $b['attempts'][3]) {
                    if ($a['attempts'][2] == $b['attempts'][2]) {
                        if ($a['attempts'][1] == $b['attempts'][1]) {
                            if ($a['attempts'][0] == $b['attempts'][0]) {
                                strnatcmp($a['name'], $b['name']);
                            }
                            return ($a['attempts'][0] > $b['attempts'][0]) ? -1 : 1;
                        }
                        return ($a['attempts'][1] > $b['attempts'][1]) ? -1 : 1;
                    }
                    return ($a['attempts'][2] > $b['attempts'][2]) ? -1 : 1;
                }
                return ($a['attempts'][3] > $b['attempts'][3]) ? -1 : 1;
            }
            return ($a['total'] > $b['total']) ? -1 : 1;
        });
    }
    
    public function calculateTotalResult ()
    {
        $this->mergeArrays();
        foreach ($this->cars as $num => &$draverInfo) {
            $draverInfo['total'] = array_sum($draverInfo['attempts']);
        }
    }

    public function mergeArrays ()
    {
        foreach ($this->attempts as $index => $result) {
            
            foreach ($this->cars as $num => &$driverInfo) {
                if ($driverInfo['id'] == $result['id']) {
                    $driverInfo['attempts'][] = $result['result'];
                    break;
                }
            }

        }
    }

}
