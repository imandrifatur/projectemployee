<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_nip',
        'leave_date',
        'duration',
        'description',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_nip', 'nip');
    }




}
