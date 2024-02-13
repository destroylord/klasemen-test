<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClubScoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
 public function rules()
    {
        return [
            'home_team_id' => 'required|integer|exists:clubs,id',
            'away_team_id' => 'required|integer|exists:clubs,id|different:home_team_id',
            'home_team_score' => 'required|integer|min:0',
            'away_team_score' => 'required|integer|min:0',
        ];
    }

    public function messages()
    {
        return [
             'required' => 'Kolom :attribute harus diisi.',
             'integer' => 'Kolom :attribute harus berupa angka.',
             'exists' => ':attribute tidak ditemukan.',
             'different' => ':attribute dan :other harus berbeda.',
             'min' => 'Kolom :attribute tidak boleh kurang dari :min.',
        ];
    }
}
