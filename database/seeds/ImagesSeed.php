<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ImagesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filesInFolder = File::files('public/imgs');
        foreach($filesInFolder as $path){
            $imageName = str_replace("public/imgs/","",$path);
            DB::table('imageitems')->insert([
                'url' => $imageName,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
