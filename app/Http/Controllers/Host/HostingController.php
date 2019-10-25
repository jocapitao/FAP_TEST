<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Currency\CurrencyController;
use App\Http\Controllers\Currency\RatesController;
use App\Http\Controllers\Houses\HouseController;
use App\Http\Controllers\Houses\HouseRulesController;
use App\Http\Controllers\StaticInfoController;
use App\Http\Controllers\User\UserController;
use App\Models\Currencies;
use App\Models\Languages;
use App\Models\Media\MediaHouse;
use App\Services\Host\HostHouseService;
use App\Services\User\UserNecessairsService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\User\AuthController;
use App\Models\User\CurrencyLang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Carbon\Carbon;

class HostingController extends Controller
{
    public function __construct()
    {
        $this->user_needs = new UserNecessairsService();
        $this->host_houses = new HostHouseService();
    }

    public static function get_index()
    {

        CurrencyController::cache_currencies();

        if (AuthController::get_user_status() == 0) {
            return redirect('');
        }

        if (\Auth::user()->is_host != 1) {
            return ['not alowed'];
        }

        return view('pages.host.host-management', [
            'user_logged' => AuthController::get_user_status(),
            'user_currency' => ['user_currency' => UserController::get_user_currency(Auth::user()->id, 1)],
            'css' => [
                '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/noty/') . '/lib/noty.css"/>',
                '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/noty/') . '/lib/themes/nest.css"/>', '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/selectize/') . '/dist/css/selectize.legacy.css"/>',
            ],
            'js' => [
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/noty/') . '/lib/noty.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/node_modules/cleave.js/') . '/dist/cleave.min.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/node_modules/cleave.js/') . '/dist/addons/cleave-phone.i18n.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/selectize/') . '/dist/js/standalone/selectize.min.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/chart.js/') . '/chart.min.js"></script>',
            ]
        ]);

    }

    public static function get_index_new_house(Request $request)
    {
        /********/
        /*Setting global form id to sync images with form*/
        $currenttime = Carbon::now();
        session([
            'form_images' => [
                'id' => hash('md5', $currenttime)
            ]
        ]);
        /********/

        if (AuthController::get_user_status() == 0) {
            return redirect('');
        }
        if (\Auth::user()->is_host != 1) {
            return ['not alowed'];
        }

        $currency = UserController::get_user_currency(\Auth::user()->id, 1);

        if ($currency['status'] == true) {
            $currency = $currency['currency'];
        }

        $language = UserController::get_user_language(\Auth::user()->id);
        if ($language['status'] == true) {
            $language = $language['language'];
        }

        $beds        = HouseController::get_beds($language['id']);
        $commodities = HouseController::get_house_properties();
//		dd($commodities);

        return view('pages.host.add-house', [
            'user_logged' => AuthController::get_user_status(),
            'user_currency' => [
                'user_currency' => [
                    'name' => $currency['name'],
                    'name_3' => $currency['name_3'],
                    'name_s' => $currency['name_s']
                ]
            ],
            'user_language' => [
                'name' => $language['name'],
                'name_2' => $language['name_2']
            ],
            'beds' => [
                'bedroom_beds' => $beds['bedroom_beds'],
                'common_spaces_beds' => $beds['common_spaces_beds']
            ],
            'commodities' => [
                $commodities,
            ],
            ///////////////////////////////////
            'css' => [
                '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/noty/') . '/lib/noty.css"/>',
                '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/noty/') . '/lib/themes/nest.css"/>',
                '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/selectize/') . '/dist/css/selectize.legacy.css"/>',
                '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/jquery-labelauty/') . '/source/jquery-labelauty.css"/>',

                '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/fileupload') . '/dist/css/component.css"/>',
                '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/fileupload') . '/dist/css/normalize.css"/>',
                '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/dropzone.js') . '/dist/min/dropzone.min.css"/>',
                '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/bootstrap-select/') . '/dist/css/bootstrap-select.min.css"/>',
                '<link rel="stylesheet" href="' . \App::make('url')->to('vendors/bower_components/summernote/') . '/dist/summernote.css"/>',

                '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">',
                '<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">',
            ],
            'js' => [
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/noty/') . '/lib/noty.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/node_modules/cleave.js/') . '/dist/cleave.min.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/node_modules/cleave.js/') . '/dist/addons/cleave-phone.i18n.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/selectize/') . '/dist/js/standalone/selectize.min.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/jquery-labelauty/') . '/source/jquery-labelauty.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/mask/') . '/dist/jquery.mask.min.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/currencyFormatter.js/') . '/dist/currencyFormatter.min.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('js/') . '/houselist.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('js/') . '/calculatecosts.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('js/') . '/rates.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('js/') . '/divisionmaker.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/dropzone.js/') . '/dist/min/dropzone.min.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/bootstrap-select/') . '/dist/js/bootstrap-select.min.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/bootstrap-input-spinner/') . '/src/bootstrap-input-spinner.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/underscorejs/') . '/underscore.min.js"></script>',
//			    '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/summernote/') . '/dist/summernote.min.js"></script>',

                '<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>',
                '<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>',
            ]
        ]);

    }

    public function get_index_my_houses () {
        $custom = [
            'js' => [
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/underscorejs/') . '/underscore.min.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/money.js/') . '/money.min.js"></script>',
                '<script type="text/javascript" src="' . \App::make('url')->to('vendors/bower_components/currencyFormatter.js/') . '/dist/currencyFormatter.min.js"></script>',
            ]
        ];

        return view('pages.host.my-houses', collect($custom)->merge($this->user_needs->fetch_user_needs(Auth::user()->id)));
    }

    /**
     * gets compiled information about the house
     *
     * @return array
     */
    public function get_hoster_houses () {
        return $this->host_houses->get_list_of_houses(Auth::user()->id);
    }

    public static function get_house_rules($type)
    {
        $user_lang = UserController::get_user_language(\Auth::user()->id);
        $lang      = 1;
        if ($user_lang['status'] == true) {
            $lang = $user_lang['language']['id'];
        }

        $get = HouseRulesController::get_rules_names($lang);

        if ($get['status'] == true) {
            if ($type == 'commaed') {
                $commaed = '';
                foreach ($get['get'] as $n => $name) {

                    $commaed .= $name->name . ',';
                }

                return [
                    'status' => true,
                    'messages' => [
                        'commaed' => $commaed
                    ]
                ];
            } elseif ($type == 'list') {
                return [
                    'status' => true,
                    'messages' => [
                        'list' => $get['get']
                    ]
                ];
            }

            return ['status' => false,
                'message' => [
                    'Unknown error.'
                ]
            ];
        }

        return ['status' => false,
            'message' => [
                'Could not fetch data'
            ]
        ];

    }

    public function upload_file(Request $request)
    {
        if ($request->file('file')->isValid()) {
            if (substr($request->file('file')->getMimeType(), 0, 5) != 'image') {
                return ['status' => false, "errors" => ['Only images allowed']];
            }

            try {
                $fileName      = str_replace(" ", "", $request->file('file')->getClientOriginalName());
                $fileNameClean = str_replace(" ", "", $request->file('file')->getClientOriginalName());
                $request->file('file')->storeAs('public/houses', session()->all()['form_images']['id'] . '-' . $fileNameClean);
            } catch (\Exception $e) {
                return ['status' => false, 'Uknown error.'];
            }

            $fileMIMETYPE   = $request->file('file')->getMimeType();
            $serverFileName = session()->all()['form_images']['id'] . '-' . $fileName; //"slug"
            $form_id        = session()->all()['form_images']['id'];

            try {
                $media = new MediaHouse;

                $media->name             = $fileName;
                $media->id_house         = $form_id;
                $media->slug             = StaticInfoController::slugify($fileName);
                $media->base_path        = 'images/houses/' . $serverFileName;
                $media->mime             = $fileMIMETYPE;
                $media->user_uploader_id = Auth::user()->id;

                $media->save();
                return ['status' => true];
            } catch (\Exception $e) {
                return ['status' => false, 'e' => $e];
            }

            return;
        }
    }
}
