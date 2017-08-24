<?php

namespace App\Http\Controllers;

use App\Pillar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Target;

class TargetController extends Controller
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


        $targets = DB::table('targets')
            ->leftJoin('pillars', 'targets.pillar_id', '=', 'pillars.id')
            ->select('targets.id', 'targets.target_name', 'targets.target_code','targets.description','pillars.pillar_name as pillar_name')
            ->paginate(15);

        return view('system-mgmt/target/index', ['targets' => $targets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pillars = Pillar::all();
        return view('system-mgmt/target/create', ['pillars' => $pillars]);
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
        Target::create([
            'target_name' => $request['target_name'],
            'target_code' => $request['target_code'],
            'description' => $request['description'],
            'pillar_id' => $request['pillar_id']
        ]);

        return redirect()->intended('system-management/target');
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
        $target = Target::find($id);
        // Redirect to division list if updating division wasn't existed
        if ($target == null || count($target) == 0) {
            return redirect()->intended('/system-management/target');
        }
        $pillars = Pillar::all();
        $selectedPillar = $target->pillar_id;
//        dd($selectedRole);
        return view('system-mgmt/target/edit', ['target' => $target, 'pillars' => $pillars], compact('pillars', 'selectedPillar'));


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
        $target = Target::findOrFail($id);
        $constraints = [
            'target_name' => 'required|max:60',
            'description' => 'required|max:200'

        ];

        $input = [
            'target_name' => $request['target_name'],
            'description' => $request['description'],
            'pillar_id' => $request['pillar_id']
        ];

        $this->validate($request, $constraints);
        Target::where('id', $id)
            ->update($input);


        return redirect()->intended('system-management/target');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Target::where('id', $id)->delete();
        return redirect()->intended('system-management/target');
    }

    /**
     * Search division from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */

    private function validateInput($request) {
        $this->validate($request, [
            'target_name' => 'required|max:60',
            'description' => 'required|max:200'
        ]);
    }
}
