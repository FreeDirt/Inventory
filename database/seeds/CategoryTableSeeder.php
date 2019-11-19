<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Inventory;

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
        $monitor->save();

        $usb = new Category();
        $usb->name = 'USB';
        $usb->save();

        $backup = new Category();
        $backup->name = 'BackUp';
        $backup->save();

        $phone = new Category();
        $phone->name = 'Phone';
        $phone->save();

        $battery = new Category();
        $battery->name = 'Battery';
        $battery->save();

        $computer = new Category();
        $computer->name = 'Computer';
        $computer->save();

        $headset = new Category();
        $headset->name = 'Headset';
        $headset->save();

        $laptop = new Category();
        $laptop->name = 'Laptop';
        $laptop->save();

        $macmini = new Category();
        $macmini->name = 'Macmini';
        $macmini->save();

        $tablet = new Category();
        $tablet->name = 'Tablet';
        $tablet->save();

        $webcam = new Category();
        $webcam->name = 'Webcam';
        $webcam->save();

        $avr = new Category();
        $avr->name = 'AVR';
        $avr->save();

        $extension = new Category();
        $extension->name = 'Extension';
        $extension->save();

        $charger = new Category();
        $charger->name = 'Charger';
        $charger->save();

        $mouse = new Category();
        $mouse->name = 'Mouse';
        $mouse->save();
        
    }
}
