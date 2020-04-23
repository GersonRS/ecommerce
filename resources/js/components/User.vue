<style scoped>
    .action-link {
        cursor: pointer;
    }
</style>

<template>
    <div>
        <b-card
            header="featured"
            header-tag="header">
            <template v-slot:header>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span>Users</span>
                    <a class="btn btn-success action-link" tabindex="-1" @click="showCreateUserForm">
                        Create New User <i class="fa fa-user-plus fa-fw"></i>
                    </a>
                </div>
            </template>
            <!-- Current Users -->
            <p class="mb-0" v-if="users.length === 0">
                You have not created any User.
            </p>
            <b-table
                borderless
                responsive
                :items="users"
                :fields="fields"
                v-if="users.length > 0"
                sort-icon-left
                :current-page="currentPage"
                :per-page="perPage">
                <template v-slot:cell(email)="data">
                    <code>{{ data.item.email }}</code>
                </template>
                <template v-slot:cell(actions)="row">
                    <b-button size="sm" @click="edit(row.item)" class="btn btn-default">
                        <i class="fas fa-user-edit"></i>
                    </b-button>
                    <b-button size="sm" @click="destroy(row.item)" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                    </b-button>
                </template>
            </b-table>
            <b-pagination
                v-model="currentPage"
                :total-rows="rows"
                :per-page="perPage"
                align="right">
            </b-pagination>
        </b-card>

        <!-- Create User Modal -->
        <div class="modal fade" id="modal-create-user" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Create User
                        </h4>

                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>

                    <div class="modal-body">
                        <!-- Form Errors -->
                        <div class="alert alert-danger" v-if="createForm.errors.length > 0">
                            <p class="mb-0"><strong>Whoops!</strong> Something went wrong!</p>
                            <br>
                            <ul>
                                <li v-for="error in createForm.errors" v-bind:key="error">
                                    {{ error }}
                                </li>
                            </ul>
                        </div>

                        <!-- Create User Form -->
                        <form role="form">
                            <!-- Name -->
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Name</label>

                                <div class="col-md-9">
                                    <input id="create-user-name" type="text" class="form-control"
                                           @keyup.enter="store" v-model="createForm.name">
                                </div>
                            </div>

                            <!-- Name -->
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Email</label>

                                <div class="col-md-9">
                                    <input id="create-user-email" type="text" class="form-control"
                                           @keyup.enter="store" v-model="createForm.email">
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Password</label>

                                <div class="col-md-9">
                                    <input id="create-user-password" type="password" class="form-control" name="redirect"
                                           @keyup.enter="store" v-model="createForm.password">
                                </div>
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Confirm Password</label>

                                <div class="col-md-9">
                                    <input id="create-user-confirm-password" type="password" class="form-control" name="redirect"
                                           @keyup.enter="store" v-model="createForm.confirmPassword">
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        <button type="button" class="btn btn-primary" @click="store">
                            Create
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit User Modal -->
        <div class="modal fade" id="modal-edit-user" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Edit User
                        </h4>

                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>

                    <div class="modal-body">
                        <!-- Form Errors -->
                        <div class="alert alert-danger" v-if="editForm.errors.length > 0">
                            <p class="mb-0"><strong>Whoops!</strong> Something went wrong!</p>
                            <br>
                            <ul>
                                <li v-for="error in editForm.errors" v-bind:key="error">
                                    {{ error }}
                                </li>
                            </ul>
                        </div>

                        <!-- Edit User Form -->
                        <form role="form">
                            <!-- Name -->
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Name</label>

                                <div class="col-md-9">
                                    <input id="edit-user-name" type="text" class="form-control"
                                           @keyup.enter="update" v-model="editForm.name">
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Email</label>

                                <div class="col-md-9">
                                    <input id="edit-user-email" type="text" class="form-control"
                                           @keyup.enter="update" v-model="editForm.email">
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Password</label>

                                <div class="col-md-9">
                                    <input type="password" class="form-control" name="redirect"
                                           @keyup.enter="update" v-model="editForm.password">
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Confirm Password</label>

                                <div class="col-md-9">
                                    <input type="password" class="form-control" name="redirect"
                                           @keyup.enter="update" v-model="editForm.confirmPassword">
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        <button type="button" class="btn btn-primary" @click="update">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        /*
         * The component's data.
         */
        data() {
            return {
                users: [],

                createForm: {
                    errors: [],
                    name: '',
                    email: '',
                    password: '',
                    confirmPassword: ''
                },

                editForm: {
                    errors: [],
                    name: '',
                    email: '',
                    password: '',
                    confirmPassword: ''
                },

                fields: [
                    {
                        key: 'id',
                        label: 'User ID',
                        sortable: false
                    },
                    {
                        key: 'name',
                        label: 'Name',
                        sortable: true
                    },
                    {
                        key: 'email',
                        label: 'Email',
                        sortable: true,
                    },
                    { key: 'actions', label: 'Actions' }
                ],
                totalRows: 1,
                currentPage: 1,
                perPage: 5,
            };
        },

        computed: {
            rows() {
                return this.users.length
            }
        },

        /**
         * Prepare the component (Vue 1.x).
         */
        ready() {
            this.prepareComponent();
        },

        /**
         * Prepare the component (Vue 2.x).
         */
        mounted() {
            this.prepareComponent();
        },

        methods: {
            /**
             * Prepare the component.
             */
            prepareComponent() {
                this.getUsers();

                $('#modal-create-user').on('shown.bs.modal', () => {
                    $('#create-user-name').focus();
                });

                $('#modal-edit-user').on('shown.bs.modal', () => {
                    $('#edit-user-name').focus();
                });
            },

            /**
             * Get all of the OAuth users for the user.
             */
            getUsers() {
                axios.get('/api/users')
                    .then(response => {
                        this.users = response.data.data;
                    });
            },

            /**
             * Show the form for creating new users.
             */
            showCreateUserForm() {
                $('#modal-create-user').modal('show');
            },

            /**
             * Create a new OAuth user for the user.
             */
            store() {
                this.persistUser(
                    'post', '/api/users',
                    this.createForm, '#modal-create-user'
                );
            },

            /**
             * Edit the given user.
             */
            edit(user) {
                this.editForm.id = user.id;
                this.editForm.name = user.name;
                this.editForm.email = user.email;
                this.editForm.password = user.password;

                $('#modal-edit-user').modal('show');
            },

            /**
             * Update the user being edited.
             */
            update() {
                this.persistUser(
                    'put', '/api/users/' + this.editForm.id,
                    this.editForm, '#modal-edit-user'
                );
            },

            /**
             * Persist the user to storage using the given form.
             */
            persistUser(method, uri, form, modal) {
                form.errors = [];

                axios[method](uri, form)
                    .then(response => {
                        this.getUsers();

                        form.name = '';
                        form.redirect = '';
                        form.errors = [];

                        $(modal).modal('hide');
                    })
                    .catch(error => {
                        if (typeof error.response.data === 'object') {
                            form.errors = _.flatten(_.toArray(error.response.data.errors));
                        } else {
                            form.errors = ['Something went wrong. Please try again.'];
                        }
                    });
            },

            /**
             * Destroy the given user.
             */
            destroy(user) {
                axios.delete('/oauth/users/' + user.id)
                    .then(response => {
                        this.getUsers();
                    });
            }
        }
    }
</script>
