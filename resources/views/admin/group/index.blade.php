@extends('layouts.admin')
@section('content')

<h1><i class="fa fa-graduation-cap" aria-hidden="true"></i> Учебные группы</h1>
<p class="heading">В данном разделе вы можете начать или закончить обучение в конкретных учебных группах, а также
    добавить или удалить группы.
</p>

<div class="row_1">
    <div class="left">
        <a href="{{ route('groups.create') }}" class="btn btn-info">Новая группа</a>
    </div>
    <div class="right">
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#startGroupModal">Начать обучение</a>
        <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#stopGroupModal"
            style="margin-left: 20px;">Закончить обучение</a>
    </div>

</div>

<table class="table table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col"></th>
            <th scope="col">Группы</th>
            <th scope="col" class="txt-center" width="200px">Темы</th>
            <th scope="col" class="txt-center">Количество обучающихся</th>
            <th scope="col" class="txt-center">Дата старта</th>
            <th scope="col" class="txt-center">Дата завершения</th>
            <th scope="col" class="txt-center" width="50px"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($groups as $group)
        <tr>
            <td><i class="fa fa-stop" aria-hidden="true"></i></td>
            <td><a href="{{ route('groups.edit', $group->id) }}"> {{ $group->name }}</a></td>
            <td class="txt-left" >
                @foreach($group->plans as $plan)
                    <span class="badge badge-pill badge-light">{{ $plan->name }}</span>
                @endforeach
            </td>
            <td class="txt-center">{{ $group->usersCount() }}</td>
            <td class="txt-center">{{ $group->date_start }}</td>
            <td class="txt-center">{{ $group->date_end }}</td>
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
                    <a class="dropdown-item" href="javascript:;"
                        data-toggle="modal"
                        data-target="#deleteConfirm"
                        data-route="{{ route('groups.destroy', $group->id) }}"
                        data-info="Пользователи которые были закреплены за этой группой
                        станут `свободными` и их нужно будет заново привязать к другой группе для обучения"
                    >
                        Удалить запись
                    </a>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


<!-- Delete Confirm Modal-->


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
                        <label for="inputGroup1">Выберите группу</label>
                        <select id="inputGroup1" class="form-control">
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
                        <label for="inputGroup2">Выберите группу</label>
                        <select id="inputGroup2" class="form-control">
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
@include('admin.modal.confirm_delete')



@endsection