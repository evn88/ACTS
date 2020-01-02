@extends('layouts.public')
@section('content')

<h1><i class="fa fa-user-circle-o" aria-hidden="true"></i> Сотрудники</h1>

<p class="heading">В данном разделе вы можете управлять сотрудниками, которые должны проходить обучение:
    добавлять и удалять их, распределять их по учебным группам, редактировать информацию.</p>

<admin-staff-component>загрузка...</admin-staff-component>


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
                        <label for="inputGroup1">Учебная группа</label>
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