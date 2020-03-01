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
              <!-- <li class="nav-item btn">
                <a class="btn btn-light" href="#" data-toggle="modal" data-target="#importStaffModal">Импорт из csv</a>
              </li> -->
              <li class="nav-item dropdown btn">
                <a class="btn btn-light dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Действия
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <!-- <a class="dropdown-item" href="#">Переместить в другую группу</a> -->
                    <!-- <a class="dropdown-item" href="#">Приостановить обучение</a> -->
                    <a class="dropdown-item" href="javascript:;" @click="deleteSelected">Удалить выделенное</a>
                </div>
              </li>
              <li class="nav-item btn">
                <a v-bind:href="path +'/admin/staff/create'" class="btn btn-primary"><i class="fa fa-plus"></i> Пригласить сотрудника</a>
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
                                <input type="checkbox" class="custom-control-input" id="allUsersCheck" v-model="selectAll">
                                <label class="custom-control-label" for="allUsersCheck"></label>
                            </div>
                        </th>
                        <th scope="col">ФИО</th>
                        <th scope="col">Должность</th>
                        <th scope="col">Почта</th>
                        <th scope="col">Группы</th>
                        <th scope="col">Статус</th>
                    </tr>
                </thead>
                <tbody>

                    <tr v-for="user in users"
                        v-bind:key="user.id">
                        <td scope="row">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" v-bind:id="user.id" v-model="selected" :value="user.id" number>
                                <label class="custom-control-label" v-bind:for="user.id"></label>
                            </div>
                        </td>
                        <td><a v-bind:href="path +'/admin/staff/'+ user.id +'/edit'">{{ user.name }}</a></td>
                        <td>{{ user.profession }}</td>
                        <td>{{ user.email }}</td>
                        <td>
                            <div v-for="group in user.groups" v-bind:key="group.id">
                                <span class="badge badge-pill badge-light">
                                    {{ group.name }}
                                </span>
                            </div>
                        </td>
                        <td>
                            <span v-if="user.email_verified_at" class="badge badge-success">подтвержден</span>
                            <span v-else class="badge badge-warning">не подтвержден</span>

                            <span v-if="user.isAdmin" class="badge badge-warning">admin</span>
                        </td>
                    </tr>

                    <tr v-if="!users">
                        <td scope="row">
                        </td>
                        <td colspan="6">Нет пользователей</td>
                    </tr>
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
                selected: [],
                users: null,
                usersOriginal: null,
                error: null,
                errored: false,
                search: null,
                uid: null,
                path: process.env.MIX_URL
            }
        },
        mounted() {
            axios.get(this.path + '/api/user')
                .then(response => {
                    this.users = this.usersOriginal = response.data;
                })
                .catch(error => {
                    console.error(error.response);
                    this.error = error.response.status + ' ' + error.response.statusText + ' | ' + error.response.data.message;
                    this.errored = true;
                });
        },
        computed: {
            selectAll: {
                get: function(){
                    this.users ? this.selected.lenght == this.users.lenght : false;
                },
                set: function(value){
                    let selected = [];
                    if (value) {
                        this.users.forEach(function(user){
                            selected.push(user.id);
                        });
                    }
                    this.selected = selected;
                }
            }
        },
        methods: {
            deleteSelected: function() {
                if(this.selected.length > 0){
                    if(confirm("Do you really want to delete?")){
                        this.selected.forEach(function(id){
                            let index = this.users.findIndex(function(item){
                                return item.id == id;
                            })
                            axios.delete(this.path + '/api/user/'+id+'/delete')
                            .then(resp => {
                                this.users.splice(index, 1);
                            })
                            .catch(error => {
                                console.log(error);
                            })
                        },this);
                        this.selected = [];

                    }
                } else {
                    alert('Вы не выбрали что удалять');
                }
            },
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
