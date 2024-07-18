<?php

namespace Database\Seeders;

use App\Models\Owner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Owner::truncate();

        Owner::create([
            'name'          => "owner pusat",
            'email'         => "owner@mail.com",
            'phone_number'  => "08123456789",
            'password'      => bcrypt("secret123"),
        ]);
    }
}
