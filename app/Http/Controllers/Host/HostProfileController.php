<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\LeaguesClubs\LeaguesClubsController;
use App\Models\Host\HostProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\StaticInfoController;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Http\Controllers\User\UserController;

class HostProfileController extends Controller
{
    public static function get_index()
    {
        $clubs   = LeaguesClubsController::get_all();
        $profile = self::get_profile(Auth::user()->id);

        return view("pages.host.edit-profile", [
            'user_logged' => AuthController::get_user_status(),
            'clubs' => $clubs,
            'languages' => StaticInfoController::getLanguages(),
            'profile' => $profile,
            'user_currency' => [
                'user_currency' => UserController::get_user_currency((Auth::user() ? Auth::user()->id : 0), 1)
            ],
            'js' => [
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/bootstrap-select/') . '/dist/js/bootstrap-select.min.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/character-counter/') . '/jquery.character-counter.min.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/noty/') . '/lib/noty.min.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/underscorejs/') . '/underscore.min.js"></script>',
            ],
            'css' => [
                '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/bootstrap-select/') . '/dist/css/bootstrap-select.min.css"/>',
                '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/noty/') . '/lib/noty.css"/>',
                '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/noty/') . '/lib/themes/mint.css"/>',

            ],
        ]);
    }

    public static function get_profile($user_id = 0, $status = 1)
    {
        if ($user_id == 0) {
            return ['status' => FALSE, 'content' => ['message' => 'Error with your profile']];
        }

        try {
            $get = HostProfile::select([
                'first_name', 'last_name', 'description', 'club', 'clubs',
                'other_clubs', 'languages'
            ])->where(['status' => $status, 'user_id' => $user_id])->get()->first();
        } catch (\Exception $e) {
            return ['status' => FALSE, 'e' => $e];
        }
        if ($get) {
            return ['status' => TRUE, 'content' => ['data' => $get]];
        }

        return ['status' => FALSE, 'content' => ['messages' => ['User profile not set up']]];
    }

    public static function update($manual = [], $user_id = 0, Request $request)
    {
        if (!empty($manual)) {
            $data = [];
        } else {
            $data = [
                'first_name' => $request->name,
                'description' => $request->description,
                'club' => $request->club,
                'clubs' => $request->clubs,
                'other_clubs' => $request->other_clubs,
                'languages' => $request->langs,
            ];

            $validator = Validator::make($data, [
                'first_name' => 'required|max:250|min:3',
                'description' => 'required|max:500|min:25',
                'club' => 'required',
                'clubs' => '',
                'other_clubs' => 'required',
                'languages' => 'required',
            ]);

            if ($validator->fails()) {
                return $validator->errors();
            }
        }

        if ($user_id == 0) {
            $user_id = Auth::user()->id;
        }

        DB::beginTransaction();
        try {
            $update = HostProfile::where(['user_id' => $user_id])->update([
                'first_name' => $data['first_name'],
                'description' => $data['description'],
                'club' => $data['club'],
                'clubs' => json_encode($data['clubs']),
                'other_clubs' => $data['other_clubs'],
                'languages' => json_encode($data['languages']),
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return ['status' => FALSE, 'error' => $e];
        }
        if ($update == 1) {
            DB::commit();
            return ['status' => TRUE, 'content' => ['messages' => ['Updated with success!']]];
        } else {
            DB::rollBack();
            return ['status' => FALSE, 'content' => ['messages' => ['Unkown error as ocurred!']]];
        }
    }
}
