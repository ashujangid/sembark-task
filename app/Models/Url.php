<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\User;

class Url extends Model
{
    use HasFactory;

    protected $table = 'generated_urls';

    protected $fillable = [
        'user_id',
        'company_id',
        'original_url',
        'short_url'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
