<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;
use App\Berat;

class BeratRequest extends FormRequest
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
        $rule = [
            'tanggal' => 'required|unique:berat,tanggal',
            'max' => 'required',
            'min' => 'required',
        ];

        if($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rule['tanggal'] = 'required|unique:berat,tanggal,' . $this->berat->id;
        }

        return $rule;
    }

    protected function getValidatorInstance()
    {
        $max = intval($this->input('max'));
        $min = intval($this->input('min'));

        $this->merge(['max' => $max, 'min' => $min]);

        return parent::getValidatorInstance();
    }

    public function withValidator($validator)
    {
        
        $validator->after(function($validator) {
            if($this->max < $this->min) {
                $validator->errors()
                ->add('max', 'Nilai tidak sesuai')
                ->add('min', 'Nilai tidak sesuai');
            }

            try {
                Carbon::createFromFormat('Y-m-d', $this->tanggal);
            } catch(\Exception $e) {
                $validator->errors()
                ->add('tanggal', 'Tanggal tidak sesuai');
            }
        });
    }

    public function save()
    {
        if(is_null($this->berat)) {
            $this->berat = new Berat();
        }

        $this->berat->tanggal = $this->tanggal;
        $this->berat->max = $this->max;
        $this->berat->min = $this->min;
        $this->berat->save();
    }
}
