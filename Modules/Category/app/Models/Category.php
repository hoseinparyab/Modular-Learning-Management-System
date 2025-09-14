<?php

namespace Modules\Category\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Category\Database\factories\CategoryFactory;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'parent_id'
    ];

    protected $casts = [
        'parent_id' => 'integer'
    ];

    public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
      return $this->belongsTo(self::class, 'parent_id','id')
          ->withDefault(['title'=>'-------']);
    }

    public function child(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
      return $this->hasMany(self::class,'parent_id','id');
    }

    protected static function boot(): void
    {
        parent::boot();
        self::deleting(static function ($category) {
            foreach($category->child()->get() as $child){
                $child->update([
                    'parent_id' => 0
                ]);
            }
        });
    }

}
