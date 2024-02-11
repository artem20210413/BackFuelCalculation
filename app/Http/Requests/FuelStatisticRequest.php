<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuelStatisticRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->checkActive();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'id' => 'integer',
            'distance' => 'required|numeric',
            'volume' => 'required|numeric',
            'fuel_type_alias' => 'string|exists:fuel_types,alias',
            'gas_station_alias' => 'string|exists:gas_stations,alias',
            'movement_type_alias' => 'string|exists:movement_types,alias',
            'refill_amount' => 'numeric',
            'traffic_jam_percentage' => 'numeric',
            'temperature' => 'numeric',
            'description' => 'string',
            'tank_refill_time' => 'date',
        ];

        if ($this->has('id')) {
            $rules['distance'] = 'nullable';
            $rules['volume'] = 'nullable';
        }

        return $rules;
    }
}
