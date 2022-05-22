<?php

namespace App\Models;
use App\Models\code;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Labor extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function code(){
        return $this->BelongsTo('App\Models\code'::class,"Bus_id");
    }
}
