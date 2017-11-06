<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
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
            'nickname'                  => 'required',
            'battletag'                 => 'required',
            'class_id'                  => 'required|exists:classes,id',
            'specialization_id'         => 'required|exists:specializations,id',
            'armory_url'                => 'required',
            'warcraftlogs_url'          => 'required',
            'about'                     => 'required',
            'experience'                => 'required',
            'previous_guild'            => 'required',
            'expectations_from_guild'   => 'required'
        ];
    }
}
