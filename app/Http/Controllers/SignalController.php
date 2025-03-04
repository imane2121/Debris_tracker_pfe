<?php

namespace App\Http\Controllers;

use App\Models\Signal;
use Illuminate\Http\Request;

class SignalController extends Controller
{
    // Display all signals
    public function index()
    {
        $signals = Signal::all();
        return view('signals', compact('signals'));
        
    }

    // Delete a signal
    public function destroy($id)
    {
        $signal = Signal::findOrFail($id);
        $signal->delete();
        return redirect()->route('signals.index')->with('success', 'Signal deleted successfully.');
    }
}