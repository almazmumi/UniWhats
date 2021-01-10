<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use Illuminate\Http\Request;
use App\Rules\LinksValidator;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use PHPHtmlParser\Dom;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class GroupController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {

        // If the isGenral is true, then ignore section number
        $data = $req->validate(
            [
                'user_id' => "",
                'department_id'=>"required",
                'courseCode'=>"not_in=-1|required|min:2|starts_with:ACCT,ECON,FIN,ACFN,AE,ARE,ARC,CE,CEM,EM,CHE,CHEM,COE,CSE,CPG,CP,CRP,ERTH,ENVS,GEOL,GEOP,EE,ELI,ELD,ENGL,MIS,OM,ISOM,GS,IAS,ICS,SWE,BIOL,LS,MATH,STAT,AS,MBA,ME,MSE,MGT,MKT,BUS,PE,PETE,PHYS,PSE,SE,SCE,ISE,CISE",
                'sectionNumber'=>"numeric|nullable",
                'isGeneral' => "",
                'url' => ['required','url','max:255','starts_with:https://chat.whatsapp.com', new LinksValidator()],
            ],[
                'url.starts_with' => "Please enter a valid whatsapp group link.",
                'courseCode.starts_with' => "Please select the correct course code."
            ]
        );

        if(!isset($req->all()['isGeneral'])){
            $data["isGeneral"] = false;
        }else{
            $data["isGeneral"] = true;
        }

        $user = Auth::user();
        $user->groups()->create($data);

        return redirect()->route("home");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {  
        return view("groups.show", compact("group"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {   
       
        if(Auth::check() && $group->user_id == Auth::user()->id){
            
                $group->delete();
                
                return redirect()->back()->with("status", 'Delete process is Done!');
            
             

        }else{
            return redirect()->back()->with("status", 'You are not authorized to do it.');
        }
        
    }
}
