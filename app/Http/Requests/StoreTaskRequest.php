<?php

namespace App\Http\Requests;

use App\Models\Task;
use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
            'task_name' => ['required', 'string'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'priority' => ['required','integer', 'between:' . Task::MIN_PRIORITY . ',' . Task::MAX_PRIORITY]
        ];
    }
}
