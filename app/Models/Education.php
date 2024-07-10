<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;

// use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

// /**
//  * @property-read MediaCollection|Media[] $media
//  */

class Education extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    const UNIVERSITY_CERTIFICATE = "univeristy_certificates";

    protected $fillable = [
        'user_id',
        'institude',
        'course',
        'attended_from',
        'attended_to',
        'degree_date',
        'specialization',
        'telephone',
        'fax',
        'certificate',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
