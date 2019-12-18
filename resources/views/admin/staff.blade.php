@extends('layouts.public')
@section('content')

<h1><i class="fa fa-user-circle-o" aria-hidden="true"></i> Сотрудники</h1>

<p class="heading">В данном разделе вы можете управлять сотрудниками, которые должны проходить обучение:
    добавлять и удалять их, распределять их по учебным группам, редактировать информацию.</p>

<nav class="navbar navbar-expand-lg navbar-light bg-light my-3">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <form class="form-inline my-2 my-lg-0 mr-auto">
      <input class="form-control mr-sm-2" type="search"  placeholder="Введите имя" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
    </form>

    <ul class="navbar-nav">
      <li class="nav-item btn">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#importStaffModal">Импорт из csv</a>
      </li>
      <li class="nav-item dropdown btn">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Действия
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Переместить в другую группу</a>
            <a class="dropdown-item" href="#">Приостановить обучение</a>
            <a class="dropdown-item" href="#">Назначить обучение</a>
            <a class="dropdown-item" href="#">Удалить</a>
        </div>
      </li>
      <li class="nav-item btn">
        <a href="#" class="nav-link" data-toggle="modal" data-target="#addStaffModal">Пригласить сотрудника</a>
      </li>
    </ul>

  </div>
</nav>


<!-- <div class="row_1">
    <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Введите имя" aria-label="Search">
        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">
            <i class="fa fa-search" aria-hidden="true"></i> Поиск</button>
    </form>


    <div class="wrap-staff">

            <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#addStaffModal">Импорт из csv</a>
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
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addStaffModal">Пригласить сотрудника</a>

    </div>
</div> -->

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
        @foreach ($users as $user)

        <tr>
            <th scope="row">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                    <label class="custom-control-label" for="customControlInline"></label>
                </div>
            </th>
            <td>{{ $user->name }}</td>
            <td>
                <a href="#" data-toggle="modal" data-target="#addStaffModal">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>
            </td>
            <td>{{ $user->profession }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->grou_id }}</td>
            <td>{{ $user->status }}</td>
        </tr>
        @endforeach



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
                    <p class="alert alert-info">На этот e-mail будет выслана информация для подтверждения регистрации сотрудника</p>

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


<!-- Modal import -->
<div class="modal fade" id="importStaffModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Импорт из csv</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Для загрузки данных используйте список сохраненный в формат .csv с запятой в качестве разделителя.
                Файл должен содержать слежующие поля:</p>
                <ul>
                    <li>ФИО</li>
                    <li>Должность</li>
                    <li>email</li>
                </ul>
                <form>
                    <div class="input-group mb-3">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile02">
                        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
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