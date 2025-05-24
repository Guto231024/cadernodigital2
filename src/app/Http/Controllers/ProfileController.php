<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
{
    return view('profile.show'); // crie a view resources/views/profile/show.blade.php
}
}
