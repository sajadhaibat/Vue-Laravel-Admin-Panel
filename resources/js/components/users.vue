<template>
    <div class="row">
        <div class="col-12">
            <div class="card-box">

                <!--<a href="#custom-modal" class="btn btn-danger waves-effect waves-light float-right" data-animation="fadein" data-plugin="custommodal" data-overlayColor="#38414a"><i class="mdi mdi-plus-circle mr-1"></i> Add New</a>-->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger waves-effect waves-light float-right" @click = "openContactModal(id= null)">
                    <i class="mdi mdi-plus-circle mr-1"></i> Add New  </button>
                <h4 class="header-title mb-4">Manage Users</h4>

                <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="contacts-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Position</th>
                        <th>Company</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Subject</th>
                        <th class="hidden-sm">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="contact in contacts" :key="contact.id">
                        <td><b>{{contact.id}}</b></td>
                        <td>
                            <a href="javascript: void(0);" class="text-body">
                                <img src="assets/images/users/user-2.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-xs" />
                                <span class="ml-2">{{contact.name | capitalFirst}}</span>
                            </a>
                        </td>

                        <td>
                            {{contact.position | capitalFirst}}
                        </td>

                        <td>
                            {{contact.company | capitalFirst}}
                        </td>


                        <td>
                            {{contact.email}}
                        </td>

                        <td>
                            {{contact.phone}}
                        </td>
                        <td>
                            {{contact.subject}}
                        </td>

                        <td>
                            <div class="btn-group dropdown">
                                <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" @click="openContactModal(contact)"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Edit Contact</a>
                                    <!--<a class="dropdown-item" href="#"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>Close</a>-->
                                    <a class="dropdown-item" href="#" @click="deleteContact(contact.id)"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Remove</a>
                                    <!--<a class="dropdown-item" href="#"><i class="mdi mdi-star mr-2 font-18 text-muted vertical-middle"></i>Mark as Unread</a>-->
                                </div>
                            </div>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div><!-- end col -->


        <!-- Modal -->
        <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" v-show="!editMode" id="contactModalLabel">Add New Contact</h4>
                        <h4 class="modal-title" v-show="editMode" id="exampleModalLabel">Update Contact</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent = "editMode ? updateContact(): createContact()">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input v-model="form.name" type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
                            </div>
                            <div class="form-group">
                                <label for="position">Position</label>
                                <input v-model="form.position" type="text" class="form-control" id="position" name="positon" placeholder="Enter position" required>
                            </div>
                            <div class="form-group">
                                <label for="company">Company</label>
                                <input v-model="form.company" type="text" class="form-control" id="company" name="company" placeholder="Enter company">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input v-model="form.email" type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="phoneNumber">Phone Number</label>
                                <input v-model="form.phone" type="number" class="form-control" id="phoneNumber" name="phone" placeholder="Enter Phone">
                            </div>
                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <input type="file" class="form-control" id="photo" name="photo">
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <textarea v-model="form.subject" class="form-control" id="subject" name="subject" placeholder="Enter subject"></textarea>
                            </div>

                            <div class="text-right">
                                <!--<button type="submit" class="btn btn-success waves-effect waves-light">Save</button>-->
                                <!--<button type="submit" class="btn btn-danger waves-effect waves-light m-l-10" onclick="Custombox.close();">Cancel</button>-->
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button v-show="!editMode" type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                                <button v-show="editMode" type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

</template>

<script>
    export default {

        name: "users",
        data(){
            return {
                form: new Form({
                    id: '',
                    name : '',
                    position : '',
                    email : '',
                    company : '',
                    phone : '',
                    subject : '',
                    photo : ''
                }),
                contacts: {},
                editMode: false,
            }
        },
        methods: {
            openContactModal(contact){
                if (contact == null){
                    this.form.reset();
                    this.editMode = false;
                }
                else {
                    this.form.fill(contact);
                    this.editMode = true;
                }
                $('#contactModal').modal('show');
            },

            createContact(){
                // this.$Progress.start();
                this.form.post('contacts').then(() => {
                    Fire.$emit('FireUpadte');
                    $('#contactModal').modal('hide');
                    swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'New Contact added successfully',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    // this.$Progress.finish()

                }).catch(() => {
                    swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'There is an error, check fields again',
                        showConfirmButton: false,
                        timer: 1500
                    });
                });

            },
            loadContacts(){
                this.$Progress.start();
                axios.get('contacts').then(({data}) => (this.contacts = data));
            },
            deleteContact(id){
                swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        this.form.delete('contacts/' + id).then( () =>{
                            Fire.$emit('FireUpadte');
                            swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }).catch( () => {
                            swal.fire(
                                'Not Deleted!',
                                'Error has been happened',
                                'error'
                            )
                        });

                    }
                });
            },
            updateContact(){
                this.form.put('contacts/' + this.form.id)
                    .then( () => {
                        Fire.$emit('FireUpadte');
                        $('#contactModal').modal('hide');
                        swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Contact Updated Successfully',
                            showConfirmButton: false,
                            timer: 1500
                        });

                    })
                    .catch( () => {
                        swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Error occured! Try again',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    });
            },
        },

        created() {
            this.loadContacts();
            Fire.$on('FireUpadte', () => { this.loadContacts(); });
        }
    }
</script>


<style scoped>

</style>
