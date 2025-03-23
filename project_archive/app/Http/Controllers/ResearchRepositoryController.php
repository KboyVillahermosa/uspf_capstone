<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResearchRepository;

class ResearchRepositoryController extends Controller {
    
    // ✅ Store new research submission
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
        $data['user_id'] = auth()->id(); // ✅ Link the research project to the user

        ResearchRepository::create($data);

        return redirect()->back()->with('success', 'Research uploaded successfully. Awaiting admin approval.');
    }

    // ✅ User's research history
    public function history() {
        $userProjects = ResearchRepository::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
        
        return view('history', compact('userProjects'));
    }
    
    
    // ✅ Dashboard for approved research projects
    public function dashboard() {
        $projects = ResearchRepository::where('approved', true)->get();
        $departments = $projects->groupBy('department'); // Categorize projects by department

        return view('dashboard', compact('departments'));
    }
    public function show($id)
    {
        $project = ResearchRepository::find($id);
    
        if (!$project) {
            abort(404, 'Project not found');
        }
    
        return view('research.show', compact('project'));
    }
    

public function update(Request $request, $id)
{
    $research = ResearchRepository::findOrFail($id);

    $research->update([
        'project_name' => $request->project_name,
        'members' => $request->members,
        'department' => $request->department,
        'abstract' => $request->abstract,
    ]);

    return redirect()->route('history')->with('success', 'Research updated successfully!');
}

public function edit($id)
{
    $research = ResearchRepository::findOrFail($id);
    return view('research.edit', compact('research'));
}


}
