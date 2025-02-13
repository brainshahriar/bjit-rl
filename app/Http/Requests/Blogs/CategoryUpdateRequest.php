<?php

namespace App\Http\Requests\Blogs;

use App\Enums\CmnEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class CategoryUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('category-edit');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                //'unique:' . config('constants.table.categories') . ',title,'. $this->category->id,
                Rule::unique(config('constants.table.categories'))->whereNull('deleted_at')->ignore($this->category),
                'max:' . CmnEnum::DEFAULT_TITLE_CHAR_MAX
            ]
        ];
    }
}
