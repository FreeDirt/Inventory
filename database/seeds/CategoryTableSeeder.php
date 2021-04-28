<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Inventory;
use App\Parentcat;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $monitor = new Category();
        $monitor->name = 'Monitor';
        $monitor->parent_cat = '1';
        $monitor->save();

        $usb = new Category();
        $usb->name = 'USB';
        $usb->parent_cat = '2';
        $usb->save();

        $backup = new Category();
        $backup->name = 'BackUp';
        $backup->parent_cat = '4';
        $backup->save();

        $phone = new Category();
        $phone->name = 'Phone';
        $phone->parent_cat = '3';
        $phone->save();

        $battery = new Category();
        $battery->name = 'Battery';
        $battery->parent_cat = '5';
        $battery->save();

        $imac = new Category();
        $imac->name = 'Imac';
        $imac->parent_cat = '6';
        $imac->save();

        $headset = new Category();
        $headset->name = 'Headset';
        $headset->parent_cat = '2';
        $headset->save();

        $laptop = new Category();
        $laptop->name = 'Laptop';
        $laptop->parent_cat = '6';
        $laptop->save();

        $macmini = new Category();
        $macmini->name = 'Macmini';
        $macmini->parent_cat = '6';
        $macmini->save();

        $tablet = new Category();
        $tablet->name = 'Tablet';
        $tablet->parent_cat = '3';
        $tablet->save();

        $webcam = new Category();
        $webcam->name = 'Webcam';
        $webcam->parent_cat = '2';
        $webcam->save();

        $avr = new Category();
        $avr->name = 'AVR';
        $avr->parent_cat = '4';
        $avr->save();

        $extension = new Category();
        $extension->name = 'Extension';
        $extension->parent_cat = '4';
        $extension->save();

        $charger = new Category();
        $charger->name = 'Charger';
        $charger->parent_cat = '2';
        $charger->save();

        $mouse = new Category();
        $mouse->name = 'Mouse';
        $mouse->parent_cat = '2';
        $mouse->save();
        
    }
}
