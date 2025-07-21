<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
     use HasFactory;

    protected $fillable = [
        'title',
        'deskripsi',
        'thumbnail',
        'price',
        'created_by',
        'video_url',
        'category',
        'level',
    ];

     public function testimonies()
    {
        return $this->hasMany(Testimony::class)->where('status', 'approved');
    }

    public function courseContents() {
        return $this->hasMany(CourseContent::class);
        }

    public function purchases() {
        return $this->hasMany(Purchase::class);
    }
}
