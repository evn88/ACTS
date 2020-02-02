<template>
<div class="row row_2 lesson">

        <div class="form-group">
            <div class="input-group">
                <ckeditor :editor="editor" v-model="question" :config="editorConfig">Загрузка...</ckeditor>
                <!-- <textarea id="ckeditor" class="form-control" name="question" placeholder="Напишите текст вопроса здесь" v-model="question">{{ question }}</textarea> -->
            </div>


            <span class="invalid-feedback" role="alert">
                <strong></strong>
            </span>

        </div>

        <div class="form-group clearfix">
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
                <input type="text" class="form-control" v-model="answer.text">
                <div class="input-group-append">
                    <a href="#" class="btn btn-outline-secondary" v-on:click="removeAnswer(id)"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="form-group butt lesson">
                <a href="" class="btn btn-secondary">Назад</a>
                <button type="submit" v-on:click.prevent="submitForm" class="btn btn-primary float-right">Сохранить</button>
            </div>
        </div>
</div>

</template>

<script>
let nextAnswerId = 1

export default {
        components: {
            // Use the <ckeditor> component in this view.
            ckeditor: CKEditor.component
        },
        data() {
            return {
                editor: ClassicEditor,
                editorConfig: {
                    placeholder: 'Напишите текст вопроса здесь',
                    language: 'ru'
                },
                selected: [],
                answers: [
                    {
					    id: nextAnswerId++,
					    text: ''
				    }
                ],
                question: null,
                error: null,
                errored: false,
                uid: null,
                path: process.env.MIX_URL
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
                console.info(this.answers, this.question)
            }
        }
}
</script>
