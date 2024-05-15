<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;


use App\Models\User; // Import your model

class PdfController extends Controller
{
    // public function generatePdf()
    // {
    //     $data = User::all(); // Fetch data from the database
        
    //     $users = User::all();
    //     $pdf = PDF::loadView('pages.SK', compact('users')); // Load view with data
        
    //     return $pdf->download('SK_Pensiun.pdf'); // Download the generated PDF
    // }

    public function generatePdf($name)
    {
        $user = User::where('name', $name)->first(); // Fetch user by name
        
        if (!$user) {
            abort(404); // If user not found, return 404
        }
        
        $pdf = PDF::loadView('pages.SK', compact('user')); // Load view with data
        
        return $pdf->download('SK_Pensiun_' . $user->name . '.pdf'); // Download the generated PDF
    }
}
