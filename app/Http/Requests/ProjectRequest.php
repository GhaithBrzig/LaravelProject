<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'client_id' => 'required|integer',
            'description' => 'required|string|min:15',
            'start_date' => 'required|date|after_or_equal:today', // Start date should be today or later
            'end_date' => 'required|date|after:start_date', // End date must be after the start date
            'budget' => 'required|numeric',
            'currentProgress' => 'required|numeric|between:1,10',
        ];
    }


    /**
     * Get custom error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'name.required' => 'The project name is required.',
            'client_id.required' => 'Please select an owner for the project.',
            'description.required' => 'A project description is required and should be at least 15 characters.',
            'start_date.required' => 'Please select a start date.',
            'start_date.after_or_equal' => 'The start date should be today or later.',
            'end_date.required' => 'Please select an end date.',
            'end_date.after' => 'The end date must be after the start date.',
            'budget.required' => 'Please specify the project budget.',
            'currentProgress.required' => 'Please specify the current progress of the project.',
            'currentProgress.between' => 'The current progress should be between 1 and 10.',
        ];
    }
}
