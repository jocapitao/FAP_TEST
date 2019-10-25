<?php

namespace App\Models\Media;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\UserMedia;

class Media extends Model
{
	public $table = "fap_media";
    protected $fillable = [
        'name','slug','base_path', 'mime', 'user_uploader_id'
    ];

	public function get_media_path ($id) {
        return $this->get();
    }
}
