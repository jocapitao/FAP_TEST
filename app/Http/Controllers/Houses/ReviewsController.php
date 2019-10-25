<?php

namespace App\Http\Controllers\Houses;

use App\Models\Houses;
use App\Services\House\HouseReviesService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    public function __construct()
    {
        $this->service = new HouseReviesService();
        $this->houses =  new Houses();
    }

    public function handle_new_review (Request $request) {
        return $this->service->new_review($request->text, $request->rating, $request->house_id, Auth::user()->id);
    }

    public function handle_get_review ( $slug) {
        $house_id = $this->houses->get_id_from_slug($slug);
        return $this->service->get_house_reviews(collect($house_id)->get('id'));
    }
}
