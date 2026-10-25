<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'user_id', 'location_id', 'facility_category_id', 'assigned_to',
        'deskripsi', 'urgensi', 'status', 'catatan_admin',
    ];

    public function pelapor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function teknisi()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function facilityCategory()
    {
        return $this->belongsTo(FacilityCategory::class);
    }

    public function attachments()
    {
        return $this->hasMany(ReportAttachment::class);
    }

    public function comments()
    {
        return $this->hasMany(ReportComment::class);
    }
}
