<?php

namespace App\Http\Controllers;

use App\Target;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Goal;

class GoalController extends Controller
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


        $goals = DB::table('goals')
            ->leftJoin('targets', 'goals.target_id', '=', 'targets.id')
            ->select('goals.id', 'goals.goal_name', 'goals.goal_code','goals.description','targets.target_name as target_name')
            ->paginate(15);

        return view('system-mgmt/goal/index', ['goals' => $goals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $targets = Target::all();
        return view('system-mgmt/goal/create', ['targets' => $targets]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateInput($request);
        Goal::create([
            'goal_name' => $request['goal_name'],
            'goal_code' => $request['goal_code'],
            'description' => $request['description'],
            'target_id' => $request['target_id']
        ]);

        return redirect()->intended('system-management/goal');
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
    public function edit($id)
    {
        $goal = Goal::find($id);
        // Redirect to division list if updating division wasn't existed
        if ($goal == null || count($goal) == 0) {
            return redirect()->intended('/system-management/target');
        }
        $targets = Target::all();
        $selectedTarget = $goal->target_id;
//        dd($selectedRole);
        return view('system-mgmt/goal/edit', ['goal' => $goal, 'targets' => $targets], compact('targets', 'selectedTarget'));


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
        $goal = Goal::findOrFail($id);
        $constraints = [
            'goal_name' => 'required|max:60',
            'description' => 'required|max:200'

        ];

        $input = [
            'goal_name' => $request['goal_name'],
            'description' => $request['description'],
            'target_id' => $request['target_id']
        ];

        $this->validate($request, $constraints);
        Goal::where('id', $id)
            ->update($input);


        return redirect()->intended('system-management/goal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Goal::where('id', $id)->delete();
        return redirect()->intended('system-management/goal');
    }

    /**
     * Search division from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */

    private function validateInput($request) {
        $this->validate($request, [
            'goal_name' => 'required|max:60',
            'description' => 'required|max:200'
        ]);
    }
}
