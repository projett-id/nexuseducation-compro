<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id','title', 'slug', 'description', 'location',
        'start_date', 'end_date', 'thumbnail',
        'status', 'organizer_id'
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'events_tag', 'event_id', 'tag_id');
    }


    public function organizer()
    {
        return $this->belongsTo(User::class, 'organizer_id');
    }

    public function getFormattedScheduleAttribute()
    {
        $start = Carbon::parse($this->start_date);
        $end   = Carbon::parse($this->end_date);

        $startTime = $start->format('H:i') !== '00:00' ? ' | ' . $start->format('H:i') : '';
        $endTime   = $end->format('H:i') !== '00:00' ? ' | ' . $end->format('H:i') : '';

        if ($start->isSameDay($end)) {
            if ($startTime && $endTime) {
                return $start->format('F d, Y') . $startTime . ' - ' . $end->format('H:i');
            }
            return $start->format('F d, Y'); // no time
        }

        return $start->format('F d, Y') . $startTime .
            ' - ' .
            $end->format('F d, Y') . $endTime;
    }
}
