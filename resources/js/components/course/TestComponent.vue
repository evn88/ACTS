<template>
    <div>

        <h3>Вопросы к материалу: {{ title }}</h3>
        <form action="">
            <div class="jumbotron" v-for="test in tests" v-bind:key="test.id">
                <p class="test">
                    <span v-html="test.question">нет данных</span>
                </p>
                <hr class="my-4">
                <div class="form-check" v-for="answer in JSON.parse(test.answer)" v-bind:key="answer.id">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" v-bind:id="answer.id" v-model="selected" :value="answer.id" number>
                        <label class="custom-control-label" v-bind:for="answer.id">{{ answer.text }}</label>
                    </div>
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
        props: ['title','planId'],
        name: "TestComponent",
        data() {
            return {
                selected: [],
                error: null,
                errored: false,
                tests: null,
                uid: null,
                path: process.env.MIX_URL
            }
        },
        mounted() {
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
    }
</script>

<style scoped>

</style>
