<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', "image", "gender", "grade", "email", "track_id"];

    //select * from track t , students s where t.id=s.track_id;
    function track(){
        return $this->belongsTo(Track::class);

        # track property contains track object
    }
    # select * from track t , students s where t.id=s.track_id;
}
