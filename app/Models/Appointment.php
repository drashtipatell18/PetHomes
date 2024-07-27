<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'appointments';
    protected $fillable = ['user_id','category_id','pet_id','service_id','date','status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }public function appointment()
    {
        $appointments = Appointment::with(['user', 'category', 'pet', 'service'])->get();
        return view('appointment.view_appointment', compact('appointments'));
    }
}
