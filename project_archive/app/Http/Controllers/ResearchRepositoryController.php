<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResearchRepository;

class ResearchRepositoryController extends Controller {
    public function store(Request $request) {
        $data = $request->validate([
            'project_name' => 'required',
            'members' => 'required',
            'department' => 'required',
            'abstract' => 'required',
            'banner_image' => 'image|nullable|max:1999',
            'file' => 'required|mimes:pdf,doc,docx|max:10000',
        ]);

        if ($request->hasFile('banner_image')) {
            $data['banner_image'] = $request->file('banner_image')->store('banners', 'public');
        }
        $data['file'] = $request->file('file')->store('files', 'public');
        $data['approved'] = false;

        ResearchRepository::create($data);

        return redirect()->back()->with('success', 'Research uploaded successfully. Awaiting admin approval.');
    }

    // ✅ Add the dashboard method here
    public function dashboard() {
        $projects = ResearchRepository::where('approved', true)->get();

        // Categorize projects by department
        $departments = $projects->groupBy('department');

        return view('dashboard', compact('departments'));
    }
    
}
