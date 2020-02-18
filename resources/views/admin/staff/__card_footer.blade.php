<div class="form-group">
    <a href="{{ URL::previous() }}" class="btn btn-secondary">Назад</a>

    @if(isset($user))
        <a class="btn btn-secondary" href="javascript:;"
           data-toggle="modal"
           data-target="#deleteConfirm"
           data-route="{{ route('staff.destroy', $user->id)}}"
           data-info="Удаленив пользователя также будут удалены его история тестов">
            <i class="fa fa-trash" aria-hidden="true"></i>
        </a>
    @endif

    <button type="submit" class="btn btn-primary float-right">Сохранить</button>
</div>
