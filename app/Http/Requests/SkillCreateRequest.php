<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class SkillCreateRequest extends FormRequest
{
    /**
     * Determine if the activity is authorized to make this request.
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
        $domain = $this->domain;
        $subdomain = $this->subdomain;
        $technology = $this->technology;
        $skill = $this->skill;
        $certification = $this->certification;

        return [
      'domain' => 'unique:skills,domain,NULL,id,subdomain,'.$subdomain.',technology,'.$technology.',skill,'.$skill.',certification,'.$certification,
      'subdomain' => 'required',
      'technology' => 'required',
      'skill' => 'required',
    ];
    }

    public function messages()
    {
        return [
      'domain.unique' => 'This record needs to have a unique domain, subdomain, technology and skill.',
    ];
    }
}
