<template>
    <div>

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
                    <input class="form-check-input" type="radio" name="answ1" id="radio1_1" value="1">
                    <label class="form-check-label" for="radio1_1">
                        Создать простой  и запомнить
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answ1" id="radio1_2" value="2">
                    <label class="form-check-label" for="radio1_2">
                        Cпрятать бумажку с паролем в бумажник
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answ1" id="radio1_3" value="3">
                    <label class="form-check-label" for="radio1_3">
                        Записать на видном месте
                    </label>
                </div>
            </div>
            <div class="jumbotron">
                <p class="test">
                    <b>2.</b> Алексей взял за основу пароля слова из любимой песни и год ее создания.
                    Какой из вариантов пароля можно использовать?
                </p>
                <hr class="my-4">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answ2" id="radio2_1" value="1">
                    <label class="form-check-label" for="radio2_1">
                        LittleRedRiddingHoodHitTheRoad1974
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answ2" id="radio2_2" value="2">
                    <label class="form-check-label" for="radio2_2">
                        Little1Red4Ridding7Hood9Hit##
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answ2" id="radio2_3" value="3">
                    <label class="form-check-label" for="radio2_3">
                        LRedRiddingHoodHitRoad74
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answ2" id="radio2_4" value="4">
                    <label class="form-check-label" for="radio2_4">
                        LRRHHTR74
                    </label>
                </div>
            </div>
            <div class="row_1">
                <a href="#" class="btn btn-primary">Отправить ответы</a>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "TestComponent"
    }
</script>

<style scoped>

</style>
