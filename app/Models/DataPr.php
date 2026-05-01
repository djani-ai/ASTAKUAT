<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPr extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function data_pac()
    {
        return $this->belongsTo(DataPac::class, 'pac_id');
    }
}
