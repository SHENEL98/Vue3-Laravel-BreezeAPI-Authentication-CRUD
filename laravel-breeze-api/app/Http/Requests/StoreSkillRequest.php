<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSkillRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required','min:3','max:20'],
            'slug' => ['required', 'unique:skills,slug']
            /** 'slug' => ['required', 'unique:skills,slug'. this->skill->id]  when update, this colum won't update */
        ];
    }
}
