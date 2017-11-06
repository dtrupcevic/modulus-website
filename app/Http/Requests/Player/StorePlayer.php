<?php

namespace App\Http\Requests\Player;

use Illuminate\Foundation\Http\FormRequest;

class StorePlayer extends FormRequest
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
            'nickname'          => 'required',
            'class_id'          => 'required|exists:classes,id',
            'specialization_id' => 'required|exists:specializations,id',
            'rank_id'           => 'required|exists:ranks,id'
        ];
    }
}
