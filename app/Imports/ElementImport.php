<?php

namespace App\Imports;

use App\Models\Elemento;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsFailures;


class ElementImport implements ToModel, WithValidation, WithHeadingRow, SkipsOnFailure
{
    use Importable, SkipsFailures;

    public function model(array $row)
    {
        return new Elemento([
            'referencia' => $row['referencia'],
            'nombre' => $row['nombre'],
            'unidad_medida' => $row['unidad_medida'],
            'valor_venta_publico' => $row['valor_venta_publico'],
            'valor_venta_sede' => $row['valor_venta_sede'],
        ]);

    }

    public function rules(): array
    {
        return [
            '*.referencia' => Rule::unique('elementos', 'referencia'),
        ];
    }

    public function customValidationMessages()
    {
        return [
            'referencia.unique' => 'El elemento ya se encuentra en la base de datos',
        ];
    }
}
