<?php

namespace App\Http\Requests\Products;

use App\Enums\CmnEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class ProductCategoryUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('product-category-edit');
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
                Rule::unique(config('constants.table.product_categories'))->whereNull('deleted_at')->ignore($this->product_category),
                'max:' . CmnEnum::DEFAULT_TITLE_CHAR_MAX
            ], 
            'filename' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif,svg|max:4096',
            ]
        ];
    }
}
