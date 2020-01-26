@extends('layouts.admin')
@section('content')


<div class="row_1 group">
    <div class="left">
        <h3 class="headtxt">Группа: Основная</h3>
    </div>
    <div class="right">
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#startGroupModal">Начать обучение</a>
        <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#stopGroupModal"
            style="margin-left: 20px;">Закончить обучение</a>
    </div>

</div>

<div class="row_1">
    <div class="cellinf group">
        <div class="row_1">
            <h5>Список сотрудников в учебной группе</h5>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Действия
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Переместить в другую группу</a>
                <a class="dropdown-item" href="#">Приостановить обучение</a>
                <a class="dropdown-item" href="#">Удалить</a>
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
                    <td>Не приступил к обучению</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="card_progress group">
        <div class="cell">
            <p class="date">Дата начала:</p>
            <p class="text">15.10.2019</p>
        </div>
        <div class="cell">
            <p class="date">Дата окончания:</p>
            <p class="text">15.03.2020</p>
        </div>
    </div>
</div>

<h3  class="headtxt">Темы для изучения</h3>

<div class="row_1">
    <div class="card_plan">
        <div class="row_1">
            <div class="cell">
                <a href="{{ route('admin.plansinf') }}">
                    <img src="http://acts.local/storage/img/web.png" alt="">
                    <p class="text">Пароли<br>и учетные записи</p>
                </a>
            </div>
            <div class="cell">
                <a href="{{ route('admin.plansinf') }}">
                    <img src="http://acts.local/storage/img/mail.png" alt="">
                    <p class="text">Электронная<br>почта</p>
                </a>
            </div>
            <div class="cell">
                <a href="{{ route('admin.plansinf') }}">
                    <img src="http://acts.local/storage/img/search.png" alt="">
                    <p class="text">Веб-сайты</p>
                </a>
            </div>
        </div>
        <div class="row_1">
            <div class="cell">
                <a href="{{ route('admin.plansinf') }}">
                    <img src="http://acts.local/storage/img/sm.png" alt="">
                    <p class="text">Соц.сети<br>и мессенджеры</p>
                </a>
            </div>
            <div class="cell">
                <a href="{{ route('admin.plansinf') }}">
                    <img src="http://acts.local/storage/img/pc.png" alt="">
                    <p class="text">Безопасность<br>ПК</p>
                </a>
            </div>
            <div class="cell">
                <a href="{{ route('admin.plansinf') }}">
                    <img src="http://acts.local/storage/img/key.png" alt="">
                    <p class="text">Безопасность<br>мобильных устройств</p>
                </a>
            </div>
        </div>
    </div>
</div>




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
                    <p class="alert alert-info">На этот e-mail будет выслана информация для подтверждения регистрации
                        сотрудника</p>

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

<div class="modal fade" id="startGroupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Начать обучение</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Чтобы начать обучение выберите дату начала.
                </p>
                <form>
                    <div class="form-group">
                        <label for="inputGroup">Укажите дату начала</label>
                        <div class="input-group datetimepicker2" id="datetimepicker2">
                            <input type="text" class="form-control datetimepicker2" />
                            <span class="input-group-addon">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary">Начать</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="stopGroupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Закончить обучение</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Вы действительно хотите закончить обучение в группе?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary">Закончить</button>
            </div>
        </div>
    </div>
</div>



@endsection