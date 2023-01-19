<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Technology;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\type;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        // dd($request->all());
        // dd($request)->validated();
        $form_data = $request->validated();
        // dd($form_data);
        // $form_data['slug'] = Str::slug($form_data['title']);
        $form_data['slug'] = Project::generateSlug($form_data['title']);
        // $project = new Project();
        // $project->fill($form_data);
        // $project->save();

        // if (array_key_exists('image', $form_data)) {
        //     // if ($request->hasFile('image'))
        //     $path = Storage::put('post_image', $request->image);
        //     // dd($path);
        //     $form_data['image'] = $path;
        // }
        // Inserisco user_id nei data da salvare:
        $form_data['user_id'] = Auth::id();

        $project = Project::create($form_data);
        // Istruzioni condizionali nel caso siano state selezionate voci nel checkbox technologie:
        if ($request->has('technologies')) {
            $project->technologies()->attach($request->technologies);
            //    project->technologies()->attach($form_data['technologies']);

        }


        return redirect()->route('admin.projects.index')->with('message', 'Il progetto è stato creato correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        dd($project->technologies);
        // dd($project);
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        // dd($request->all());
        // dd($request)->validated();
        // $form_data = $request->all();
        $form_data = $request->validated();
        $form_data['slug'] = Project::generateSlug($form_data['title']);
        $project->update($form_data);
        // nel caso io non voglia nessuna tecnologia selezionata, devo toglierli anche dall'array  per non aver errore..quindi devo specificare:
        if ($request->has('technologies')) {
            $project->technologies()->sync($request->technologies);
        } else {
            $project->technologies()->detach();
        }

        return redirect()->route('admin.projects.index')->with('message', "Il progetto è stato creato correttamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        // $project->technologies()->detach();
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', "Progetto cancellato con successo.");
    }
}
