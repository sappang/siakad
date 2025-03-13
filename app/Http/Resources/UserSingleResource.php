<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class UserSingleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'avatar' => $this->avatar ? Storage::url($this->avatar) : null,
            'roles' => $this->getRoleNames(),
            'role_name'=> $this->getRoleNames()->first(),
            'student' => $this->when($this->hasRole('Student'),[
                'id' => $this->student?->id,
                'student_number'=> $this->student?->student_number,
                'batch'=> $this->student?->batch,
                'semester' => $this->student?->semester,
                'faculty' => [
                    'id' => $this->student?->faculty?->id,
                    'name' => $this->student?->faculty?->name,
                ],
                'department' => [
                    'id' => $this->student?->department?->id,
                    'name' => $this->student?->department?->name,
                ],
                'classroom' => [
                    'id' => $this->student?->classroom?->id,
                    'name' => $this->student?->classroom?->name,
                ],
                'fee_group' => [
                    'id' => $this->student?->feeGroup?->id,
                    'name' => $this->student?->feeGroup?->name,
                ],
                ]),
            'teacher' => $this->when($this->hasRole('Teacher'),[
                'id' => $this->teacher?->id,
                'teacher_number'=> $this->teacher?->teacher_number,
                'academic_title'=> $this->teacher?->academic_title,
                'faculty_id' => $this->teacher?->faculty_id,   
                'department_id' => $this->teacher?->department_id,
                ]),
            'operator' => $this->when($this->hasRole('Operator'),[
                'id' => $this->operator?->id,
                'employee_number'=> $this->operator?->employee_number,
                'faculty_id' => $this->operator?->faculty_id,   
                'department_id' => $this->operator?->department_id,
                ]),
        ];
    }
}
