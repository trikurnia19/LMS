<?php

namespace App\Http\Controllers;

use App\Http\Requests\Job\StoreJobRequest;
use Illuminate\Http\Request;
use App\Models\JobApplier;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class JobController extends Controller
{
    public function applyForm()
    {
        return view('pages.job.apply');
    }

    public function submitApplication(StoreJobRequest $request)
    {
        $file = $request->file('cv');
        $request = $request->validated();

        $extension = $file->getClientOriginalExtension();
        $filename = $file->getClientOriginalName();
        $filesize = $file->getSize();
        $filemime = $file->getClientMimeType();
        $file->storeAs('cv', $filename,'public');

        $applicant = JobApplier::create([
            'name' => $request['name'],
            'address' => $request['address'],
            'birthday' => $request['birthday'],
            'university_name' => $request['university_name'],
            'major' => $request['major'],
            'graduating_year'=> $request['graduating_year'],
            'cv_path' => url('/storage/cv/'.$filename)
        ]);
        $applicant->assignRole('executive');
        $applicant->cv()->create([
            'filename' => $filename,
            'type' => $extension,
            'mime' => $filemime,
            'size' => $filesize,
            'upload_id'=> $applicant->id,
            'upload_type' => 'cv'
        ]);
        

        return redirect()->route('indexView')->with('success', 'Application submitted successfully!');
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
