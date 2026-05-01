<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAnggota extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'p_kaderisasi' => 'array',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function pr()
    {
        return $this->belongsTo(DataPr::class, 'pr_id');
    }
}
