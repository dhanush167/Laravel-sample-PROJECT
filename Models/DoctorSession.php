<?php

namespace App\Models;

use Database\Factories\DoctorSessionFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;


class DoctorSession extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'doctor_sessions';

    /**
     * @var string[]
     */
    protected $fillable = [
        'doctor_id',
        'session_meeting_time',
        'session_gap',
    ];

    protected $casts = [
        'doctor_id' => 'integer',
        'session_meeting_time' => 'integer',
        'session_gap' => 'string',
    ];
    
    const MALE = 1;

    const FEMALE = 2;

    const GENDER = [
        self::MALE => 'Male',
        self::FEMALE => 'Female',
    ];

    const GAPS = [
        '5' => '5 minutes',
        '10' => '10 minutes',
        '15' => '15 minutes',
        '20' => '20 minutes',
        '25' => '25 minutes',
        '30' => '30 minutes',
        '45' => '45 minutes',
        '60' => '1 hour',
    ];

    const SESSION_MEETING_TIME = [
        '5' => '5 minutes',
        '10' => '10 minutes',
        '15' => '15 minutes',
        '30' => '30 minutes',
        '45' => '45 minutes',
        '60' => '1 hour',
        '90' => '1.5 hour',
        '120' => '2 hour',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'doctor_id' => 'required',
        'session_meeting_time' => 'required',
        'session_gap' => 'required',
    ];

    /**
     * @return HasMany
     */
    public function sessionWeekDays()
    {
        return $this->hasMany(WeekDay::class);
    }

    /**
     * @return BelongsTo
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
