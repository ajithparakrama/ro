<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\DataTables\userDatatable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\DataTables\SusUsersDatatable;

class userController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(userDatatable $dataTable)
    {
        return $dataTable->render('users.index');
    }

    public function suspendusers(SusUsersDatatable $datatable)
    { 
        return $datatable->render('users.suspendusers');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
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
            'name' => 'required',
            'nic'=> 'required',
            'user_name'=> 'required|unique:users,user_name',
            'phone'=> 'required', 
            'date_of_birth'=> 'required|date',
            'address' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

    

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);    

        $user = User::create($input);
        $user->assignRole($request->input('roles'));    

        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('users.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'nic'=> 'required', 
            'phone'=> 'required', 
            'date_of_birth'=> 'required|date',
            'address' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id, 
            'roles' => 'required'
        ]);
 
    
        $input = $request->all();
 
        DB::beginTransaction();
        try
        {
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$user->id)->delete();
    
        $user->assignRole($request->input('roles'));
        DB::commit();
    } catch (Exception $e)
    {
        DB::rollback(); 
//		return response()->json(['error' => $e->getMessage()]);
        return Redirect::back()->withInput(Input::all())->with('error',$e->getMessage());
    } catch (Throwable $e)
    {
        DB::rollback(); 
        //return response()->json(['error' => $e->getMessage()]);
        return Redirect::back()->withInput(Input::all())->with('error',$e->getMessage());
    }
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        
        $user->update(['active'=>0]);
        return redirect()->route('users.index')
                ->with('success','User deleted successfully');
    }

    public function suspend($user){
        User::where('id',$user)->update(['active'=>'0']); 
         return redirect()->route('users.index')->with( 'message',' account suspended');
    }

    public function activate($user){
        User::where('id',$user)->update(['active'=>'1']); 
        return redirect()->route('users.index')->with( 'message',' account activated');
    }
 
    public function resetpass($user){
        User::where('id',$user)->update(['password' => Hash::make('abc@123')]); 
        return redirect()->route('users.index')->with( 'message', ' Password Reset as abc@123');
    }
}
