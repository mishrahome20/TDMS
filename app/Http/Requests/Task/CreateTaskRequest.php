<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'         => 'required|max:255',
            'description'   => 'required',
            'deadline'      => 'required|date|after_or_equal:today',
            'priority'      => 'required|in:0,1,2',
            'project_id'    => 'required|exists:projects,id',
            'tasktype'      => 'required',
            'assigne'       => 'required',
            'reviwer'       => 'required',
        ];
    }
}
