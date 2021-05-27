<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB, Hash, Session;
use App\Models\ImageModel;

class User extends MainModel
{
    use HasFactory;
    static function updateInfo($user)
    {
        Session::put('user_name', $user->name);
        Session::put('user_id', $user->id);
        if (!empty($user->image)) {
            Session::put('user_image', $user->image);
        }
        Session::put('encrypted_password', $user->password);
        Session::put('user_email', $user->email);
    }
    static public function validate($email, $password)
    {
        $valid = false;

        $user = DB::table('users AS u')
            ->join('user_permissions AS up', 'u.id', '=', 'up.uid')
            ->join('permissions AS p', 'p.id', '=', 'up.pid')
            ->select('u.*', 'p.pname', 'up.pid')
            ->where('u.email', '=', $email)->first();

        if ($user) {
            if (Hash::check($password, $user->password)) {
                $valid = true;
                self::updateInfo($user);
                Session::flash('user', 'Welcome ' . $user->name);
                $user->pname == 'Admin' && Session::put('is_admin', true);
            }
        }

        return $valid;
    }
    static public function save_new($request)
    {
        $user = new self();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->country = $request['country'];
        $user->save();
        DB::table('user_permissions')->insert(
            ['uid' => $user->id, 'pid' => 2]
        );
        self::updateInfo($user);
        Session::flash('user', 'Welcome ' . $user->name);
    }
    static public function cms_save_new($request)
    {
        $user = new self();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->country = $request['country'];
        if ($request->hasFile('image')) {
            $image_name = ImageModel::setImage(null, $request);
            $user->image = $image_name;
        } else {
            $user->image = '';
        }
        $user->save();
        DB::table('user_permissions')->insert(
            ['uid' => $user->id, 'pid' => $request['permission']]
        );
        Session::flash('all', "User: '{$user->name}' has been created");
    }
    static public function update_user($request)
    {
        $user = self::find(Session::get('user_id'));
        $user->name = $request['name'];
        $user->email = $request['email'];
        if ($request['old_password']) {
            if (!Hash::check($request['old_password'], $user->password)) {
                Session::flash('error', 'Old Password Incorrect');
                return;
            }
            if (!empty($request['password'])) {
                $user->password = bcrypt($request['password']);
            }
        }
        $user->country = $request['country'];
        $image_name = ImageModel::setImage(null, $request);
        if ($image_name) $user->image = $image_name;
        $user->save();
        self::updateInfo($user);
        Session::flash('user', 'Details have been updated!');
    }
    static public function cms_update_user($request, $id)
    {
        $user = self::find($id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        if (!empty($request['password'])) {
            $user->password = bcrypt($request['password']);
        }
        $user->country = $request['country'];
        $image_name = ImageModel::setImage(null, $request);
        if ($image_name) $user->image = $image_name;
        $user->save();
        DB::table('user_permissions')
            ->where('uid', '=', $request['id'])
            ->update(
                ['pid' => $request['permission']]
            );
        Session::flash('all', "User: '{$user->name}' has been edited");
    }
    static public function get_users(&$viewData)
    {
        $count = User::count();
        $viewData['users'] = DB::table('users AS u')
            ->join('user_permissions AS up', 'u.id', '=', 'up.uid')
            ->join('permissions AS p', 'p.id', '=', 'up.pid')
            ->select('u.*', 'p.pname', 'up.pid')
            ->take($count)
            ->paginate(10);
    }
}