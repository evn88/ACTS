<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light my-3">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">


            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="form-inline my-2 my-lg-0 mr-auto">
                  <input class="form-control mr-sm-2" type="search"  placeholder="Введите имя" aria-label="Search" v-model="search" @input="search_text()">
                </li>
            </ul>

            <ul class="my-2 my-lg-0">
              <li class="nav-item btn">
                <a class="btn btn-light" href="#" data-toggle="modal" data-target="#importStaffModal">Импорт из csv</a>
              </li>
              <li class="nav-item dropdown btn">
                <a class="btn btn-light dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Действия
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Переместить в другую группу</a>
                    <a class="dropdown-item" href="#">Приостановить обучение</a>
                    <a class="dropdown-item" href="#">Назначить обучение</a>
                    <a class="dropdown-item" href="#">Удалить</a>
                </div>
              </li>
              <li class="nav-item btn">
                <a href="/admin/staff/create" class="btn btn-primary">Пригласить сотрудника</a>
              </li>
            </ul>

          </div>
        </nav>

        <section v-if="errored">
            <p class="alert alert-danger" role="alert"> {{ error }}</p>
        </section>
        <section v-else>
            <table class="table table-striped table-hover">
                <thead style="background: $dblue;">
                    <tr>
                        <th scope="col" style="width:30px;">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                <label class="custom-control-label" for="customControlInline"></label>
                            </div>
                        </th>
                        <th scope="col">ФИО</th>
                        <th scope="col" style="width:20px; text-align:left"></th>
                        <th scope="col">Должность</th>
                        <th scope="col">Почта</th>
                        <th scope="col">Группа</th>
                        <th scope="col">Статус</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- @foreach ($users as $user) -->

                    <tr v-for="user in users"
                        v-bind:key="user.id">
                        <td scope="row">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" v-bind:id="user.id">
                                <label class="custom-control-label" v-bind:for="user.id"></label>
                            </div>
                        </td>
                        <td><a v-bind:href="'/admin/staff/'+ user.id +'/edit'">{{ user.name }}</a></td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#addStaffModal">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td>{{ user.profession }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.group_id }}</td>
                        <td>{{ user.status }}</td>
                    </tr>
                    <!-- @endforeach -->


                    <!-- @if(!$users) -->
                    <tr v-if="!users">
                        <td scope="row">
                        </td>
                        <td colspan="6">Нет пользователей</td>
                    </tr>
                    <!-- @endif -->
                </tbody>
            </table>
        </section>

        <admin-staff-modal-component v-bind:uid="uid"></admin-staff-modal-component>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                users: null,
                usersOriginal: null,
                error: null,
                errored: false,
                search: null,
                uid: null,
            }
        },
        mounted() {
            axios.get('/api/user')
                .then(response => {
                    this.users = this.usersOriginal = response.data;
                })
                .catch(error => {
                    console.error(error.response);
                    this.error = error.response.status + ' ' + error.response.statusText + ' | ' + error.response.data.message;
                    this.errored = true;
                });
        },
        methods: {
            search_text(){
                var self = this;
                this.users = this.usersOriginal.filter(function(users){
                        if (
                            users.name.toLowerCase().indexOf(self.search.toLowerCase()) != "-1" ||
                            users.profession !== null &&
                            users.profession.toLowerCase().indexOf(self.search.toLowerCase()) != "-1"
                        )
                        {
                            return users;
                        }
                });
            },
            showModalUser (id) {
                this.uid = id;
                console.log('staff id: ---> ', id);
            }
        }
    }
</script>
