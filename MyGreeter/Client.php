<?php

namespace MyGreeter;

class Client
{
    public $currentHour;

    /**
     * Get greeting message message according to the current hour
     * @return string
     */
    public function getGreeting()
    {
        date_default_timezone_set("Asia/Shanghai");
        $hour = isset($this->currentHour) ? $this->currentHour : date('H', time());
        switch ($hour >= 0) {
            case $hour < 12:
                $greeterMsg = 'Good morning';
                break;
            case $hour < 18:
                $greeterMsg = 'Good afternoon';
                break;
            case $hour < 24:
                $greeterMsg = 'Good evening';
                break;
            default:
                $greeterMsg = 'Invalid Hour';
        }
        unset($hour);
        return $greeterMsg;
    }
}