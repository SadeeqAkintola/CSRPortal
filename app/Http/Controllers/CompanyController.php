<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Company;


class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $companies = Company::paginate(20);

        return view('system-mgmt/company/index', ['companies' => $companies]);
    }

    public function create()
    {
//        return view('system-mgmt/company/create');
        return view('system-mgmt/company/create');
    }

    public function store(Request $request)
    {
        $this->validateInput($request);
        Company::create([
            'company_name' => $request['company_name'],
            'company_code' => $request['company_code'],
            'purpose' => $request['purpose'],
            'period' => $request['period']
        ]);

        return redirect()->intended('system-management/company');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $company = Company::find($id);
        // Redirect to division list if updating division wasn't existed
        if ($company == null || count($company) == 0) {
            return redirect()->intended('/system-management/company');
        }

        return view('system-mgmt/company/edit', ['company' => $company]);
    }


    public function update(Request $request, $id)


    {
        $company = Company::findOrFail($id);
        $constraints = [
            'company_name' => 'required|max:60',
            'purpose' => 'required|max:200',
            'period' => 'required|max:60'
        ];
        $input = [
            'company_name' => $request['company_name'],
            'purpose' => $request['purpose'],
            'period' => $request['period']
        ];

        $this->validate($request, $constraints);
        Company::where('id', $id)
            ->update($input);

        return redirect()->intended('system-management/company');
    }


    public function destroy($id)
    {
        Company::where('id', $id)->delete();
        return redirect()->intended('system-management/company');
    }

    private function validateInput($request) {
        $this->validate($request, [
            'company_name' => 'required|max:60',
            'company_code' => 'required|max:10|unique:companies',
            'purpose' => 'required|max:200',
            'period' => 'required|max:60'
        ]);
    }

}
