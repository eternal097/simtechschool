@extends('layouts.main')

@section('title')Страница обратной связи@endsection

@section('content')
    <div class="container">
        <div class="py-5 text-center">
            <h2>Форма обратной связи</h2>
            <p class="lead">Вы можете отправить нам сообщение, заполнив форму ниже.</p>
        </div>
        <form action="{{ route('contact-form') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="exampleFormControlInput1">Введите e-mail:</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Введите имя:</label>
                <input type="text" name="name" class="form-control" id="exampleFormControlInput2">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Укажите ваш пол:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Женский">
                    <label class="form-check-label" for="inlineRadio1">Женский</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Мужской">
                    <label class="form-check-label" for="inlineRadio2">Мужской</label>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Добавьте фотографию:</label>
                <input type="file" name="photo" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Выберите вашу страну:</label>
                <select  name="country" class="form-control">
                    <option value="Россия">Россия</option>
                    <option value="США">США</option>
                    <option value="Германия">Германия</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Ваше сообщение:</label>
                <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="form-group">
                <button type="reset" class="btn btn-primary">Очистить</button>
            </div>
            <div class="custom-control custom-checkbox">
                <input name="apply" type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Согласие на обработку персональных данных</label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Отправить</button>
            </div>
        </form>
    </div>
@endsection

