    @csrf
    <div class="form-group">
        <label for="name">ФИО полностью</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') ?? $user->name ?? '' }}" >
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
         @enderror
    </div>

    <div class="form-group">
        <label for="profession">Должность</label>
        <input
            type="text"
            name="profession"
            id="profession"
            class="form-control @error('profession') is-invalid @enderror"
            value="{{ old('profession') ?? $user->profession ?? '' }}"
        >
        @error('profession')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
         @enderror
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
        value="{{ old('email') ?? $user->email ?? '' }}"
         >
         @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
         @enderror
    </div>

    @if(!isset($user))
        <p class="alert alert-info">На этот e-mail будет выслана информация для подтверждения регистрации сотрудника</p>
    @endif
    <div class="form-group">
        <label for="group_id">Учебная группа</label>
        <select id="group_id" name="group_id" class="form-control @error('group_id') is-invalid @enderror">
            <option value="0" selected>Не назначена</option>
            <option value="1">Основная</option>
            <option value="2">Потенциальный риск</option>
        </select>
        @error('group_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <a href="{{ URL::previous() }}" class="btn btn-secondary">Назад</a>
    <button type="submit" class="btn btn-primary float-right">Сохранить</button>