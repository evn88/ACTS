<template>
<div class="row row_2 lesson">

        <div class="form-group">
                <ckeditor :editor="editor" v-model="question" :config="editorConfig"></ckeditor>
        </div>


        <div class="form-group ">
            <a href="javascript:;" id="addAnswer" class="btn btn-primary" v-on:click="addAnswer">Добавить ответ</a>
        </div>
        <p class="form-text text-muted">Напишите ответы и отметьте один или несколько правильных ответов</p>
        <div class="form-group">
            <div class="input-group mb-3 input-group-lg"
                v-for="(answer, id) in answers"
                v-bind:key="answer.id">

                <div class="input-group-prepend check">
                  <div class="input-group-text custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" v-bind:id="answer.id" v-model="selected" :value="answer.id" number>
                    <label class="custom-control-label" v-bind:for="answer.id"></label>
                  </div>
                </div>
                <input type="text" class="form-control" v-model="answer.text" placeholder="Текст ответа">
                <div class="input-group-append">
                    <a href="#" class="btn btn-outline-secondary" v-on:click="removeAnswer(id)"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="form-group butt lesson">
                <a href="#" class="btn btn-secondary" v-on:click="goBack">Назад</a>
                <button type="submit" v-on:click.prevent="submitForm" class="btn btn-primary float-right">Сохранить</button>
            </div>
        </div>
</div>
</template>

<script>
let nextAnswerId = 1;
const formData = new FormData();

export default {
        components: {
            ckeditor: CKEditor.component
        },
        props: ['planId', 'testId'],
        data() {
            return {
                editor: ClassicEditor,
                editorConfig: {
                    placeholder: 'Напишите текст вопроса здесь',
                    language: 'ru',
                    ckfinder: {
                        uploadUrl: process.env.MIX_URL + '/ckfinder/connector?command=QuickUpload&type=Files&responseType=json'
                    },
                },
                selected: [],
                answers: [
                    {
					    id: nextAnswerId++,
					    text: ''
				    }
                ],
                update: false,
                question: null,
                error: null,
                errored: false,
                uid: null,
                path: process.env.MIX_URL
            }
        },
        mounted() {
            //если передан идентификатор теста то подгружаем данные для формы
            if(this.testId){
                axios.get(this.path + '/api/admin/test/'+this.testId)
                    .then(response => {
                        this.selected = JSON.parse(response.data.trueAnswer);
                        this.answers = JSON.parse(response.data.answer);
                        this.question = response.data.question;
                    })
                    .catch(error => {
                        console.error(error.response);
                        this.error = error.response.status + ' ' + error.response.statusText + ' | ' + error.response.data.message;
                        this.errored = true;
                    });
                // устанавливаем признак обновления данных (чтобы не создавать новую запись)
                this.update = true;
            }
        },
         methods: {
            addAnswer: function(){
                this.answers.unshift({
                    id: nextAnswerId++,
                    text: ''
                })
            },
            removeAnswer: function (id) {
                Vue.delete(this.answers, id);
                Vue.delete(this.selected, id);
            },
            submitForm: function() {
                let actionPath = '/api/admin/test'; //default store path

                formData.append('question', this.question);
                formData.append('answers', JSON.stringify(this.answers));
                formData.append('trueAnswers', JSON.stringify(this.selected));
                formData.append('plan_id', this.planId);

                if(this.update){
                    actionPath = '/api/admin/test/' + this.testId;
                }

                axios
                    .post( this.path + actionPath, formData)
                    .then(response => {
                        console.log('response: ', response);
                        window.location = this.path + "/admin/plans/"+ this.planId;
                    })

            },
            goBack: function() {
                window.history.back();
            }
        }
}
</script>
