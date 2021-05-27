<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCmsRequest;
use App\Http\Requests\UserEditCmsRequest;
use App\Models\User;
use Illuminate\Http\Request;
use DB, Session;

class UserManagmentController extends MainController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        User::get_users(self::$viewData);
        return view('cms.users_index', self::$viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = DB::table('permissions')
            ->select('id', 'pname')
            ->get();
        self::setIndex('permissions', $permissions);
        return view('cms.users_add', self::$viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCmsRequest $request)
    {
        User::cms_save_new($request);
        return redirect('cms/users');
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
    public function edit($id)
    {
        $permissions = DB::table('permissions')
            ->select('id', 'pname')
            ->get();
        $user_permissions = DB::table('user_permissions')
            ->where('uid', '=', $id)
            ->get()[0];
        self::setIndex('permissions', $permissions);
        self::setIndex('user', User::find($id));
        self::setIndex('user_permissions', $user_permissions);
        return view('cms.users_edit', self::$viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditCmsRequest $request, $id)
    {
        User::cms_update_user($request, $id);
        return redirect('cms/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        Session::flash('all', 'User has been deleted');
    }
}