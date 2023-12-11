<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function store(Request $request)
    {
        if (Visitor::where('visitor', $request->ip())->exists()) {
            return response()->json(['status' => false, 'message' => 'visitor already exists']);
        }
        $ip = $request->ip();
        $visitor = Visitor::firstOrCreate(['visitor' => $ip]);
        $visitor->increment('view');
        $visitor->save();

        return response()->json(['status' => true, 'message' => 'visitor added successfully']);
    }
}
