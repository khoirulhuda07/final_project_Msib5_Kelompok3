<?php

namespace App\Imports;

use App\Models\Kurir;
use illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KurirImport implements ToCollection, WithHeadingRow
{
    /**
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            Kurir::create([
                'nama_kurir' => $row['nama'],
                'nomor_telepon'=> $row['nomor'],
                'jadwal'=> $row['jadwal'],
            ]);

        }
    }
}
