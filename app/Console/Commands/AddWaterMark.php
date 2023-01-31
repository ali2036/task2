<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class AddWaterMark extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:add-water-mark';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $images = Storage::disk('local')->files('images');
        foreach ($images as $key => $image) {
            $img = Image::make(public_path('/storage/'.$image));
            $img->text(date('Y-m-d'), 230, 70, function ($font) {
                $font->file(public_path('font-file.ttf'));
                $font->size(90);
                $font->color('#db1818');
                $font->align('center');
                $font->valign('top');
                $font->angle(360);
            });
            $img->save(public_path('/storage/'.$image));
        }
    }
}
