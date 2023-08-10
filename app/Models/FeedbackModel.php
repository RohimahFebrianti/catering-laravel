<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackModel extends Model
{
    use HasFactory;
    protected $table = 'feedback';
    protected $guarded = ['*'];
    public function User(){
        return $this->belongsTo(User::class);
    }
}
