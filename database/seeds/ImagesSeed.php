<?php

use App\Imageitem;
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
            Imageitem::create(["url" => $imageName]);
        }
    }
}
