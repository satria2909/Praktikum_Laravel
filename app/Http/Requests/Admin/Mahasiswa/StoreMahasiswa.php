<?php

namespace App\Http\Requests\Admin\Mahasiswa;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreMahasiswa extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.mahasiswa.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nim' => ['required', 'string'],
            'nama' => ['required', 'string'],
            'gambar' => ['required', 'string'],
            'umur' => ['required', 'integer'],
            'alamat' => ['required', 'string'],
            'email' => ['required', 'email', 'string'],
            
        ];
    }

    /**
    * Modify input data
    *
    * @return array
    */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
