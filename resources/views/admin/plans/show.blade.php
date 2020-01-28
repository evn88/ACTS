@extends('layouts.admin')
@section('content')

<h3 class="headtxt">{{ $plan->name }}</h3>
<div class="row_1 justify-content-end">
    <div class="right plans-right">
        <a href="{{ route('lessons.create') }}" class="btn btn-primary">Создать урок</a>
        <a class="btn btn-secondary">Создать тест</a>
        <a class="btn btn-info">Создать атаку</a>
    </div>
</div>
<div class="card_plan">
    <div class="row_1">
        <div class="cellinf">
            <h5>Содержание модуля:</h5>
            <ol class="rectangle">
                <li><a class="mark" href="#">Список уроков</a>
                    <ul>
                        <li><a href="{{ route('lessons.edit', 1) }}">Для чего нужно беспокоиться о безопасности паролей</a>
                            <a href="javascript:;"
                                data-toggle="modal"
                                data-target="#deleteConfirm"
                                data-route="{{ route('lessons.destroy', 1) }}">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li><a href="">Как придумать сложный пароль</a><a href=""><i class="fa fa-trash-o" aria-hidden="true"></i></a></li>
                        <li><a href="">Как хранить пароли</a><a href=""><i class="fa fa-trash-o" aria-hidden="true"></i></a></li>
                        <li><a href="">Можно ли давать свои пароли третьим лицам</a><a href=""><i class="fa fa-trash-o" aria-hidden="true"></i></a></li>
                        <li><a href="">Что делать, если пароль взломали?</a><a href=""><i class="fa fa-trash-o" aria-hidden="true"></i></a></li>
                        <li><a href="">Почему нужны разные пароли для личных и корпоративных аккаунтов?</a><a href=""><i class="fa fa-trash-o" aria-hidden="true"></i></a></li>
                    </ul>
                </li>

                <li><a class="mark" href="#">Тест</a>
                    <ul>
                        <li><a href="">Проверка знаний по теме</a><a href=""><i class="fa fa-trash-o" aria-hidden="true"></i></a></li>
                    </ul>
                </li>
                <li><a class="mark" href="#">Имитация атаки</a>
                    <ul>
                        <li><a href="">Кто-то пытается взломать ваш аккаунт! Необходимо сменить пароль</a><a href=""><i class="fa fa-trash-o" aria-hidden="true"></i></a></li>
                    </ul>
                </li>
            </ol>
        </div>
    </div>
</div>

@include('admin.modal.confirm_delete')

@endsection