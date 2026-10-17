<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::truncate();

        $items = [
            ['title' => 'M1 легковой', 'price' => 1074, 'type' => Service::TYPE_PRIMARY],
            ['title' => 'M1 легковой', 'price' => 1070, 'type' => Service::TYPE_REPEAT],
            ['title' => 'Регулировка света фар', 'price' => 500, 'type' => null],
            ['title' => 'Проверка состояния рабочих жидкостей', 'price' => 726, 'type' => null],
        ];

        foreach ($items as $item) {
            Service::create($item);
        }
    }
}