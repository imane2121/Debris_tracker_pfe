<?php

namespace App\Http\Controllers;

use App\Models\Collecte;
use App\Models\Signal;
use App\Models\Article;
use App\Models\WasteType;
use App\Models\CollecteSupervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CollecteController extends Controller
{
    // Moroccan regions array
    private $regions = [
        'Tanger-Tétouan-Al Hoceïma',
        'L\'Oriental',
        'Fès-Meknès',
        'Rabat-Salé-Kénitra',
        'Béni Mellal-Khénifra',
        'Casablanca-Settat',
        'Marrakech-Safi',
        'Drâa-Tafilalet',
        'Souss-Massa',
        'Guelmim-Oued Noun',
        'Laâyoune-Sakia El Hamra',
        'Dakhla-Oued Ed-Dahab'
    ];

    public function index()
    {
        // Fetch all collectes from the database
        $collectes = Collecte::where('status', 'validated')->get();
        // Pass the collectes data to the view
        return view('collectes',  compact('collectes'));
    }

    public function overview()
    {
        // Get all signals with their associated collectes
        $locations = Signal::select('signals.*')
            ->leftJoin('collectes', 'signals.id', '=', 'collectes.signal_id')
            ->addSelect('collectes.starting_date')
            ->get();
    
        // Fetch articles ordered by published_at
        $articles = Article::orderBy('published_at', 'desc')->get();
    
        // Paginate collectes (9 per page)
        $collectes = Collecte::where('status', 'validated')->get();
    
        return view('overview', compact('locations', 'articles', 'collectes'));
    }

    public function supervisorDashboard()
    {
        $regions = ['Tanger-Tétouan-Al Hoceïma', 'L\'Oriental', 'Fès-Meknès', 'Rabat-Salé-Kénitra', 'Béni Mellal-Khénifra', 'Casablanca-Settat', 'Marrakech-Safi', 'Drâa-Tafilalet', 'Souss-Massa', 'Guelmim-Oued Noun', 'Laâyoune-Sakia El Hamra', 'Dakhla-Oued Ed-Dahab'];
        
        // Get signals with pagination (10 per page)
        $signals = Signal::orderBy('created_at', 'desc')->paginate(10);
        
        return view('supervisorDashboard', compact('signals', 'regions'));
    }

    public function storeCollecte(Request $request)
    {
        try {
            // Check if user is logged in and is a supervisor
            if (!session('user_id') || session('user_type') !== 'supervisor') {
                return redirect()->back()
                    ->with('error', 'You must be logged in as a supervisor to create a collecte.')
                    ->withInput();
            }

            Log::info('Received collecte creation request', $request->all());

            $validated = $request->validate([
                'signal_id' => 'required|exists:signals,id',
                'date' => 'required|date',
                'end_date' => 'required|date|after:date',
                'location' => 'required|string',
                'description' => 'required|string',
                'region' => 'required|string',
                'nbrContributors' => 'required|integer|min:1',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            Log::info('Validation passed', $validated);

            $collecte = new Collecte();
            $collecte->signal_id = $request->signal_id;
            $collecte->starting_date = $request->date;
            $collecte->end_date = $request->end_date;
            $collecte->location = $request->location;
            $collecte->description = $request->description;
            $collecte->status = 'in_progress';
            $collecte->collecte_supervisor_id = session('user_id'); // Use the ID from session
            $collecte->region = $request->region;
            $collecte->nbrContributors = $request->nbrContributors;

            // Handle image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('assets/img/collectes'), $imageName);
                $collecte->image = $imageName;
            }

            $saved = $collecte->save();
            Log::info('Collecte save result', ['saved' => $saved, 'collecte' => $collecte->toArray()]);

            if (!$saved) {
                Log::error('Failed to save collecte');
                return redirect()->back()
                    ->with('error', 'Failed to create collecte')
                    ->withInput();
            }

            return redirect()->back()->with('success', 'Collecte organized successfully!');
        } catch (\Exception $e) {
            Log::error('Error creating collecte: ' . $e->getMessage(), [
                'exception' => $e,
                'request' => $request->all()
            ]);
            
            return redirect()->back()
                ->with('error', 'Error creating collecte: ' . $e->getMessage())
                ->withInput();
        }
    }
}
