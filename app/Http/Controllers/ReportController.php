<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;  // Correct import statement
    use App\Models\Report;

class ReportController extends Controller
{

    

        public function submitReport(Request $request)
        {
            // Validate input
            $validator = Validator::make($request->all(), [
                'location' => 'required|string',
                'material' => 'required|string',
                'quantity' => 'required|string',
                'photo' => 'nullable|image',
            ]);
    
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }
    
            // Save report
            $report = Report::create([
                'location' => $request->location,
                'material' => $request->material,
                'quantity' => $request->quantity,
                'notes' => $request->notes,
                'user_id' => auth()->user()->id,  // Assuming user is logged in
            ]);
    
            // Handle photo upload if present
            if ($request->hasFile('photo')) {
                $photoPath = $request->photo->store('photos');
                $report->photo = $photoPath;
                $report->save();
            }
    
            return response()->json([
                'message' => 'Report submitted successfully!',
                'report' => $report,
            ], 201);
        }
    }
    
