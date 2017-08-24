<?php

namespace App\Http\Controllers;
use App\CPABoard;
use App\CPABoardFiles;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UploadRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class CPABoardController extends Controller
{
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


        $cpa_boards = DB::table('cpa_board')

            ->leftJoin('users as u1', 'cpa_board.entered_by', '=', 'u1.id')
            ->leftJoin('users as u2', 'cpa_board.modified_by', '=', 'u2.id')
            ->select('cpa_board.id', 'cpa_board.title', 'cpa_board.details','cpa_board.link1','cpa_board.link2','cpa_board.link3', 'cpa_board.link4', 'cpa_board.link5', 'u1.name as entered_by', 'u2.name as modified_by','cpa_board.created_at', 'cpa_board.modified_date'  )
            ->orderBy('cpa_board.id', 'desc')
            ->paginate(15);

        return view('cpa-board/index', ['cpa_boards' => $cpa_boards]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cpa-board/create');
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

        $cpa_board = CPABoard::create([

            'title' => $request['title'],
            'details' => $request['details'],
            'link1' => $request['link1'],
            'link2' => $request['link2'],
            'entered_by' => Auth::user()->id,
            'modified_by' => Auth::user()->id,
            'modified_date' => Carbon::now()
        ]);

        if ( ! empty($request->p_files)) {
            foreach ($request->p_files as $p_file) {
                $filename = $p_file->store('public/CPAFilesStore');
                CPABoardFiles::create([
                    'cpa_board_id' => $cpa_board->id,
                    'file_name' => $p_file->store('')
                ]);
            }
        }

        return redirect()->intended('cpa-board')->with(['message' => 'Record Successfully Created!']);

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

    public function details($id)
    {
        $cpa_board = CPABoard::find($id);
        // Redirect to division list if updating division wasn't existed
        if ($cpa_board == null || count($cpa_board) == 0) {
            return redirect()->intended('/cpa-board');
        }


        $entered_By = User::where('id', '=', $cpa_board->entered_by)->first()->name;
        $modified_By = User::where('id', '=', $cpa_board->modified_by)->first()->name;
//dd($modified_By);
        $cpa_board_files = CPABoardFiles::where('cpa_board_id', $id)->get();
        return view('cpa-board/details', ['cpa_board' => $cpa_board, 'entered_By' => $entered_By, 'modified_By' => $modified_By], compact( 'cpa_board_files','entered_By','modified_By'));


    }

    public function edit($id)
    {
        $cpa_board = CPABoard::find($id);
        // Redirect to division list if updating division wasn't existed
        if ($cpa_board == null || count($cpa_board) == 0) {
            return redirect()->intended('/cpa-board');
        }

        $entered_By = User::where('id', '=', $cpa_board->entered_by)->first()->name;
        $modified_By = User::where('id', '=', $cpa_board->modified_by)->first()->name;

        $cpa_board_files = CPABoardFiles::where('cpa_board_id', $id)->get();
        return view('cpa-board/edit', ['cpa_board' => $cpa_board], compact( 'entered_By','modified_By', 'cpa_board_files'));
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
        $cpa_board = CPABoard::findOrFail($id);
        $constraints = [


            'title' => 'required|max:200',
            'details' => 'required|max:500',
            'link1' => 'required|max:500'

        ];

        $input = [


            'title' => $request['title'],
            'details' => $request['details'],
            'link1' => $request['link1'],
            'link2' => $request['link2'],
            'modified_by' => Auth::user()->id,
            'modified_date' => Carbon::now()
        ];


        if ($request->p_files != null ) {
            foreach ($request->p_files as $p_file) {
                $filename = $p_file->store('public/CPAFileStore');
                CPABoardFiles::create([
                    'cpa_board_id' => $cpa_board->id,
                    'file_name' => $p_file->store('')
                ]);
            }
        }




        $this->validate($request, $constraints);
        CPABoard::where('id', $id)
            ->update($input);




        return redirect()->intended('/cpa-board');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CPABoard::where('id', $id)->delete();

        return redirect()->back()->with(['message' => 'Record Successfully Deleted!']);
    }

    /**
     * Search division from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */

    private function validateInput($request) {
        $this->validate($request, [

            'title' => 'required|max:200',
            'details' => 'required|max:500',
            'link1' => 'required|max:500'
        ]);
    }
}
