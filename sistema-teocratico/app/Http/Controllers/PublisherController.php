<?php

namespace App\Http\Controllers;
use App\Models\Publisher;

use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::with(['circuit', 'congregation', 'group'])->get();
        return view('dashboard', compact('publishers'));
    }
}
