@extends('layouts.admin')
@section('content')

<h3 class="headtxt">Пароли и учетные записи</h3>
<div class="row_1 justify-content-end">
    <div class="right plans-right">
        <button class="btn btn-primary">Создать урок</button>
        <button class="btn btn-secondary">Создать тест</button>
        <button class="btn btn-info">Создать атаку</button>
    </div>
</div>
<div class="card_plan">
    <div class="row_1">
        <div class="cellinf">
            <h5>Содержание модуля:</h5>
            <ol class="rectangle">
                <li><a class="mark" href="#">Список уроков</a>
                    <ul>
                        <li><a href="">Для чего нужно беспокоиться о безопасности паролей</a><a href=""><i class="fa fa-trash-o" aria-hidden="true"></i></a></li>
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


@endsection