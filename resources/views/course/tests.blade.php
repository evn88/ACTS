@extends('layouts.course')
@section('content')

<h3>Тест по теме: &laquoПароли и учетные записи&raquo</h3>
<form action="">
    <div class="jumbotron">
        <p class="test">
            <b>1.</b> Иван Иванович редко пользуется почтовым ящиком. Он создал сложный пароль, записал его на бумажке
            и спрятал между страниц одного из томов собрания сочинений Джека Лондона на книжной полке. Когда
            ему срочно понадобилось войти в почту, он не смог найти бумажку, потому что забыл, в какой именно
            том ее спрятал. Что следовало делать, чтобы избежать подобной ситуации?
        </p>
        <hr class="my-4">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="answ1" id="radio1" value="1">
            <label class="form-check-label" for="radio1">
                Создать простой  и запомнить
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="answ1" id="radio2" value="2">
            <label class="form-check-label" for="radio2">
                Cпрятать бумажку с паролем в бумажник
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="answ1" id="radio3" value="3">
            <label class="form-check-label" for="radio3">
                Записать на видном месте
            </label>
        </div>
    </div>
    <div class="jumbotron">
        <p class="test">
            <b>2.</b> Иван Иванович редко пользуется почтовым ящиком. Он создал сложный пароль, записал его на бумажке
            и спрятал между страниц одного из томов собрания сочинений Джека Лондона на книжной полке. Когда
            ему срочно понадобилось войти в почту, он не смог найти бумажку, потому что забыл, в какой именно
            том ее спрятал. Что следовало делать, чтобы избежать подобной ситуации?
        </p>
        <hr class="my-4">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="answ1" id="radio1" value="1">
            <label class="form-check-label" for="radio1">
                Создать простой  и запомнить
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="answ1" id="radio2" value="2">
            <label class="form-check-label" for="radio2">
                Cпрятать бумажку с паролем в бумажник
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="answ1" id="radio3" value="3">
            <label class="form-check-label" for="radio3">
                Записать на видном месте
            </label>
        </div>
    </div>
    <div class="row_1">
        <a href="#" class="btn btn-primary">Отправить ответы</a>
    </div>
</form>



@endsection