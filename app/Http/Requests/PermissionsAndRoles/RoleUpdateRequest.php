<?php

namespace App\Http\Requests\PermissionsAndRoles;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class RoleUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('role-edit');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [ 
            'displayTitle' => [
                'nullable', 
                'string',
                Rule::unique(config('constants.table.roles'), 'display_title')->ignore($this->role)->whereNull('deleted_at') 
            ],
            'permissions' => [
                'nullable',
                'array',
                'exists:'. config('constants.table.permissions') . ',id'
            ] 
        ];
    }
}
