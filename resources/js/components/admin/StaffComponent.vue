<template>
    <div class="container">
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
                    <td scope="row">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                            <label class="custom-control-label" for="customControlInline"></label>
                        </div>
                    </td>
                    <td></td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#addStaffModal">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                @endforeach


                @if(!$users)
                <tr>
                    <td scope="row">
                        {{-- <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                            <label class="custom-control-label" for="customControlInline"></label>
                        </div> --}}
                    </td>
                    <td colspan="6">Нет пользователей</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
