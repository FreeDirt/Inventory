<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Employee;
use App\User;
use App\Software;
use App\Softwareuser;
use DB;

class SoftwareUserController extends Controller
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
        $current_userId = Auth()->user()->id;
        $current_user = User::find($current_userId);
        $softwares = Software::all();
        // $softwareusers = Softwareuser::all();
        $employees = Employee::all();

        $softwareusers = DB::table('softwareusers')
        ->leftJoin('software', 'softwareusers.software_id', '=', 'software.id')
        ->leftJoin('employees', 'softwareusers.employee_id', '=', 'employees.id')
        ->select(DB::raw('employees.name as empName,
                        software.name as softname,
                        price as price,
                        softwareusers.sstatus as sstatus,
                        payment_date as payment_date,
                        renewal_date as renewal_date,
                        credit_card as credit_card,
                        credit_holder as credit_holder,
                        software.software_img as software_img,
                        softwareusers.id as sid'))
        // ->select('employees.*', 'empstatuses.status as status')
        ->get();

        // dd($softwareusers);

        $itemCounts = DB::table('softwareusers')
        ->leftJoin('software', 'softwareusers.software_id', '=', 'software.id')
        ->leftJoin('employees', 'softwareusers.employee_id', '=', 'employees.id')
        ->select(DB::raw('count(employee_id) as empTotal, software_id as sid, software.name as softname, software.software_img as software_img'))
        ->groupBy('sid')
        ->get();
        
        // dd($itemCounts);

        return view('softwareuser.index', compact( 'current_user', 'softwareusers', 'softwares','employees','itemCounts'));
    }

    /**
     * Showing the Specific software Application with all of its user
     *
     * @return \Illuminate\Http\Response
     */

     public function items($item) {
        $current_userId = Auth()->user()->id;
        $current_user = User::find($current_userId);
        $date = Carbon::now();


        $softwaresView = DB::table('softwareusers')->where('software_id', $item)
        ->leftJoin('software', 'softwareusers.software_id', '=', 'software.id')
        ->leftJoin('employees', 'softwareusers.employee_id', '=', 'employees.id')
        ->get();

        foreach($softwaresView as $softwareView) {
            $softwareView->sname = Software::where('id', $item)->pluck('name')->first();
            $softwareView->ename = Employee::where('id', $softwareView->employee_id)->pluck('name')->first();
            $softwareView->count = Softwareuser::where('software_id', $item)->sum('price');
            $softwareView->ecount = Softwareuser::where('software_id', $item)->count();
            // dd($softwareView->count);
        }

        // dd($softwareView);
        
        return view('softwareuser.items', compact('current_user', 'softwaresView'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $current_userId = Auth()->user()->id;
        $current_user = User::find($current_userId);
        
        return view('softwareuser.create', compact('current_user'));
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
            'software_id' => 'required',
            'employee_id' => 'required',
            'price' => 'nullable',
            'sstatus' => 'nullable',
            'payment_date' => 'nullable|date_format:Y-m-d',
            'renewal_date' => 'nullable|date_format:Y-m-d',
            'credit_card' => 'nullable',
            'credit_holder' => 'nullable',
        ]);

        $softwareuser = new Softwareuser;
        $softwareuser->software_id = $request->input('software_id');
        $softwareuser->employee_id = $request->input('employee_id');
        $softwareuser->price = $request->input('price');
        $softwareuser->sstatus = $request->input('sstatus');
        $softwareuser->payment_date = $request->input('payment_date');
        $softwareuser->renewal_date = $request->input('renewal_date');
        $softwareuser->credit_card = $request->input('credit_card');
        $softwareuser->credit_holder = $request->input('credit_holder');
        $softwareuser->save();
        
        // Return Back
        return redirect('/software-user')->with('success', 'New user has been Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $current_userId = Auth()->user()->id;
        $current_user = User::find($current_userId);
        $softwareuser = Softwareuser::find($id);
        return view('softwareuser.show', compact('softwareuser', 'current_user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $current_userId = Auth()->user()->id;
        $current_user = User::find($current_userId);
        $softwareuser = Softwareuser::find($id);
        $softwareusers = Softwareuser::all();

        // dd( $software);
        return view('softwareuser.edit', compact('softwareuser', 'current_user','softwareusers'));
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
        $this->validate($request, [
            'software_id' => 'required',
            'employee_id' => 'required',
            'price' => 'nullable',
            'sstatus' => 'nullable',
            'payment_date' => 'nullable|date_format:Y-m-d',
            'renewal_date' => 'nullable|date_format:Y-m-d',
            'credit_card' => 'nullable',
            'credit_holder' => 'nullable',
        ]);

         // Create New List
         $softwareuser = Softwareuser::find($id);
         $softwareuser->software_id = $request->input('software_id');
         $softwareuser->employee_id = $request->input('employee_id');
         $softwareuser->price = $request->input('price');
         $softwareuser->sstatus = $request->input('sstatus');
         $softwareuser->payment_date = $request->input('payment_date');
         $softwareuser->renewal_date = $request->input('renewal_date');
         $softwareuser->credit_card = $request->input('credit_card');
         $softwareuser->credit_holder = $request->input('credit_holder');
         $softwareuser->save();
         
         // Return Back
         return redirect('/software-user')->with('success', 'Updated User List!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $softwareuser = Softwareuser::find($id);
        $softwareuser->delete();
        return redirect('/software-user')->with('success', 'User has Removed!');
    }
}
