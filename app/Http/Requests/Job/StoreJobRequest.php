<?php

namespace App\Http\Requests\Job;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'birthday' => 'nullable|date',
            'university_name' => 'nullable|string|max:255',
            'major' => 'nullable|string|max:255',
            'graduating_year' => 'nullable|integer|min:1900|max:'.date('Y'),
            'cv' =>  'file|required',
            'email' => 'required|string|email',
            'phone_number' => '',
            'gender' => '',
                    ];
    }
}
