<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'province_id',
        'regency_id',
        'district_id',
        'village_id',
    ];

    public function provincies()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function regencies()
    {
        return $this->belongsTo(Regency::class, 'regency_id');
    }

    public function districts()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function villages()
    {
        return $this->belongsTo(Village::class, 'village_id');
    }
}
