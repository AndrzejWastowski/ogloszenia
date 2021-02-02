<?php
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;


function create_mini_image($width,$height,$input,$output,$crop = '0')
{

    switch ($crop)
    {   
        case 0:
        break;

        case 1:


    }

    // create an image manager instance with favored driver
    $manager = new ImageManager(array('driver' => 'imagick'));    

    $img = $manager->make($input)->resize($width,$height, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize(); })->stream('jpg', 75);

    Storage::put($output, $img);

}

function create_min_image_aspect_ratio($width,$input,$output)
{
    // create an image manager instance with favored driver
    $manager = new ImageManager(array('driver' => 'imagick'));    

    $img = $manager->make($input)->resize($width, null, function ($constraint) {
        $constraint->aspectRatio();
    })->stream('jpg', 75);
    
    Storage::put($output, $img);

}


function generuj_miniaturke_kw($width,$input,$output)
{


}