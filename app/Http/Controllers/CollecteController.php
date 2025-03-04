<?php

namespace App\Http\Controllers;

use App\Models\Collecte;
use Illuminate\Http\Request;

class CollecteController extends Controller
{
    public function index()
    {
        // Fetch all collectes from the database
        $collectes = Collecte::where('status', 'validated')->get();

        // Pass the collectes data to the view
        return view('collectes', compact('collectes'));
    }

    public function overview()
{
    $locations = Collecte::join('signals', 'collectes.signal_id', '=', 'signals.id')
        ->select('signals.latitude', 'signals.longitude')
        ->get();

    return view('overview', compact('locations'));
}
}
