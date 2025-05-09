<?php

namespace App\Models;

use App\Models\Faculty;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Department extends Model
{
    protected $fillable = ['faculty_id', 'name', 'code', 'slug'];

    protected function code(): Attribute
    {
        return Attribute::make(
            get: fn($value) => strtoupper($value),
            set: fn($value) => strtolower($value)
        );
    }

    public function faculty(): BelongsTo
    {
        return $this->belongsTo(Faculty::class);
    }
    
    public function scopeFilter(Builder $query, array $filters):void{
        $query->when($filters['search'] ?? null, function($query, $search){
            $query->whereAny([
                'name',
                'code'
            ], 'REGEXP', $search)
            ->orWhereHas('faculty',fn($query)=> $query->where('name','REGEXP',$search));
        });
    }

    public function scopeSorting(Builder $query, array $sorts):void{
        $query->when($sorts['field'] ?? null && $sorts['direction'] ?? null,function ($query) use ($sorts){
            match($sorts['field']){
                'faculty_id'=> $query->join('faculties','departments.faculty_id','=','faculties.id')
                ->orderBy('faculties.name', $sorts['direction']),
                default => $query->orderBy($sorts['field'], $sorts['direction'])
            };
        });
    }
}
