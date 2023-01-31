<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleMeetingController extends Controller
{
    public function findAppointment($schedules, $duration) {
        $start = strtotime('9:00');
        $end = strtotime('19:00');
        $duration = $duration * 60;
        $personCount = count($schedules);
    
        for ($time = $start; $time <= $end - $duration; $time = $time + 60) {
            $available = 0;
    
            for ($i = 0; $i < $personCount; $i++) {
                $free = true;
    
                foreach ($schedules[$i] as $schedule) {
                    $scheduleStart = strtotime($schedule[0]);
                    $scheduleEnd = strtotime($schedule[1]);
    
                    if ($time >= $scheduleStart && $time + $duration <= $scheduleEnd) {
                        $free = false;
                        break;
                    }
                }
    
                if ($free) {
                    $available++;
                }
            }
    
            if ($available == $personCount) {
                return date('H:i', $time);
            }
        }
    
        return null;
    }
    
    public function getAvailableSlot()
    {
        $schedules = [
            [['09:00', '11:30'], ['13:30', '16:00'], ['16:00', '17:30'], ['17:45', '19:00']],
            [['09:15', '12:00'], ['14:00', '16:30'], ['17:00', '17:30']],
            [['11:30', '12:15'], ['15:00', '16:30'], ['17:45', '19:00']]
        ];
        
        $duration = 60;
        
        $result = $this->findAppointment($schedules, $duration);
        
        if ($result == null) {
            return 'No available appointment time';
        } else {
            return 'Earliest available appointment time: ' . $result;
        }
    }
    
}
