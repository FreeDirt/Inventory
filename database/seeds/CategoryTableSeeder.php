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
        $monitor->sub_cat = 'Monitor';
        $monitor->save();

        $usb = new Category();
        $usb->name = 'USB';
        $usb->sub_cat = 'Periperals';
        $usb->save();

        $backup = new Category();
        $backup->name = 'BackUp';
        $backup->sub_cat = 'Equipments';
        $backup->save();

        $phone = new Category();
        $phone->name = 'Phone';
        $phone->sub_cat = 'Mobile Devices';
        $phone->save();

        $battery = new Category();
        $battery->name = 'Battery';
        $battery->sub_cat = 'Supplies';
        $battery->save();

        $computer = new Category();
        $computer->name = 'Computer';
        $computer->sub_cat = 'Equipments';
        $computer->save();

        $headset = new Category();
        $headset->name = 'Headset';
        $headset->sub_cat = 'Periperals';
        $headset->save();

        $laptop = new Category();
        $laptop->name = 'Laptop';
        $laptop->sub_cat = 'Equipments';
        $laptop->save();

        $macmini = new Category();
        $macmini->name = 'Macmini';
        $macmini->sub_cat = 'Equipments';
        $macmini->save();

        $tablet = new Category();
        $tablet->name = 'Tablet';
        $tablet->sub_cat = 'Mobile Devices';
        $tablet->save();

        $webcam = new Category();
        $webcam->name = 'Webcam';
        $webcam->sub_cat = 'Periperals';
        $webcam->save();

        $avr = new Category();
        $avr->name = 'AVR';
        $avr->sub_cat = 'Electronics';
        $avr->save();

        $extension = new Category();
        $extension->name = 'Extension';
        $extension->sub_cat = 'Electronics';
        $extension->save();

        $charger = new Category();
        $charger->name = 'Charger';
        $charger->sub_cat = 'Periperals';
        $charger->save();

        $mouse = new Category();
        $mouse->name = 'Mouse';
        $mouse->sub_cat = 'Periperals';
        $mouse->save();
        
    }
}
