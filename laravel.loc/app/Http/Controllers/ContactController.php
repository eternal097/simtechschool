<?php

namespace App\Http\Controllers;

use App\Mail\MailClass;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\ImageManager;


class ContactController extends Controller
{
    public function submit(ContactRequest $req) {

        $contact = new Contact;

        $email = $req->input('email');
        $name = $req->input('name');
        $gender = $req->input('gender');
        $file = $req->file('photo');
        $country = $req->input('country');
        $text = $req->input('text');
        $apply = $req->input('apply');

        //Конфигурация драйвера обработки изображения
        $manager = new ImageManager(array('driver' => 'imagick'));

        //Сжатие и сохранение изображения в директорию
        $filename = time().'_'.$file->getClientOriginalName();
        $img = $manager->make($file);
        $img->resize(250,200)->save('storage/uploads/'.$filename);

        //Отправка данных из формы в модель
        $contact->email = $email;
        $contact->name = $name;
        $contact->gender = $gender;
        $contact->photo = $filename;
        $contact->country = $country;
        $contact->text = $text;
        $contact->apply = $apply;

        //Сохранение данных в бд
        $contact->save();

        //Функция отправки письма
        Mail::to('pochta@gmail.com')->send(new MailClass($email, $name, $gender, $country, $text));

        //Редирект на главную страницу
        return redirect()->route('home')->with('success', 'Сообщение было отправлено');


    }
}
