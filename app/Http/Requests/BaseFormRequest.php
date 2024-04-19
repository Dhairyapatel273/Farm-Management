<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseFormRequest extends FormRequest
{
    /**
     * Indicates if the validator should stop on the first rule failure.
     *
     * @var bool
     */
    protected $stopOnFirstFailure = false;

    /**
     * Default status for format
     *
     * @var string
     */
    private $status = '201';

    /**
     * Default success type for format
     *
     * @var bool
     */
    private $success = false;

    /**
     * Default data for format
     *
     * @var string
     */
    private $data = null;

    /**
     * Custom format to send validation message
     */
    protected function failedValidationFormat($validator): array
    {
        return [
            'success' => $this->success,
            'status'  => $this->status,
            'message' => $validator->errors()->first(),
            'data'    => $this->data
        ];
    }

    /**
     * Overriding failed validation method.
     */
    protected function failedValidation(Validator $validator)
    {
        $response = $this->failedValidationFormat($validator);

        throw new HttpResponseException(response()->json($response, 200));
    }
}