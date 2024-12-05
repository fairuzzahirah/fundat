<?php
namespace App\Http\Requests\UserData;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Tentukan apakah user diizinkan untuk melakukan request ini
        return true; // Atau bisa disesuaikan dengan logika otorisasi
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:5',
                'full_name' => 'required|string|regex:/^[a-zA-Z ]+$/',
                'phone' => ['required', 'numeric', 'regex:/^62\d{9,}$/'],
        ];
    }

    /**
     * Customize the error messages for validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'phone.regex' => 'Nomor telepon harus dimulai dengan kode negara 62.',
        ];
    }
}
