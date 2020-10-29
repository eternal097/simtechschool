<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailClass extends Mailable
{
    use Queueable, SerializesModels;

    protected $email;
    protected $name;
    protected $gender;
    protected $country;
    protected $text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $name, $gender, $country, $text)
    {
        $this->email = $email;
        $this->name = $name;
        $this->gender = $gender;
        $this->country = $country;
        $this->text = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.mail')
            ->with([
                'email' => $this->email,
                'name' => $this->name,
                'gender' => $this->gender,
                'country' => $this->country,
                'text' => $this->text,
            ])
            ->subject('Новое сообщение');
    }
}
