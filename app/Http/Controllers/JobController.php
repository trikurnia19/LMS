<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApplier;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    public function applyForm()
    {
        return view('pages.job.apply');
    }

    public function submitApplication(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'birthday' => 'nullable|date',
            'university_name' => 'nullable|string|max:255',
            'major' => 'nullable|string|max:255',
            'graduating_year' => 'nullable|integer|min:1900|max:'.date('Y'),
        ]);

        JobApplier::create($validatedData);

        return redirect()->route('job.apply')->with('success', 'Application submitted successfully!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cv' => 'required|file|mimes:pdf|max:2048',
            // Add validation rules for other fields if needed
        ]);

        $cvPath = $request->file('cv')->store('cv_files', 'public');

        JobApplier::create([
            'cv_path' => $cvPath,
            // Add other fields here
        ]);

        return redirect()->route('previous.page')->with('success', 'Job application submitted successfully.');
    }

    public function downloadCV($id)
    {
        $jobApplication = JobApplier::findOrFail($id);
        $cvPath = $jobApplication->cv_path;

        $filePath = storage_path('app/public/' . $cvPath);

        return response()->download($filePath);
    }

    public function applierList()
        {
            $applier = JobApplier::all();
            return view('pages.job.list', compact('applier'));
        }

    public function applierDetail()
        {
            $applier = JobApplier::all();
            return view('pages.job.detail', compact('applier'));
        }

    public function destroy(JobApplier $applier)
        {
            
            $applier->delete();
        
            return redirect()->back()->with('success', 'Data Pelamar berhasil dihapus.');
        }
}
