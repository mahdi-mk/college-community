<?php

namespace App\Http\Requests\Question;

use App\Models\Question;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreQuestion extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('create', Question::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:200'],
            'tags' => ['required', 'array'],
            'content' => ['required', 'string', 'max:5000'],
        ];
    }
}
