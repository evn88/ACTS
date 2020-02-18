<div class="form-group">
    <a href="{{ URL::previous() }}" class="btn btn-secondary">Назад</a>

    @if(isset($groups))
        <a class="btn btn-secondary" href="javascript:;"
           data-toggle="modal"
           data-target="#deleteConfirm"
           data-route="{{ route('groups.destroy', $groups->id)}}"
           data-info="Пользователи которые были закреплены за этой группой
                   станут `свободными` и их нужно будет заново привязать к другой группе для обучения">
            <i class="fa fa-trash" aria-hidden="true"></i>
        </a>
    @endif

    <button type="submit" class="btn btn-primary float-right">Сохранить</button>
</div>

