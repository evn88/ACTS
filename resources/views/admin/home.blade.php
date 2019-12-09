@extends('layouts.public')
@section('content')

<h1><i class="fa fa-home" aria-hidden="true"></i> Главная страница</h1>
<p class="heading">Главная страница содержит краткую сводку об успеваемости учебных групп.
    Администратр может скачать отчет по обучению а также обратить внимание на отстающих сотрудников и отправить им уведомления
    о необходимости продолжить занятия.</p>

<div class="row_1">
    <div class="info_card">
        <h3>Информация о компании</h3>
        <div class="wrap">
            <p class="info-text">Наименование: </p>
            <p>ПАО Волгоградоблэлектро</p>
            <a href="#"> <i class="fa fa-pencil fa-fw"></i>Изменить</a>
        </div>
        <div class="wrap">
            <p class="info-text">Администратор: </p>
            <p>Вершкова Анна Александровна</p>
            <a href="#"> <i class="fa fa-pencil fa-fw"></i>Изменить</a>
        </div>
    </div>

    <div class="logo_card">
        <div class="card" style="width: 210px;">
            <div class="card-header">
                <img src="{{ asset('storage/img/voel.png') }}" class="rounded mx-auto d-block" width="120px" alt=" ">
            </div>
            <div class="card-body">
                <!-- <a href="#" class="btn btn-primary" style="width: 100%;"> <i class="fa fa-pencil fa-fw"></i> Загрузить</a> -->
                <div id="file-upload">
                    <label>
                        <input type="file" name="file" id="uploade-file">
                        <i class="fa fa-download" aria-hidden="true"></i>
                        <span> Загрузить</span>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row py-4">
    <div class="col-sm-12">
        <h3>Информация об успеваемости</h3>
    </div>
</div>

<div class="row_1">
    <div class="card_progress">
        <div class="row_1">
            <div class="cell">
                <p class="num">2</p>
                <p class="text">идут по плану</p>
            </div>
            <div class="cell">
                <p class="num">2</p>
                <p class="text">остают от плана</p>
            </div>
            <div class="cell">
                <p class="num">2</p>
                <p class="text">опережают план</p>
            </div>
        </div>
        <div class="row_1">
            <div class="cell">
                <p class="num">2</p>
                <p class="text">не зарегистрировались</p>
            </div>
            <div class="cell">
                <p class="num">2</p>
                <p class="text">не сдали тест</p>
            </div>
            <div class="cell">
                <p class="num">2</p>
                <p class="text">провалили атаку</p>
            </div>
        </div>
    </div>
    <div class="info_progress">
        <p class="info_text">Необходимые действия:</p>
        <p>Отправить оповещение на почту о том, что необходимо вернуться к занятиям</p>
        <a href="#" class="btn btn-primary">Отправить</a>
    </div>
</div>

<div class="row_1" style="width: 650px; align-items: baseline;">
    <p style="font-size: 18px;">Сформировать отчет в формате xls и скачать его</p>
    <a href="#" class="btn btn-primary">Скачать отчет</a>
</div>



@endsection