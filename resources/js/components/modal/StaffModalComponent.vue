<template>
    <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="addStaffModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Данные сотрудника</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="reset()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>

                            <div class="form-group">
                                <label for="formGroupExampleInput">ФИО полностью</label>
                                <input type="text" class="form-control" id="formGroupExampleInput"
                                v-bind:value="user.name"
                                    placeholder="Иванов Иван Иванович">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Должность</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2"
                                v-bind:value="user.profession"
                                placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4"
                                v-bind:value="user.email"
                                placeholder="Email">
                            </div>
                            <p class="alert alert-info">На этот e-mail будет выслана информация для подтверждения регистрации сотрудника</p>

                            <div class="form-group">
                                <label for="inputGroup1">Учебная группа</label>
                                <select id="inputGroup1" class="form-control">
                                    <option selected>Не назначена</option>
                                    <option>Основная</option>
                                    <option>Потенциальный риск</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"  @click="reset()">Закрыть</button>
                        <button type="button" class="btn btn-primary">Сохранить</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data () {
            return {
                user: {}
            }
        },
        methods: {
            reset: function () {
                this.user = {};
            }
        },
        props: ['uid'],
        watch: {
            uid: function (e) {
                    console.log('watch', e);
                    axios.get('/api/user/'+ this.uid)
                        .then(response => {
                                this.user = response.data;
                        })
                }
        }
    }

</script>
