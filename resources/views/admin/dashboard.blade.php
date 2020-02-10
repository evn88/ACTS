@extends('layouts.admin')
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

<h5 class="home">Отчет по группам</h5>
<div class="row_1">
    <div class="accordion" id="accordionExample1">
        <div class="card">

            @foreach($groups as $group)
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-{{ $group->id }}" aria-expanded="true" aria-controls="collapse-{{ $group->id }}">
                        {{ $group->name }}
                    </button>
                </h5>
                <div class="progress" style="height: 30px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated"  role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 30%">30%</div>
                </div>
            </div>
            <div id="collapse-{{ $group->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample1">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Показатель успеваемости</th>
                            <th scope="col">Количество</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Сотрудники, сдавшие тесты</td>
                            <td>5</td>
                        </tr>
                        <tr>
                            <td>Сотрудники, провалившие тесты</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>Сотрудники, провалившие атаки</td>
                            <td>3</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach

        </div>
    </div>

</div>

<h5 class="home">Отчет по сотрудникам</h5>
<div class="row_1">
    <div class="accordion" id="accordionExample2">
        <div class="card">

            @foreach($users as $user)
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseUser-{{ $user->id }}" aria-expanded="true" aria-controls="collapseUser-{{ $user->id }}">
                        {{$user->name}}
                    </button>
                </h5>
                <div class="progress" style="height: 30px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated"  role="progressbar"
                         aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"
                         style="width: {{ $user->percent_pass }}%">{{ $user->percent_pass }}%</div>
                </div>
            </div>
            <div id="collapseUser-{{ $user->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample2">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Показатель успеваемости</th>
                            <th scope="col">Количество</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Пройдено уроков</td>
                            <td>5</td>
                          </tr>
                          <tr>
                            <td>Успешно сдано тестов</td>
                            <td>{{ $user->tests_pass }} из {{ $user->tests_count }}</td>
                          </tr>
                          <tr>
                            <td>Провалено тестов</td>
                            <td>{{ $user->tests_fail }} из {{ $user->tests_count }}</td>
                          </tr>
                          <tr>
                            <td>Провалено атак</td>
                            <td>1</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>


{{-- <div class="row_1">
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
</div> --}}




@endsection
