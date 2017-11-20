<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use That0n3guy\Transliteration;
use App\Role;
use App\Permission;
use App\User;
use Validator;
use App\PermissionRole;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $permissions = PermissionRole::where('role_id', $request->session()->get('roleId'))
                        ->join('permissions','permission_role.permission_id','=','permissions.id')
                        ->get();
        
        return response()->json([
            'permissions' => $permissions
        ],200,[],JSON_PRETTY_PRINT);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        $name = \Transliteration::clean_filename($request->name);
        $permission = new Permission();
        $permission->name = strtolower(str_replace('_','-',$name));
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        $permission->save();

        return response()->json([
                'message' => 'Success',
                'title' => 'success',
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
        $permission = Permission::find($id);
        
        return response()->json([
            'permission' => $permission
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

        $permission = new Permission();

        $permission->where('id',$id)->update([
            'name' => strtolower(\Transliteration::clean_filename($request->name)),
            'display_name' => $request->display_name,
            'description' => $request->description,
        ]);

        
        
        return response()->json([
                'message' => 'Success',
                'title' => 'success',
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
        Permission::find($id)->delete();

        return response()->json([
            'message' => 'Success',
            'title' => 'success',
            'type' => 'success',
        ]); 
    }
}