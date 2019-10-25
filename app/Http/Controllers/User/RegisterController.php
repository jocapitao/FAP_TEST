<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Messages\MessagesController;
use App\Mail\RegistrationMail;
use App\Models\User\RegisterModel;
use App\Registration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /**
     * RegisterController constructor.
     * Sets the lang to en
     */
    public function __construct()
    {
        \App::setLocale('en');
    }

    /**
     * @return the view
     */
    public static function get_index()
    {
        $currency = UserController::get_user_currency(0, 1);

        if ($currency['status'] == true) {
            $currency = $currency['currency'];
        }
//		dd(session('guest_currency'));
        return view('auth.register.content', [
            'user_logged' => AuthController::get_user_status(),
            'user_currency' => [
                'user_currency' => [
                    'name' => $currency['name'],
                    'name_3' => $currency['name_3'],
                    'name_s' => $currency['name_s']
                ]
            ],
            'css' => [
                '<link rel="stylesheet" href="'.url('vendors/bower_components/smoke/dist/css/smoke.min.css').'" />'
            ],
            'js' => [
                '<script src="'.url('vendors/bower_components/smoke/dist/js/smoke.min.js').'" type="text/javascript"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/underscorejs/') . '/underscore.min.js"></script>',
            ]
        ]);
    }

    /**
     * @return the view of verification page
     */
    public static function get_index_verify_page($token)
    {
        $verifytoken = self::get_token_verify($token);

        if ($verifytoken['status'] == true) {
            return view('auth.register.verify.content', [
                'title' => trans('messages_register.verify_account_title_success'),
                'content' => trans('messages_register.verify_account_text_success', [
                    'url' => \App::make('url')->to('/')
                ]),
                'user_currency' => [
                    'user_currency' => UserController::get_user_currency((Auth::user() ? Auth::user()->id : 0), 1)
                ],
                'user_logged'    => AuthController::get_user_status(),
            ]);
        } else {
            return view('auth.register.verify.content', [
                'title' => trans('messages_register.verify_account_title_failed'),
                'content' => trans('messages_register.verify_account_text_failed'),
                'user_currency' => [
                    'user_currency' => UserController::get_user_currency((Auth::user() ? Auth::user()->id : 0), 1)
                ],
                'user_logged'    => AuthController::get_user_status(),
            ]);
        }

        /*if ($verifytoken['status'] == true) {
            return view('auth.register.verify.content');
        }*/

        //return view('auth.register.verify.content');
    }

    /**
     * Validates registration fields
     * And iniciates the registration process
     * @param Request $request
     * @return array|\Illuminate\Http\JsonResponse
     */
    public static function get_register(Request $request)
    {

//		dd($request->all());
        DB::beginTransaction();
        $validation = Validator::make($request->only([
            'name',
            'email',
            'username',
            'password',
            'password_confirmation',
            'tos', 'pp']),
            [
                'name' => 'required|min:3|max:250',
                'email' => 'required|email|unique:fap_users|max:250|min:3',
                'username' => 'required|unique:fap_users|max:250|min:3',
                'password' => 'required|confirmed',
                'tos' => 'required'
            ], MessagesController::registration());
        DB::commit();

        if ($validation->fails()) { #if the validations fails
            return response()->json([
                "status" => false,
                "messages" => $validation->errors()
            ], 200);
        }

        $passwordhashed = Hash::make($request->password, ['rounds' => 16]);

        DB::beginTransaction();
        $create = self::get_insert([
            "name" => $request->name,
            "username" => $request->username,
            "email" => $request->email,
            "password" => $passwordhashed,
            "privacy_policy" => ($request->pp == "on" ? 1 : 0),
            "terms_of_service" => ($request->tos == "on" ? 1 : 0),
            "marketing" => ($request->marketing == "on" ? 1 : 0),
        ]);

        if ($create['status'] == false) {
            DB::rollBack();
            return [
                'status' => false,
                'messages' => [trans('messages_register.register_error')],
                'type' => 'warning'
            ];
        }

        if ($create['status'] == true) {
            $get_user_id = UserController::get_userid_by_email($request->email, 0);

            if ($get_user_id['status'] == true) {
                $apply_default_settings = AccountSettingsController::insert_user_currency_lang($get_user_id);
                if ($apply_default_settings['status'] == false) {
                    DB::rollBack();
                    //TODO: make log
                }
            }

            $sendmail = self::get_sendregisteremail($request->email);
            //return $sendmail;

            if ($sendmail['status'] == true) {
                DB::commit();
                return ['status'=>true, 'content' => ['messages'=> [__('messages_register.register_success')]]];
            }

            DB::rollBack();
            return ['status' => false, 'messages' => ['did not send register email', $sendmail]];
        }

        return ['status' => false, 'messages' => ['unkown error once again']];
    }

    /**
     * Inserts to the db the user
     * @param $data
     * @return array - true or false
     */
    public static function get_insert($data)
    {
        try {
            \DB::beginTransaction();
            $insert = RegisterModel::insert_user($data);
            \DB::commit();
            if (!empty($insert)) {
                return ['status' => true, 'messages' => ['user insert']];
            } elseif (empty($insert)) {
                return ['status' => false, 'messages' => ['user not inserted']];
            }
        } catch (\Illuminate\Database\QueryException $e) {
            \DB::rollback();
            //return message
            return ['status' => false, 'e' => $e];
        } catch (\Exception $e) { #error occurred
            \DB::rollback();
            //return message
            return ['status' => false, 'e' => $e];
        }

        return ['status' => false, 'e' => 'Reached end.'];
    }

    /**
     * sends register email and creates creates token for it
     * @param $useremail
     * @return array
     */
    public static function get_sendregisteremail($useremail)
    {
        $token         = Hash::make($useremail);
        $friendlytoken = Crypt::encrypt($token);

        $get_userid = UserController::get_userid_by_email($useremail, 0);

        if ($get_userid['status'] == true) {
            $userid = $get_userid['userid'];
        } elseif ($get_userid['status'] == false) {
            return ['status' => false, 'messages' => ['useridnotfound']];
        }

        $data = [
            "user_id" => $userid,
            "token" => $token,
            "friendly_token" => $friendlytoken,
        ];

        $inserttoken = self::insert_registertoken($data);

        if ($inserttoken['status'] == true) {

            $sendmail = self::send_registration_email($useremail, $friendlytoken);

            if ($sendmail['status'] == true) {
                return ['status' => true];
            }

            return ['status' => false,
                'messages' => [
                    'COuldnt send mail'
                ], $sendmail
            ];
        } else {
            return ['status' => false,
                'messages' => [
                    'couldnt insert token failed in function previous',
                    $inserttoken
                ]
            ];
        }

        return ['status' => false,
            'messages' => [
                'Unkown error happened.',
            ],
        ];

//		return ['status' => true];
    }

    public static function get_token_verify($token)
    {
        $unfriendly    = Crypt::decrypt($token);
        $friendlytoken = $token;

        $tokendata = self::get_token_id($unfriendly, $friendlytoken);

        if ($tokendata['status'] == true) {
            if ($tokendata['content']->status == 1) {
                $tokenid           = $tokendata['content']->id;
                $updatetokenstatus = self::update_token_status($tokenid);

                if ($updatetokenstatus['status'] == true) {
                    $userid           = $tokendata['content']->user_id;
                    $updateuserstatus =
                        UserController::update_user_status($userid);
                    return $updateuserstatus;
                    if ($updateuserstatus['status'] == true) {
                        return ['status' => true];
                    }

                    return [
                        'status' => false,
                        'code' => 'outin'
                    ];
                }
            } elseif ($tokendata['content']->status == 0) {
                return ['status' => false, 'code' => 'used'];
            } else {
                return ['status' => false, 'code' => 'out1'];
            }
        }

        return ['status' => false, 'code' => 'error'];
    }

    public static function get_token_id($token, $friendlytoken)
    {
        try {
            \DB::beginTransaction();
            $get = RegisterModel::get_token_info($token, $friendlytoken);
            \DB::commit();
            if (count($get) > 0) {
                return ['status' => true, 'content' => $get[0]];
            }
            return ['status' => false, 'code' => 'nuttin found'];
        } catch (\Illuminate\Database\QueryException $e) {
            \DB::rollback();
            return ['status' => false, 'e' => $e];
        } catch (\Exception $e) { #error occurred
            \DB::rollback();
            return ['status' => false, 'e' => $e];
        }
    }

    /**
     * connects with db to insert token to db
     * @param $data
     * @return array
     */
    public static function insert_registertoken($data)
    {
        try {
            \DB::beginTransaction();
            $insert = RegisterModel::insert_registertoken($data);
            \DB::commit();
            if (!empty($insert)) {
                return ['status' => true];
            }
            return ['status' => false, 'messages' => ['Coudlnt insert token'], $insert];
        } catch (\Illuminate\Database\QueryException $e) {
            \DB::rollback();
            return ['status' => false, 'e' => $e, 'message' => 'before in mail ender'];
        } catch (\Exception $e) { #error occurred
            \DB::rollback();
            return ['status' => false, 'e' => $e, 'message' => 'before in mail ender'];
        }

        return ['status' => false,
            'messages' => [
                'Unkown error.'
            ]
        ];
    }

    public static function update_token_status($tokenid)
    {
        try {
            \DB::beginTransaction();
            $update = RegisterModel::update_token_status($tokenid);
            \DB::commit();

            if ($update == 1) {
                return ['status' => true];
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

    /**
     * sends the email of registration
     * @param $email
     * @param $friendlytoken
     * @return array
     */
    public static function send_registration_email($email, $friendlytoken)
    {
        $link = \App::make('url')->to('/register/verify/' . $friendlytoken);
        //$link    = base_url('/registration/verify/' . $friendlytoken);
        $content = [
            'link' => $link
        ];

        try {

            \Mail::to($email)->send(new RegistrationMail($content));
            return ['status' => true];
        } catch (\Exception $e) {
            return ['status' => false, 'e' => $e, 'message' => 'in mail ender'];
        }

        return ['status' => true];

    }
}
