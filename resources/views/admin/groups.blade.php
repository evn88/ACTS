@extends('layouts.public')
@section('content')

<h1><i class="fa fa-graduation-cap" aria-hidden="true"></i> Учебные группы</h1>
<p class="heading">В данном разделе вы можете начать или закончить обучение в конкретных учебных группах, а также
    добавить или удалить группы.
</p>

<div class="row_1">
    <div class="left">
        <a href="#" class="btn btn-info" data-toggle="modal" data-target="#newGroupModal">Новая группа</a>
    </div>
    <div class="right">
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#startGroupModal">Начать обучение</a>
        <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#stopGroupModal"
            style="margin-left: 20px;">Закончить обучение</a>
    </div>

</div>

<table class="table table-striped table-hover">
    <thead style="background: $dblue;">
        <tr>
            <th scope="col"></th>
            <th scope="col">Группы</th>
            <th scope="col" class="txt-center">Количество обучающихся</th>
            <th scope="col" class="txt-center">Дата завершения</th>
            <th scope="col" class="txt-center">Действия</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><i class="fa fa-play" aria-hidden="true"></i></td>
            <td> Основная</td>
            <td class="txt-center">3</td>
            <td class="txt-center">25.12.2019</td>
            <td class="txt-center">
                <div class="dropdown dropleft">
                    <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#startGroupModal">Начать
                            обучение</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#stopGroupModal">Закончить
                            обучение</a>
                        <a class="dropdown-item" href="{{ route('admin.groupinf') }}">Подробнее о группе</a>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td><i class="fa fa-pause" aria-hidden="true"></i></td>
            <td>Потенциальный риск</td>
            <td class="txt-center">1</td>
            <td class="txt-center">01.01.2020</td>
            <td class="txt-center">
                <div class="dropdown dropleft">
                    <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#startGroupModal">
                            <i class="fa fa-play" aria-hidden="true"></i>&nbsp;&nbsp;
                            Начать обучение
                        </a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#pauseGroupModal">
                            <i class="fa fa-pause" aria-hidden="true"></i>&nbsp;&nbsp;
                            Приостановить обучение
                        </a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#stopGroupModal">
                            <i class="fa fa-stop" aria-hidden="true"></i>&nbsp;&nbsp;
                            Закончить обучение
                        </a>
                        <a class="dropdown-item" href="{{ route('admin.groupinf') }}">
                            <i class="fa fa-info" aria-hidden="true"></i>&nbsp;&nbsp;
                            Подробнее о группе
                        </a>
                    </div>
                </div>
            </td>
        </tr>
    </tbody>
</table>


<!-- Modal -->
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
                <p>Чтобы начать обучение выберите дату начала и укажите учебную группу.
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
                    <div class="form-group">
                        <label for="inputGroup">Выберите группу</label>
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
                <p>Чтобы закончить обучение укажите учебную группу.
                </p>
                <form>
                    <div class="form-group">
                        <label for="inputGroup">Выберите группу</label>
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
                <button type="button" class="btn btn-primary">Закончить</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="newGroupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Новая группа</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Чтобы создать новую группу, введите название и отметьте необходимые темы для изучения.
                </p>
                <form>
                    <div class="form-group">
                        <label for="formGroupNameInput">Название группы</label>
                        <input type="text" class="form-control" id="formGroupNameInput" placeholder="Новая группа">
                    </div>
                    <div class="form-group">
                        <label for="formGroupThemeInput">Темы для изучения</label>
                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="educLog">
                            <label class="custom-control-label" for="educLog">Пароли и учетные записи</label>
                        </div>
                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="educMail">
                            <label class="custom-control-label" for="educMail">Почта</label>
                        </div>
                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="educWeb">
                            <label class="custom-control-label" for="educWeb">Веб-сайты</label>
                        </div>
                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="educSocial">
                            <label class="custom-control-label" for="educSocial">Соцсети и мессенджеры</label>
                        </div>
                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="educPC">
                            <label class="custom-control-label" for="educPC">Безопасность ПК</label>
                        </div>
                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="educMobil">
                            <label class="custom-control-label" for="educMobil">Безопасность мобильных
                                устройств</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary">Создать</button>
            </div>
        </div>
    </div>
</div>



@endsection