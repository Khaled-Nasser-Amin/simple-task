<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable=['name','ex_date','user_id'];
    public $timestamps=true;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
