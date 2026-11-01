<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relasi ke kategori milik user
    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    // Relasi ke transaksi milik user
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    // Relasi ke anggaran milik user
    public function budgets(): HasMany
    {
        return $this->hasMany(Budget::class);
    }

    // Relasi ke target tabungan milik user
    public function savingsGoals(): HasMany
    {
        return $this->hasMany(SavingsGoal::class);
    }
}
