<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class TopicRequest extends FormRequest
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
            'title' => 'required|min:3|max:70',
            'body' => 'required|min:3',
            'tags.primary' => 'required|exists:tags,name',
            'tags.secondary' => 'required|exists:tags,name',
            'tags.optional' => 'required|exists:tags,name',
        ];
    }

    public function validated()
    {
        return Arr::add(parent::validated(), 'creator_id', auth()->id());
    }
}
