<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Messages\GeneralMessagesController;
use App\Http\Controllers\StaticInfoController;

use App\Models\Media\Media;
use App\Models\User\UserMedia;
use App\Models\User\UserModel;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class EditProfileController extends Controller
{
    public function __construct()
    {

    }

    public static function index()
    {
        $is_host = 0;
        if (AuthController::get_user_status() === true) {
            $is_host = \Auth::user()->is_host;
        }

        $userinfo = UserController::get_user_profile_info(\Auth::user()['id']);

        if ($userinfo['status'] == true) {
            if ($userinfo['profile'] == 0) { #return with default data cuz nothing is setup yet
                return view('pages.edit-profile.content', [
                    'user_logged' => AuthController::get_user_status(),
                    'user_info' => (object)[
                        'first_name' => 'Define',
                        'last_name' => 'Your Name',
                        'description' => 'Tell us more about you and your likings.',
                        'contact' => 'A way to people contact you',
                        'country' => ''/*'Where are you from'*/,
                        'gender' => ''/*'How do you identify yourself?'*/,
                        'dob' => '' /*'What is your age'*/,
                        'city' => '' /*'In what city?'*/,
                        'email' => '' /*'Leave your email address for an easier way of contact.'*/,
                    ],
                    'picture' => self::get_user_profile_picture(\Auth::user()['id']),
                    'countries' => StaticInfoController::country_list(),
                    'genders' => StaticInfoController::gender_list(),
                    'languages' => StaticInfoController::getLanguages(),
                    'is_host' => $is_host,
                    'css' => [
                        '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/noty/') . '/lib/noty.css"/>',
                        '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/noty/') . '/lib/themes/mint.css"/>',
                        '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/selectize/') . '/dist/css/selectize.legacy.css"/>',
                        '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/bootstrap-select/') . '/dist/css/bootstrap-select.min.css"/>',
                        '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/dropzone.js') . '/dist/min/dropzone.min.css"/>',

                    ],
                    'js' => [
                        '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/noty/') . '/lib/noty.min.js"></script>',
                        '<script type="text/javascript" src="' . \App::make('url')->to('vendors/node_modules/cleave.js/') . '/dist/cleave.min.js"></script>',
                        '<script type="text/javascript" src="' . \App::make('url')->to('vendors/node_modules/cleave.js/') . '/dist/addons/cleave-phone.i18n.js"></script>',
                        '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/selectize/') . '/dist/js/standalone/selectize.min.js"></script>',
                        '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/fastsearch/') . '/dist/fastsearch.min.js"></script>',
                        '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/fastsearch/') . '/src/fastsearch.js"></script>',
                        '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/bootstrap-select/') . '/dist/js/bootstrap-select.min.js"></script>',
                        '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/dropzone.js/') . '/dist/min/dropzone.min.js"></script>',
                        '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/captions/') . '/captions.js"></script>',
                        '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/underscorejs/') . '/underscore.min.js"></script>',

                    ]
                ]);
            }

            if ($userinfo['profile'] == 1) { #return with the user info that exists
                return view('pages.edit-profile.content', [
                    'user_logged' => AuthController::get_user_status(),
                    'user_info' => $userinfo['profile_info'],
                    'countries' => StaticInfoController::country_list(),
                    'genders' => StaticInfoController::gender_list(),
                    'languages' => StaticInfoController::getLanguages(),
                    'picture' => self::get_user_profile_picture(\Auth::user()['id']),
                    'is_host' => $is_host,
                    'css' => [
                        '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/noty/') . '/lib/noty.css"/>',
                        '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/noty/') . '/lib/themes/nest.css"/>',
                        '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/selectize/') . '/dist/css/selectize.legacy.css"/>',
                        '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/bootstrap-select/') . '/dist/css/bootstrap-select.min.css"/>',
                        '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/dropzone.js') . '/dist/min/dropzone.min.css"/>',
                    ],
                    'js' => [
                        '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/noty/') . '/lib/noty.js"></script>',
                        '<script type="text/javascript" src="' . \App::make('url')->to('vendors/node_modules/cleave.js/') . '/dist/cleave.min.js"></script>',
                        '<script type="text/javascript" src="' . \App::make('url')->to('vendors/node_modules/cleave.js/') . '/dist/addons/cleave-phone.i18n.js"></script>',
                        '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/selectize/') . '/dist/js/standalone/selectize.min.js"></script>',
                        '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/fastsearch/') . '/dist/fastsearch.min.js"></script>',
                        '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/fastsearch/') . '/src/fastsearch.js"></script>',
                        '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/bootstrap-select/') . '/dist/js/bootstrap-select.min.js"></script>',
                        '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/dropzone.js/') . '/dist/min/dropzone.min.js"></script>',
                        '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/captions/') . '/captions.js"></script>',],
                        '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/underscorejs/') . '/underscore.min.js"></script>',
                ]);
            }

        }
    }

    public static function get_user_profile_picture($user_id, $status = 1)
    {
        $picture = null;
        try {
            $media_id = UserMedia::select(['media_id'])->where(['user_id' => $user_id, 'status' => $status])->get()->first();

            if ($media_id) {
                $media = Media::where(['id' => $media_id['media_id']])->get()->first();
                if ($media) {
                    $picture = $media;
                }
            }
        } catch (\Exception $e) {
            return ['status' => false, 'e' => $e];
        }

        return $picture;
    }

    public static function get_user_profile_info($field_to_search, $userid, $status = 1)
    {
        try {
            \DB::beginTransaction();
            $get = UserModel::get_user_profile_info_custom($field_to_search, $userid, $status);
            \DB::commit();

            if (count($get) > 0) {
                return ['status' => true, 'field' => $get[0]->$field_to_search];
            }
            return ['status' => false];
        } catch (\Illuminate\Database\QueryException $e) {
            \DB::rollback();
            //return message
            return ['status' => false, 'e' => $e];
        } catch (\Exception $e) { #error occurred
            \DB::rollback();
            //return message
            return ['status' => false, 'e' => $e];
        }
    }

    public static function insert_user_profile_info($data)
    {
        try {
            \DB::beginTransaction();
            $insert = UserModel::insert_user_profile_info($data);
            \DB::commit();

            if ($insert == 1) {
                return [
                    'status' => true,
                ];
            }
            return ['status' => false];
        } catch (\Illuminate\Database\QueryException $e) {
            \DB::rollback();
            //return message
            return ['status' => false, 'e' => $e];
        } catch (\Exception $e) { #error occurred
            \DB::rollback();
            //return message
            return ['status' => false, 'e' => $e];
        }
    }

    public static function update_user_profile_info($data, $userid, $status = 1)
    {
        try {
            \DB::beginTransaction();
            $update = UserModel::update_user_profile_info($data, $userid, $status);
            \DB::commit();

            if ($update == 1) {
                return [
                    'status' => true,
                ];
            }
            return ['status' => false];
        } catch (\Illuminate\Database\QueryException $e) {
            \DB::rollback();
            //return message
            return ['status' => false, 'e' => $e];
        } catch (\Exception $e) { #error occurred
            \DB::rollback();
            //return message
            return ['status' => false, 'e' => $e];
        }
    }

    public static function simple_info_form(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'first_name_input' => 'required',
            'last_name_input' => 'required',
        ], GeneralMessagesController::profile_forms_simple_info());

        if ($validator->fails() == true) {
            return response()->json([
                "status" => false,
                "messages" => $validator->errors()
            ], 200);
        }

        $first_name = htmlspecialchars($request->first_name_input);
        $last_name  = htmlspecialchars($request->last_name_input);

        $userinfo = UserController::get_user_profile_info(\Auth::user()->id);

        if ($userinfo['status'] == true) {

            if ($userinfo['profile'] == 0) {
                $insert = UserController::insert_user_names([
                    'first_name' => $first_name, 'last_name' => $last_name
                ], \Auth::user()->id);

                if ($insert['status'] == true) {
                    return ['status' == true];
                }

                return ['status' => false];
            }

            if ($userinfo['profile'] == 1) {

                $get_user_names = UserController::get_user_names(\Auth::user()->id);

                if ($get_user_names['status'] == true) {

                    if ($get_user_names['user_names']->first_name == $first_name && $get_user_names['user_names']->last_name == $last_name) {
                        return [
                            'status' => false,
                            'messages' =>
                                [
                                    trans('profile.profile_edit_nothing_has_changed')
                                ]
                        ];
                    }
                }

                $update = UserController::update_user_names([
                    'first_name' => $first_name, 'last_name' => $last_name
                ], \Auth::user()->id);

                if ($update['status'] == true) {
                    return [
                        'status' => true,
                        'messages' => [trans('profile.profile_edit_success')],
                        'first_name' => $first_name,
                        'last_name' => $last_name,
                    ];
                }

                return [
                    'status' => false,
                    'messages' => [
                        trans('profile.profile_generic_error_occurred')
                    ]
                ];
            }

            return ['status' => false,
                'messages' => [
                    trans('profile.profile_generic_error_occurred')
                ]
            ];
        }


        return ['status' => false,
            'messages' => [
                trans('profile.profile_generic_error_occurred')
            ]
        ];
    }

    public static function description_form(Request $request)
    {

        $validator = \Validator::make($request->all(), [
            'description_input' => 'required',
        ], GeneralMessagesController::profile_forms_description());

        if ($validator->fails() == true) {
            return response()->json([
                "status" => false,
                "messages" => $validator->errors()
            ], 200);
        }

        $description = htmlspecialchars($request->description_input);

        $userinfo = UserController::get_user_profile_info(\Auth::user()->id);

        if ($userinfo['status'] == true) {

            if ($userinfo['profile'] == 0) {
                $insert = UserController::insert_user_description($description
                    , \Auth::user()->id);

                if ($insert['status'] == true) {
                    return ['status' == true];
                }

                return ['status' => false];
            }

            if ($userinfo['profile'] == 1) {
                $get_user_description =
                    UserController::get_user_description(\Auth::user()->id);

                if ($get_user_description['status'] == true) {
                    if ($get_user_description['description'] == $request->description_input) {
                        return [
                            'status' => false,
                            'messages' =>
                                [
                                    'No changes were made.'
                                ]
                        ];
                    }
                }

                $update =
                    UserController::update_user_description($request->description_input, \Auth::user()->id);


                if ($update['status'] == true) {
                    return [
                        'status' => true,
                        'messages' => ['success update'],
                        'description' => $description
                    ];
                }

                return ['status' => false,
                    'messages' => [
                        'fail upadte'
                    ]
                ];
            }

            return ['status' => false,
                'messages' => [
                    'Unkown error as ocurred'
                ]
            ];
        }


        return ['status' => false,
            'messages' => [
                'Unkown error as ocurred'
            ]
        ];
    }

    public static function info_form(Request $request)
    {

        $fields = [
            'contact' => htmlspecialchars($request->contact_input),
            'email' => htmlspecialchars($request->email_input),
            'country' => htmlspecialchars($request->country_input),
            'city' => htmlspecialchars($request->city_input),
            'gender' => htmlspecialchars($request->gender_input),
            'languages' => json_encode($request->languages_input),
            'dob' => htmlspecialchars($request->age_input),
        ];

        $fields_validated = [];

//		dd($fields);
        $debug = [];
        foreach ($fields as $field => $value) {
            if ($value != '') {
                $get_current_value =
                    self::get_user_profile_info($field, \Auth::user()->id);
                $debug[]           = $get_current_value;
                if ($get_current_value['status'] == true) {
                    if ($get_current_value['field'] != $value) {
                        $fields_validated[$field] = $value;
                    }
                    continue;
                }
                return [
                    'status' => false,
                    'messages' => [
                        trans('profile.profile_generic_error_occurred')
                    ]
                ];
            }
        }

        if (empty($fields_validated)) {
            return [
                'status' => false,
                'messages' => [
                    trans('profile.profile_edit_nothing_has_changed')
                ]
            ];
        }

        $userinfo = UserController::get_user_profile_info(\Auth::user()->id);

        if ($userinfo['status'] == true) {

            if ($userinfo['profile'] == 0) {
                $fields_validated['userid'] = \Auth::user()->id;
                $insert                     = self::insert_user_profile_info(
                    $fields_validated
                );

                if ($insert['status'] == true) {
                    return [
                        'status' == true,
                        'messages' => [
                            'success insert'
                        ],
                        'contact' => $fields['contact'],
                        'email' => $fields['email'],
                        'country' => $fields['country'],
                        'city' => $fields['city'],
                        'gender' => $fields['gender'],
                        'dob' => $fields['dob'],
                    ];
                }

                return ['status' => false,
                    'messages' => [
                        trans('profile.profile_generic_error_occurred')
                    ],];
            }

            if ($userinfo['profile'] == 1) {
                $update =
                    self::update_user_profile_info(
                        $fields_validated,
                        \Auth::user()->id
                    );

                if ($update['status'] == true) {
                    return [
                        'status' => true,
                        'messages' => [
                            trans('profile.profile_edit_success')
                        ],
                        'contact' => $fields['contact'],
                        'email' => $fields['email'],
                        'country' => $fields['country'],
                        'city' => $fields['city'],
                        'gender' => $fields['gender'],
                        'dob' => $fields['dob'],
                    ];
                }

                return ['status' => false,
                    'messages' => [
                        trans('profile.profile_generic_error_occurred')
                    ]
                ];
            }

            return [
                'status' => false,
                'messages' => [
                    trans('profile.profile_generic_error_occurred')
                ]
            ];
        }


        return [
            'status' => false,
            'messages' => [
                trans('profile.profile_generic_error_occurred')
            ]
        ];
    }

    public static function social_networks_form(Request $request)
    {

    }

    public function upload_file(Request $request)
    {
        if ($request->file('file')->isValid()) {
            if (substr($request->file('file')->getMimeType(), 0, 5) != 'image') {
                return ['status' => false, "errors" => ['Only images allowed']];
            }

            try {
                $img           = Image::make($request->file('file'))->fit(600);
                $filename = rand().rand().'.png';
                $img->save(storage_path('app/public/profiles/' . $filename), 50);
            } catch (\Exception $e) {
                return ['status' => false, 'Uknown error.', 'e' => $e];
            }

            $fileMIMETYPE   = $request->file('file')->getMimeType();
            $serverFileName = $filename; //"slug"

            DB::beginTransaction();

            try {
                $media = new Media();

                $media->name             = $filename;
                $media->slug             = StaticInfoController::slugify($filename);
                $media->base_path        = 'images/profiles/' . $serverFileName;
                $media->mime             = $fileMIMETYPE;
                $media->user_uploader_id = Auth::user()->id;

                $media->save();

            } catch (\Exception $e) {
                return ['status' => false, 'e' => $e];
            }

            $insert_id = $media->id;
            $image     = null;

            $checktest = UserMedia::where(['user_id' => \Auth::user()->id])->get();

            if (count($checktest) > 0) {
                try {
                    $update = UserMedia::where(['user_id' => \Auth::user()->id])->update([
                        'media_id' => $insert_id,
                    ]);

                    if ($update) {
                        $image = $update;
                    }
                } catch (\Exception $e) {
                    DB::rollBack();
                    return ['status' => false, 'e' => $e];
                }

            } else {
                try {
                    $insert = UserMedia::insert([
                        'media_id' => $insert_id,
                        'user_id' => \Auth::user()->id,
                    ]);
                    if ($insert) {
                        $image = $insert;
                    }
                } catch (\Exception $e) {
                    DB::rollBack();
                    return ['status' => false, 'e' => $e];
                }
            }
            DB::commit();
            return ['status' => true, 'image' => Media::select('base_path')->where(['id' => $insert_id])->get()->first()];

            return;
        }
    }


}
