<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use That0n3guy\Transliteration;
use Validator;
use App\Role;
use App\Permission;
use App\User;

class RoleController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();        

        return response()->json([
            'roles' => $roles
        ]);
        //return view('advancetrust.roles.role',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('advancetrust.roles.rolecreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $path = Request::path();

        // $explode = explode('/',$path);


        // $from = 'form';
        // if(in_array('api',$explode)){
        //     $from = 'api';
        // }

        // $via = $from;
        // if($version != ''){
        //     $via .= '-'.$version;
        // }

        // $rules = [
        //     'name' => 'required',
        //     'display_name' => 'required',
        //     'description' => 'required'
        // ];

        // $validator = Validator::make($request->all(), $rules);

        // if($validator->fails()){
        //     return response()->json([
        //         'message' => $validator->errors()->all(),
        //         'title' => 'Error',
        //         'type' => 'error',
        //     ]); 
        // }
        

        $role = new Role();
        $role->name = strtolower(\Transliteration::clean_filename($request->name));
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();



        return response()->json([
            'message' => 'Success',
            'title' => 'Success',
            'type' => 'success',
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        
        return response()->json([
            'role' => $role
        ]);        
    }    

    /**
     * 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storePermission(Request $request,$id)
    {        

        $role = new Role();        
        $role_permission = $role->where('id',$id)->first()->permissions;

        $rules = [
            'permission' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors()->all(),
                'title' => 'Error',
                'type' => 'error',
            ]); 
        }

        foreach($role_permission as $detachPermission){            
            $role->where('id',$id)->first()->detachPermission($detachPermission->id);
        }

        if(count($request->permission) > 0)
        {
            $role->where('id',$id)->first()->attachPermissions($request->permission);
        }
        
        
        return response()->json([
            'message' => 'Success',
            'title' => 'Success',
            'type' => 'success',
        ]);
        
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

        $role = new Role();        
        $role_permission = $role->where('id',$id)->first()->permissions;

        $rules = [
            'name' => 'required',
            'display_name' => 'required',
            'description' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors()->all(),
                'title' => 'Error',
                'type' => 'error',
            ]); 
        }

        $role = new Role();

        $role->where('id',$id)->update([
            'name' => strtolower(\Transliteration::clean_filename($request->name)),
            'display_name' => $request->display_name,
            'description' => $request->description,
        ]);
        
        return response()->json([
            'message' => 'Success',
            'title' => 'Success',
            'type' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::find($id)->delete();        

        return response()->json([
            'message' => 'Success',
            'title' => 'Success',
            'type' => 'success',
        ]);
    }
}