<template>
    <div>
        <h3>Вопросы к материалу: {{ title }}</h3>
        <transition name="fade">
            <form action="" v-if="show" v-on:submit.prevent>
                <div class="jumbotron" v-if="tests">
                    <p class="test">
                        <span v-html="tests.question">нет данных</span>
                    </p>
                    <hr class="my-4">
                    <div class="form-check" v-for="answer in JSON.parse(tests.answer)" v-bind:key="answer.id">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" v-bind:id="answer.id" v-model="selected" :value="answer.id" number>
                            <label class="custom-control-label" v-bind:for="answer.id">{{ answer.text }}</label>
                        </div>
                    </div>
                    <button class="btn btn-primary mar_2" v-on:click="nextQuestion">Ответить</button>
                </div>


                <div class="jumbotron info" v-if="false">
                    <p class="info-text">Тест не сдан. Вы допустили слишком много ошибок.</p>
                    <p>Повторите уроки текущего модуля и попробуйте снова. У вас все получится!</p>
                    <img :src="path + '/storage/img/sad.jpg'" alt="">
                    <div class="row_1">
                        <button class="btn btn-primary mar_2" v-on:click="nextQuestion">Закончить тестирование</button>
                    </div>
                </div>
                <div class="jumbotron info" v-if="false">
                    <p class="info-text">Результат тестирования: вы успешно сдали тест!</p>
                    <p>Мошенникам будет сложно вас провести.<br>Вы можете приступать к изучению следующего модуля.</p>
                    <img :src="path + '/storage/img/happy.jpg'" alt="">
                    <div class="row_1">
                        <button class="btn btn-primary mar_2" v-on:click="nextQuestion">Закончить тестирование</button>
                    </div>
                </div>
                <div class="jumbotron info" v-if="errored">
                    <p class="info-text">Ошибка в работе приложения!</p>
                    <p>{{ error }}</p>
                    <img :src="path + '/storage/img/sad.jpg'" alt="Error">
                </div>
            </form>
            <div v-else="show">Загрузка...</div>
        </transition>
    </div>
</template>

<script>
    const formData = new FormData();
    export default {
        props: ['title','planId'],
        name: "TestComponent",
        data() {
            return {
                selected: [],
                error: null,
                errored: false,
                tests: null,
                show: true,
                path: process.env.MIX_URL,
            }
        },
        mounted() {
            this.updateQuestion();
        },
        methods: {
            updateQuestion: function(){
                axios.get(this.path + '/api/test/'+ this.planId)
                    .then(response => {
                        this.tests = response.data;
                    })
                    .catch(error => {
                        console.error(error.response);
                        this.error = error.response.status + ' ' + error.response.statusText + ' | ' + error.response.data.message;
                        this.errored = true;
                    });
            },
            nextQuestion: function(){
                this.show = false;
                formData.append('test_id', this.tests.id);
                formData.append('answers', JSON.stringify(this.selected));
                console.log('formData: ', formData);
                axios.post(this.path + '/api/test/storeuseranswer', formData)
                    .then(response => {
                        console.log('resp: ', response.data);
                        this.selected = [];
                        this.tests = null;
                        this.updateQuestion()
                        this.show = true;
                    })
                    .catch(error => {
                        console.error(error.response);
                        this.error = error.response.status + ' ' + error.response.statusText + ' | ' + error.response.data.message;
                        this.errored = true;
                    });

            }
        },
    }
</script>

<style scoped>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active до версии 2.1.8 */ {
        opacity: 0;
    }
</style>
