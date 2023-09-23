<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ClinicSchedule extends Model
{
    use HasFactory;

    protected $table = 'clinic_schedules';

    const Mon = 1;

    const Tue = 2;

    const Wed = 3;

    const Thu = 4;

    const Fri = 5;

    const Sat = 6;

    const Sun = 0;

    const WEEKDAY = [
        self::Mon => 'MON',
        self::Tue => 'TUE',
        self::Wed => 'WED',
        self::Thu => 'THU',
        self::Fri => 'FRI',
        self::Sat => 'SAT',
        self::Sun => 'SUN',
    ];

    const WEEKDAY_FULL_NAME = [
        self::Mon => 'Monday',
        self::Tue => 'Tuesday',
        self::Wed => 'Wednesday',
        self::Thu => 'Thursday',
        self::Fri => 'Friday',
        self::Sat => 'Saturday',
        self::Sun => 'Sunday',
    ];

    public $fillable = [
        'day_of_week',
        'start_time',
        'end_time',
    ];
    
    protected $casts = [
        'day_of_week' => 'string',
        'start_time' => 'string',
        'end_time' => 'string',
    ];
}
