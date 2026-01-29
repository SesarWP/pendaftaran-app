<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Opd extends Model
{
    protected $fillable = [
        'nama', 'kode', 'aktif', 'kontak', 'alamat', 'keterangan',
    ];

    protected $casts = [
        'aktif' => 'boolean',
        // 'kuota' => 'integer',
    ];

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    public function users()
    {
        return $this->hasMany(\App\Models\User::class);
    }

}
