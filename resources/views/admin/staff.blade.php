@extends('layouts.public')
@section('content')

<h1><i class="fa fa-user-circle-o" aria-hidden="true"></i> Сотрудники</h1>

<p class="heading">В данном разделе вы можете управлять сотрудниками, которые должны проходить обучение:
    добавлять и удалять их, распределять их по учебным группам, редактировать информацию.</p>

<div class="row_1">
    <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Введите имя" aria-label="Search">
        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">
            <i class="fa fa-search" aria-hidden="true"></i> Поиск</button>
    </form>
    <div class="wrap-staff">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Действия
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Переместить в другую группу</a>
                <a class="dropdown-item" href="#">Приостановить обучение</a>
                <a class="dropdown-item" href="#">Назначить обучение</a>
                <a class="dropdown-item" href="#">Удалить</a>
            </div>
        </div>
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addStaffModal">Добавить сотрудника</a>
    </div>
</div>

<table class="table table-striped table-hover">
    <thead style="background: $dblue;">
        <tr>
            <th scope="col" style="width:30px;">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                    <label class="custom-control-label" for="customControlInline"></label>
                </div>
            </th>
            <th scope="col">ФИО</th>
            <th scope="col" style="width:20px; text-align:left"></th>
            <th scope="col">Должность</th>
            <th scope="col">Почта</th>
            <th scope="col">Группа</th>
            <th scope="col">Статус</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                    <label class="custom-control-label" for="customControlInline"></label>
                </div>
            </th>
            <td>Вершкова Анна Александровна</td>
            <td>
                <a href="#" data-toggle="modal" data-target="#addStaffModal">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>
            </td>
            <td>Разработчик</td>
            <td>aniamanson@gmail.com</td>
            <td>Основная</td>
            <td>На обучении</td>
        </tr>
        <tr>
            <th scope="row">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                    <label class="custom-control-label" for="customControlInline"></label>
                </div>
            </th>
            <td>Вершков Егор Николаевич</td>
            <td>
                <a href="#" data-toggle="modal" data-target="#addStaffModal">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>
            </td>
            <td>Начальник отдела разработки</td>
            <td>egor@mail.ru</td>
            <td>Основная</td>
            <td>Не приступил к обучению</td>
        </tr>
        <tr>
            <th scope="row">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                    <label class="custom-control-label" for="customControlInline"></label>
                </div>
            </th>
            <td>Иванов Иван Иванович</td>
            <td>
                <a href="#" data-toggle="modal" data-target="#addStaffModal">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>
            </td>
            <td>Бухгалтер</td>
            <td>ivan@ya.ru</td>
            <td>Потенциальный риск</td>
            <td>На обучении</td>
        </tr>
    </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="addStaffModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Данные сотрудника</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="formGroupExampleInput">ФИО полностью</label>
                        <input type="text" class="form-control" id="formGroupExampleInput"
                            placeholder="Иванов Иван Иванович">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Должность</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Бухгалтер">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="inputGroup">Учебная группа</label>
                        <select id="inputGroup" class="form-control">
                            <option selected>Не назначена</option>
                            <option>Основная</option>
                            <option>Потенциальный риск</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </div>
</div>




@endsection