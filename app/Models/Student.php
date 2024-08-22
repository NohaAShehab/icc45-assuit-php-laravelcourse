<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;


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


//    protected function human_readable_date(): Attribute
//    {
//        return Attribute::make(
////           get: Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('H:i:s')
////          get:  fn () => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('H:i:s')
//            get: fn (string $value) => ucfirst($value)
//        );
//    }
}
