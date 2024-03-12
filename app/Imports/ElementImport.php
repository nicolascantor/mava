<?php

namespace App\Imports;

use App\Models\Elemento;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ElementImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $elemento = Elemento::create([
                'referencia' => $row['referencia'],
                'nombre' => $row['nombre'],
                'unidad_medida' => $row['unidad_medida'],
                'valor_venta_publico' => $row['valor_venta_publico'],
                'valor_venta_sede' => $row['valor_venta_sede'],
            ]);
        }
    }
}
