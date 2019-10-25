<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegistrationMail extends Mailable
{
	use Queueable, SerializesModels;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */

	public $content;

	public function __construct($content)
	{
		$this->content = $content;
	}

	public function build()
	{

		return $this->view('mail.user.registration.registration')
		        ->from('noreply@fansandplace.com')
		        ->with([
			    'link' => $this->content['link'],
		        ]);
	}
}
