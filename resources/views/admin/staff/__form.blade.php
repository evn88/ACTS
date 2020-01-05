    @csrf
    <div class="form-group">
        <label for="formGroupExampleInput">ФИО полностью</label>
        <input type="text" name="name" class="form-control" id="formGroupExampleInput"
                value="{{ @$user->name }}" required>
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Должность</label>
        <input type="text" name="profession" class="form-control" id="formGroupExampleInput2"
        value="{{ @$user->profession }}">
    </div>
    <div class="form-group">
        <label for="inputEmail4">Email</label>
        <input type="email" name="email" class="form-control" id="inputEmail4"
         required>
    </div>
    {{-- <p class="alert alert-info">На этот e-mail будет выслана информация для подтверждения регистрации сотрудника</p> --}}

    <div class="form-group">
        <label for="inputGroup1">Учебная группа</label>
        <select id="inputGroup1" name="group_id" class="form-control">
            <option value="0" selected>Не назначена</option>
            <option value="1">Основная</option>
            <option value="2">Потенциальный риск</option>
        </select>
    </div>

    <a href="{{ URL::previous() }}" class="btn btn-secondary">Назад</a>
    <button type="submit" class="btn btn-primary float-right">Сохранить</button>
