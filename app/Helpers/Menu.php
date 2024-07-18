<?php

namespace App\Helpers;

function get_menu(){
  return [
    'employ' => [
      ['url' => route('divisions.index'), 'label' => 'Divisi' ],
      ['url' => route('locations.index'), 'label' => 'Lokasi Kehadiran' ],
      ['url' => route('employees.index'), 'label' => 'Karyawan' ],
      ['url' => route('positions.index'), 'label' => 'Jabatan' ],
      ['url' => route('work-regulers.index'), 'label' => 'Jadwal Kerja' ],
      ['url' => route('work-shifts.index'), 'label' => 'Jadwal Shift' ],
    ],
    'present' => [
      ['url' => route('presents.daily'), 'label' => 'Harian' ],
      ['url' => route('presents.revision'), 'label' => 'Revisi Kehadiran' ],
      ['url' => route('presents.approvement'), 'label' => 'Persetujuan Kehadiran' ],
    ],
  ];
}