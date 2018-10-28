<template>
    <div class="vld-parent">
        <loading :active.sync="isLoading" 
        :is-full-page="fullPage"></loading>
        <div class="col-12 mb-3">
            <a href="/administrador/create" class="btn btn-fill btn-primary">
                Nuevo Administrador
            </a>
        </div>
        <div class="col-12">
            <div class="card strpied-tabled-with-hover">
                <div class="card-header ">
                    <h4 class="card-title">Administradores</h4>
                </div>
                <div class="card-body table-full-width table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Fecha de creación</th>
                            <th>Acciones</th>
                        </tr></thead>
                        <tbody>
                            <tr v-for="(admin, key) in admins" v-bind:key="key">
                                <td>{{ admin.name }}</td>
                                <td>{{ admin.email }}</td>
                                <td>{{ admin.created_at }}</td>
                                <td>
                                    <div class="btn-group"> 
                                        <a :href="'/administrador/edit/' + admin.id" class="btn btn-primary btn-fill">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button @click="deleteAdmin(admin.id)" class="btn btn-danger btn-fill">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <b-pagination 
                        :total-rows="total_page"
                        v-model="currentPage" 
                        @change="next_page"
                        :per-page="per_page">
                    </b-pagination>
                </div>
            </div>
        </div>
    </div>
</template>

<script >
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
export default {
    data () {
        return {
            admins: [],
            per_page: null,
            currentPage: 1,
            total_page: null,
            isLoading: true,
            fullPage: true
        }
    },
    components: {
        Loading
    },
    mounted () {
        this.get_admin();
    },
    methods:  {
        get_admin () {
            let vm = this;
            axios.get('/get/administradores')
                .then(response => {
                    vm.admins = response.data.data;
                    vm.per_page = parseInt(response.data['per_page']);
                    vm.currentPage =  parseInt(response.data['current_page']);
                    vm.total_page = parseInt(response.data['total']);
                    vm.isLoading = false;
                });
        },
        next_page (event) {
            const vm = this;
            this.isLoading = true;
            axios.get(`/get/administradores?page=${event}`)
                .then(function (response) {
                    vm.admins = response.data.data;
                    vm.isLoading = false;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
        },
        deleteAdmin (Admin) {
            const vm = this;
            swal({
                title: 'Estas seguro?',
                text: "Lo eliminaras permanentemente",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.value) {
                    axios.delete(`/administrador/delete/${Admin}`)
                    .then( (response) => {
                        vm.get_admin();
                        swal(
                            '¡Eliminado!',
                            response.data,
                            'success'
                        );
                    })
                    .catch(err => {
                        console.log(err);
                    })
                }
            })
        },
    }
}
</script>
