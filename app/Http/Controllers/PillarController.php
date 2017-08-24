<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pillar;


class PillarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pillars = Pillar::paginate(20);

        return view('system-mgmt/pillar/index', ['pillars' => $pillars]);
    }

    public function create()
    {
        return view('system-mgmt/pillar/create');
    }

    public function store(Request $request)
    {
        $this->validateInput($request);
        Pillar::create([
            'pillar_name' => $request['pillar_name'],
            'pillar_code' => $request['pillar_code'],
            'description' => $request['description']


        ]);

        return redirect()->intended('system-management/pillar');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $pillar = Pillar::find($id);
        // Redirect to division list if updating division wasn't existed
        if ($pillar == null || count($pillar) == 0) {
            return redirect()->intended('/system-management/pillar');
        }

        return view('system-mgmt/pillar/edit', ['pillar' => $pillar]);
    }


    public function update(Request $request, $id)


    {
        $pillar = Pillar::findOrFail($id);
        $constraints = [
            'pillar_name' => 'required|max:60',
            'pillar_code' => 'required|max:10',
            'description' => 'required|min:2'
        ];
        $input = [
            'pillar_name' => $request['pillar_name'],
            'pillar_code' => $request['pillar_code'],
            'description' => $request['description']
        ];

        $this->validate($request, $constraints);
        Pillar::where('id', $id)
            ->update($input);

        return redirect()->intended('system-management/pillar');
    }


    public function destroy($id)
    {
        Pillar::where('id', $id)->delete();
        return redirect()->intended('system-management/pillar');
    }

    private function validateInput($request) {
        $this->validate($request, [

            'pillar_name' => 'required|max:60',
            'pillar_code' => 'required|max:20|unique:pillars',
            'description' => 'required|min:2'
        ]);
    }

}
