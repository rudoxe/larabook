<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class RoomType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function setImgAttribute($value)
    {
        // Store the image in the storage disk and save the path in the database
        $this->attributes['img'] = Storage::putFile('/public/room', $value);
    }

    // Accessor to get the image URL
    public function getImgAttribute($value)
    {
        // If the image exists, return its URL using the asset helper
        // Otherwise, return a default image URL or null
        return $value ? asset(Storage::url($value)) : null;
    }

    public function Room()
    {
        return $this->hasMany(Room::class, 'room_type_id');
    }

    public function RoomFacility()
    {
        return $this->hasMany(RoomFacility::class, 'room_type_id');
    }

    public function Orders()
    {
        return $this->hasMany(Orders::class, 'room_type_id');
    }
}
