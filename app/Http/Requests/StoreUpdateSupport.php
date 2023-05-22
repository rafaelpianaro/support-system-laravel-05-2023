<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateSupport extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules =  [
            'subject' => 'required|min:3|max:200|unique:supports',
            'body' => [
                'required',
                'min:3',
                'max:10000'
            ],
        ];
        
        if ($this->method() === 'PUT' || $this->method() === 'PATH') {
            $rules['subject'] = [
                'required',
                'min:3',
                'max:200',
                // "unique:supports, subject, {$this->id},id"
                //$this->support ?? $this->id  = it was necessary validated because support come from resource and id come from different resource routes
                Rule::unique('supports')->ignore($this->support ?? $this->id) 
            ];
        }

        return $rules;
    }
}
