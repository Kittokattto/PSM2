<?php

namespace App\Http\Controllers;


use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\User;

class PenggunaController extends Controller
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
        
		$user = User::orderBy('created_at','desc')->get();
				
		return view('pengguna.senarai',compact('user')); 
    }


        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        //
        return view('/pengguna/tambah');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/pengguna/tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userid = Auth::user()->id;
        $adminName = getUserName($userid);
        $this->validate($request, [
       
            'name' => 'required|string', 
            'phone' => 'required|min:10|max:15|regex:/^[- +()]*[0-9][- +()0-9]*$/',
            'email' => 'email|regex:/^([a-z0-9\+\-]+)(\.[a-z0-9\+\-]+)*@([a-z0-9\-]+\.)+([a-z]{2,6})$/',
            'address' => 'required|string',
            'password' => 'required|string',
            'role' => 'required'
        ]);
        
        try{

            //Set branch details
            
            // $user = new User;    
            // $user->name = trim($request->name);
            // $user->phone = trim($request->phone);
            // $user->email = $request->email;
            // $user->address = trim($request->address);
            // $user->department =$request->department;
            // $user->registerBy = $adminName;
            // $user->role = $request->role;
            // $user->password = $request->password;
            //TODO Used Helper to call User id

            $user = User::create([
                'name' => trim($request['name']),
                'email' => $request['email'],
                'address' => trim($request['address']),
                'department' => $request['department'],
                'phone' => trim($request['phone']),
                'registerBy' => $adminName,
                'role' => $request['role'],
                'password' => Hash::make($request['password'],
                
                ),
            ]);


            
          

        
            //redirect
            return redirect('/pengguna/senarai')->with('message','Branch Successfully Added');
            
        }
        catch(Exception $e){
            //throw new Exception('Throw exception test'); //enable this to test exceptions
            throw new Exception("Could not save data, Please contact us if it happends again.");
             return back()->withError($e->getMessage())->withInput();
        }


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
        $user = User::where('id','=',$id)->first();

        return view ('pengguna.edit',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::where('id','=',$id)->first();
   
        return view ('pengguna.edit',compact('user'));
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
        //
        // $tbl_custom_fields = CustomField::find($id);
		// $tbl_custom_fields->form_name=Input::get('formname');
		// $tbl_custom_fields->label=Input::get('labelname');
		// $tbl_custom_fields->type=Input::get('typename');
		// $tbl_custom_fields->required=Input::get('required');
		// $tbl_custom_fields->always_visable=Input::get('visable');
		
        $this->validate($request, [
       
            'name' => 'string', 
            'phone' => 'min:10|max:15|regex:/^[- +()]*[0-9][- +()0-9]*$/',
            'email' => 'email|regex:/^([a-z0-9\+\-]+)(\.[a-z0-9\+\-]+)*@([a-z0-9\-]+\.)+([a-z]{2,6})$/',
            'address' => 'string',

            'role' => ''
        ]);
            $user = User::find($id);    
            $user->name = trim($request->name);
            $user->phone = trim($request->phone);
            $user->email = $request->email;
            $user->address = trim($request->address);
            $user->department =$request->department;
            $user->role = $request->role;
    
		$user->save();
		return redirect('/pengguna/senarai')->with('message','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
