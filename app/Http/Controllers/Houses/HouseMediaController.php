<?php

namespace App\Http\Controllers\Houses;

use App\Models\Media\MediaHouse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HouseMediaController extends Controller
{
	public static function get_images_bulk($houses, $status = 1, $single = 0)
	{
		if($single == 1){
			try {
				$get = MediaHouse::select('base_path')->where([
				        'status' => $status,
				        'id_house' => $houses['form_id']
				])->get()->toArray();
			} catch (\Exception $e) {
				return ['status' => false, 'e' => $e];
			}

			$data = [];

			if(count($get) == 0){
				$data[] = 'https://via.placeholder.com/350x275';
			}else{
//				return $get[0]['base_path'];
				foreach($get as $indeximage => $image){
					$data[] = url($image['base_path']);
				}
			}

			return $data;
		}

		try {
			foreach ($houses as $index => $house) {
				$get = MediaHouse::select('base_path')->where([
				        'status' => $status,
				        'id_house' => $house->form_id
				])->get();
				if(count($get) == 0){
					$houses[$index]->images[] = 'https://via.placeholder.com/350x275';
				}else{
					foreach($get as $indeximage => $image){
						$houses[$index]->images[] = url($image['base_path']);
					}
				}
			}
		}
		catch (\Exception $e) {
			return ['status' => false, 'e' => $e];
		}
		return $houses;

	}
}
