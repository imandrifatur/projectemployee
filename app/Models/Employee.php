<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'nip',
        'employee_name',
        'gender',
        'phone_number',
        'address',
        'date_of_birth',
    ];

    // Relasi dengan tabel leaves
    public function leaves()
    {
        return $this->hasMany(Leave::class, 'employee_nip', 'nip');
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('nip', 'like', '%' . $search . '%')
                     ->orWhere('employee_name', 'like', '%' . $search . '%');
    }
}
