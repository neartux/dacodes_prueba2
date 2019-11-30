<?php

use App\Utils\StatusKeys;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            ['id' => StatusKeys::STATUS_ACTIVE, 'name' => 'Active'],
            ['id' => StatusKeys::STATUS_INACTIVE, 'name' => 'Inactive']
        ];

        DB::table('status')->insert($status);
    }
}
