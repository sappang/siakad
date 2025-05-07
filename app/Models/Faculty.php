<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'logo', 'slug'];

    protected $hidden = ['created_at', 'updated_at'];

    protected function code(): Attribute
    {
        return Attribute::make(
            get: fn($value) => strtoupper($value),
            set: fn($value) => strtolower($value)
        );
    }

    public function departments(): HasMany
    {
        return $this->hasMany(Department::class);
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function scopeFilter(Builder $query, array $filters):void{
        $query->when($filters['search'] ?? null, function($query, $search){
            $query->whereAny([
                'name',
                'code'
            ], 'REGEXP', $search);
        });
    }

    public function scopeSorting(Builder $query, array $sorts):void{
        $query->when($sorts['field'] ?? null && $sorts['direction'] ?? null,function ($query) use ($sorts){
            $query->orderBy($sorts['field'], $sorts['direction']);
        });
    }

}
