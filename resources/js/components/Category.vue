<template>
    <div class="vld-parent">
        <loading :active.sync="isLoading" 
            :is-full-page="fullPage"></loading>
        <div class="col-12 mb-2">
            <a href="categories/create" class="btn btn-fill btn-primary">
                Nuevo Trámite
            </a>
        </div>
        <div class="col-12">
            <div class="card strpied-tabled-with-hover">
                <div class="card-header ">
                    <h4 class="card-title">Trámites y servicios</h4>
                    <p class="card-category">
                        {{ total_page }} trámites y servicios agregados.
                    </p>
                </div>
                <div class="card-body table-full-width table-responsive">
                    <div class="container" v-if="categorias.length < 1">
                        <div class="alert alert-danger" >
                            No hay trámites aún.
                        </div>
                    </div>
                    <table class="table table-hover table-striped" v-if="categorias.length > 0">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Autor</th>
                            <th>Fecha de creación</th>
                            <th>Acciones</th>
                        </tr></thead>
                        <tbody>
                            <tr v-for="(category, key) in categorias" v-bind:key="key">
                                <td>{{ category.name }}</td>
                                <td>{{ category.user.email }}</td>
                                <td>{{ category.created_at }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a :href="'article/' + category.id +'/create'" v-if="!category.article" class="btn btn-fill btn-primary">
                                            Agregar contenido
                                        </a>
                                        <a :href="'article/' + category.article.id" v-if="category.article" class="btn btn-fill btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a :href="'article/' + category.article.id +'/edit'" v-if="category.article" class="btn btn-fill btn-success">
                                            Editar contenido
                                        </a>
                                        <a :href="'categories/' + category.id + '/edit'" class="text-white btn btn-fill btn-dark">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button @click="deleteCategory(category.id)" class="btn btn-fill btn-danger">
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

<script>
    import Loading from 'vue-loading-overlay';
    import 'vue-loading-overlay/dist/vue-loading.css';
    export default {
        data: function () {
            return {
                categorias: [],
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
            this.get_categories();
        },
        methods: {
            get_categories () {
                let vm = this;
                axios.get('categories')
                    .then(response => {
                        vm.categorias = response.data.data;
                        vm.per_page = parseInt(response.data['per_page']);
                        vm.currentPage =  parseInt(response.data['current_page']);
                        vm.total_page = parseInt(response.data['total']);
                        vm.isLoading = false;
                    });
            },
            next_page (event) {
                const vm = this;
                this.isLoading = true;
                axios.get(`/categories?page=${event}`)
                    .then(function (response) {
                        vm.categorias = response.data.data;
                        vm.isLoading = false;
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
            },
            deleteCategory (category) {
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
                      axios.delete(`/categories/${category}`)
                        .then( (response) => {
                            vm.get_categories();
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