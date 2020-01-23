    @csrf
    <div class="row row_2">
        <div class="col-6">
            <div class="form-group">
                <label for="name">Название группы:</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $user->name ?? '' }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <p>Период обучения группы:</p>
                <div class="input-group">
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
                        <label for="inputGroup">Укажите дату окончания</label>
                        <div class="input-group datetimepicker2" id="datetimepicker2">
                            <input type="text" class="form-control datetimepicker2" />
                            <span class="input-group-addon">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
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
        </div>
    </div>
    <div class="row">
        <div class="form-group butt">
            <a href="{{ URL::previous() }}" class="btn btn-secondary">Назад</a>

            @if(isset($user))
            <a href="{{ url('admin/groups/'.$user->id.'/delete') }}" class="btn btn-secondary"><i class="fa fa-trash" aria-hidden="true"></i></a>
            @endif

            <button type="submit" class="btn btn-primary float-right">Сохранить</button>
        </div>
    </div>