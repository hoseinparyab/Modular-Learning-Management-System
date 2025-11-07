<?php

namespace Modules\Course\Models;

use Modules\Course\Models\Course;
use Modules\User\app\Models\User;
// use Modules\Course\Database\Factories\SeasonFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Season extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        "user_id",
        "course_id",
        "title",
        "priority"
    ];
    public function user() 
    {  
            return $this->belongsTo(User::class);
     
    }
    // protected static function newFactory(): SeasonFactory
    // {
    //     // return SeasonFactory::new();
    // }
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
