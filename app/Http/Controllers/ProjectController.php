<?php

namespace App\Http\Controllers;
use App\Initiative;
use App\Pillar;
use App\Division;
use App\Company;
use App\Project;
use App\ProjectFiles;
use App\Target;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UploadRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class ProjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $projects = DB::table('projects')
            ->leftJoin('companies', 'projects.company_id', '=', 'companies.id')
            ->leftJoin('division', 'projects.division_id', '=', 'division.id')
            ->leftJoin('pillars', 'projects.pillar_id', '=', 'pillars.id')
            ->leftJoin('targets', 'projects.target_id', '=', 'targets.id')
            ->select('projects.id', 'companies.company_name', 'division.name','projects.title','pillars.pillar_name as pillar_name','targets.target_name as target_name', 'projects.year', 'projects.community','projects.state', 'projects.cost' )
            ->orderBy('projects.id', 'desc')->get();
//            ->paginate(10);

        return view('project/index', ['projects' => $projects]);
    }


    public function query()
    {
        $projects = DB::table('projects')
            ->leftJoin('companies', 'projects.company_id', '=', 'companies.id')
            ->leftJoin('division', 'projects.division_id', '=', 'division.id')
            ->leftJoin('pillars', 'projects.pillar_id', '=', 'pillars.id')
            ->leftJoin('targets', 'projects.target_id', '=', 'targets.id')
            ->select('projects.id', 'companies.company_name', 'division.name','projects.title','pillars.pillar_name as pillar_name','targets.target_name as target_name', 'projects.year', 'projects.community','projects.state', 'projects.cost' )
            ->orderBy('projects.id', 'desc')->get();

        return view('project/project-query', ['projects' => $projects]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all();
        $companies = Company::all();
        $divisions = Division::all();
        $pillars = Pillar::all();
        $targets = Target::all();
        $initiatives = Initiative::all();

        return view('project/create', ['projects' => $projects, 'companies' => $companies, 'divisions' => $divisions, 'pillars' => $pillars, 'targets' => $targets, 'initiatives' => $initiatives]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



    public function store(UploadRequest $request)
    {
        $this->validateInput($request);

        $project = Project::create([
            'company_id' => $request['company_id'],
            'division_id' => $request['division_id'],
            'title' => $request['title'],
            'pillar_id' => $request['pillar_id'],

            'target_id' => $request['target_id'],
            'objective' => $request['objective'],
            'target_summary' => $request['target_summary'],
            'target_details' => $request['target_details'],

            'csr_strategy' => $request['csr_strategy'],
            'status' => $request['status'],
            'project_stage' => $request['project_stage'],
            'pillar_id' => $request['pillar_id'],

            'year' => $request['year'],
            'division_id' => $request['division_id'],
            'address' => $request['address'],
            'community' => $request['community'],



            'lga' => $request['lga'],
            'town' => $request['town'],
            'street' => $request['street'],
            'state' => $request['state'],
            'country' => $request['country'],

            'full_location' => $request['full_location'],
            'cost' => $request['cost'],
            'initiative_id' => $request['initiative_id'],

            'entered_by' => Auth::user()->id
        ]);
        if ($request->p_files != null ) {
            foreach ($request->p_files as $p_file) {
                $filename = $p_file->store('public/FileStore');
                ProjectFiles::create([
                    'project_id' => $project->id,
                    'file_name' => $p_file->store('')
                ]);
            }

        }
        return redirect()->intended('project');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDepartment($id){
        $var_Division = Division::where('id', $id)->first();
        return $var_DivisionName = $var_Division->name;
    }

    public function details($id)
    {
        $project = Project::find($id);
        // Redirect to division list if updating division wasn't existed
        if ($project == null || count($project) == 0) {
            return redirect()->intended('/project');
        }

     //   $selectedCompany = $project->company_id;
        $selectedDivision = $project->division_id;
        $selectedPillar = $project->pillar_id;
        $selectedTarget = $project->target_id;
        $selectedInitiative = $project->initiative_id;


        $selectedDivision = Division::where('id', '=', $project->division_id)->first()->name;
        $selectedPillar = Pillar::where('id', '=', $project->pillar_id)->first()->pillar_name;
        $selectedTarget = Target::where('id', '=', $project->target_id)->first()->target_name;
        $selectedInitiative = Initiative::where('id', '=', $project->initiative_id)->first()->initiative_name;

        $project_files = ProjectFiles::where('project_id', $id)->get();
//        dd($project_files);
        return view('project/details', ['project' => $project], compact( 'selectedDivision','selectedPillar', 'selectedTarget', 'selectedInitiative', 'project_files'));


    }

    public function edit($id)
    {
        $project = Project::find($id);
        // Redirect to division list if updating division wasn't existed
        if ($project == null || count($project) == 0) {
            return redirect()->intended('/project');
        }
        $companies = Company::all();
        $selectedCompany = $project->company_id;

        $divisions = Division::all();
        $selectedDivision = $project->division_id;

        $pillars = Pillar::all();
        $selectedPillar = $project->pillar_id;

        $targets = Target::all();
        $selectedTarget = $project->target_id;

        $initiatives = Initiative::all();
        $selectedInitiative = $project->initiative_id;

        $project_files = ProjectFiles::where('project_id', $id)->get();
        return view('project/edit', ['project' => $project, 'companies' => $companies, 'divisions' => $divisions, 'pillars' => $pillars, 'targets' => $targets, 'initiatives' => $initiatives], compact('companies', 'selectedCompany', 'divisions', 'selectedDivision', 'pillars', 'selectedPillar', 'targets', 'selectedTarget', 'initiatives', 'selectedInitiative', 'project_files'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     $project = Project::findOrFail($id);
        $constraints = [
            'title' => 'required|max:100',
            'objective' => 'required|max:200',
            'year' => 'required|max:4',
            'community' => 'required|max:60',
            'town' => 'required|max:60',
            'lga' => 'required|max:60',
            'cost' => 'required|max:20',
            'state' => 'required|max:200'
        ];

        $input = [
            'division_id' => $request['division_id'],
            'title' => $request['title'],
            'pillar_id' => $request['pillar_id'],
            'target_id' => $request['target_id'],
            'objective' => $request['objective'],
            'target_summary' => $request['target_summary'],
            'target_details' => $request['target_details'],


            'year' => $request['year'],
            'address' => $request['address'],
            'community' => $request['community'],

            'lga' => $request['lga'],
            'cost' => $request['cost'],
            'town' => $request['town'],
            'street' => $request['street'],
            'state' => $request['state'],
            'country' => $request['country'],

            'full_location' => $request['full_location'],
            'project_stage' => $request['project_stage'],
            'status' => $request['status'],

            'initiative_id' => $request['initiative_id'],

            'modified_by' => Auth::user()->id,
            'modified_date' => Carbon::now()
        ];


        if ($request->p_files != null ) {
            foreach ($request->p_files as $p_file) {
                $filename = $p_file->store('public/FileStore');
                ProjectFiles::create([
                    'project_id' => $project->id,
                    'file_name' => $p_file->store('')
                ]);
            }
        }




        $this->validate($request, $constraints);
        Project::where('id', $id)
            ->update($input);




        return redirect()->intended('/project')->with(['message' => 'Project Record Successfully Updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::where('id', $id)->delete();
//        return redirect()->intended('/project');
        return redirect()->back()->with(['message' => 'Project Successfully Deleted!']);
    }

    /**
     * Search division from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */

    private function validateInput($request) {
        $this->validate($request, [
            'title' => 'required|max:100',
            'objective' => 'required|max:200',
            'year' => 'required|max:4',
            'community' => 'required|max:60',
            'town' => 'required|max:60',
            'lga' => 'required|max:60',
            'cost' => 'required|max:20',
            'state' => 'required|max:200'


        ]);
    }
}
