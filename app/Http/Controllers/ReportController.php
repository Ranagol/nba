<?php

namespace App\Http\Controllers;

use App\Report;
use App\User;
use App\Team;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::with('user', 'teams')->orderBy('created_at', 'desc')->paginate(5);
        return view('reports.index', compact('reports'));
    }

    public function indexForSelectedTeam($teamName){
        //{{dd($teamName);}}
        $team = Team::where('name', $teamName)->first();

        $reports = $team->reports()->with('user', 'teams')->paginate(5);

        return view('reports.reportsByTeam', compact('team', 'reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();
        return view('reports.create', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required|min:10',
            'arrayForTeamIds' => 'required|array',
            'arrayForTeamIds.*' => 'string'
        ]);

        $report = new Report;
        $report->title = $request->title;
        $report->content = $request->content;
        $report->user_id = auth()->id();//get the user_id from the auth helper
        //{{ dd($request, $report);}}

        $teams = Team::whereIn('id', $request->arrayForTeamIds)->get();//sooooo... The whereIn() function is different from where(). where() receives one value to search, while whereIn() receives multiple values to search for in the db, in an array. We are saying to Laravel: please please give me all the teams with the id matching with id's from arrayForTeamIds[]. These teams will be stored in this $teams array.

        foreach ($teams as $team) {//ovde loop-ujemo preko $teams

            $team->reports()->save($report);//za svaki navedeni team dodaj gorekreirani $report. reports() je relationship metoda izmedju Team i Report. Ovako cemo popuniti i nas report_team pivot table sa odgovarajucim vrednostima na odgovarajucim mestima.
        }
        session()->flash('message', 'Thank you for publishing article on www.nba.com');
        return redirect('/reports');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        $report->load('user');
        $report->load('teams');
        return view('reports.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
