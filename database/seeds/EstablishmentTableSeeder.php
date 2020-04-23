<?php

use App\Category;
use App\Coupon;
use App\Establishment;
use App\Opening;
use App\Payment;
use Illuminate\Database\Seeder;

class EstablishmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Establishment::class,10)->create()->each(function(Establishment $establishment){
            $establishment->categories()->createMany(factory(Category::class,2)->make()->toArray());
            $establishment->coupons()->createMany(factory(Coupon::class,1)->make()->toArray());
            $establishment->opening()->createMany(factory(Opening::class,5)->make()->toArray());
            $establishment->payments()->createMany(factory(Payment::class,2)->make()->toArray());
        });
    }
}
