<?php

namespace App\Http\Controllers;

use App\Models\Composer;
use App\Models\Producer;
use App\Models\Singer;
use App\Models\Song;
use App\Models\Songwriter;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $songs = Song::all()->sortBy('name');
        $songwriters = Songwriter::all();
        $singers = Singer::all();
        $producers = Producer::all();
        $composers = Composer::all();
        return view('home',compact('songs','songwriters','singers','producers','composers'));
    }

    public function dash()
    {
        $songs = Song::all();
        $songwriters = Songwriter::all();
        $singers = Singer::all();
        $producers = Producer::all();
        $composers = Composer::all();
        $users = User::all();

        return view('dashboard',compact('songs','songwriters','singers','producers','composers','users'));
    }
}
