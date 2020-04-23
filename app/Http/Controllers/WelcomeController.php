<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Contracts\Support\Renderable;


class WelcomeController extends Controller
{

    public function index()
    {
//        $faker = Factory::create();
//        $hours = Carbon::createFromTimeString($faker->time(), 'Europe/London');
//        $time = $faker->unixTime;
//        return [
//            date('H:i:s', time()),
//            date('H:i:s', (time() + (60 * 60 * 8))),
//            date('H:i', strtotime($hours)),
//            date('H:i', strtotime($hours->addHours(8))),
//            $faker->unixTime,
//            time(),
//            date('H:i:s', $time),
//            date('H:i:s', ($time + (60 * 60 * 8)))];
        return view('welcome');
    }

}
