<template>
    <div class="row">
        <div class="col-12">
            <div class="card-box">

                <a href="#custom-modal" class="btn btn-danger waves-effect waves-light float-right" data-animation="fadein" data-plugin="custommodal" data-overlayColor="#38414a"><i class="mdi mdi-plus-circle mr-1"></i> Add New</a>
                <h4 class="header-title mb-4">Manage Users</h4>

                <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Subject</th>
                        <th>Phone Number</th>
                        <th>Created Date</th>
                        <th>Due Date</th>
                        <th class="hidden-sm">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><b>#1256</b></td>
                        <td>
                            <a href="javascript: void(0);" class="text-body">
                                <img src="assets/images/users/user-2.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-xs" />
                                <span class="ml-2">George A. Llanes</span>
                            </a>
                        </td>

                        <td>
                            Support for theme
                        </td>

                        <td>
                            0899999
                        </td>


                        <td>
                            2017/04/28
                        </td>

                        <td>
                            2017/04/28
                        </td>

                        <td>
                            <div class="btn-group dropdown">
                                <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Edit Ticket</a>
                                    <a class="dropdown-item" href="#"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>Close</a>
                                    <a class="dropdown-item" href="#"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Remove</a>
                                    <a class="dropdown-item" href="#"><i class="mdi mdi-star mr-2 font-18 text-muted vertical-middle"></i>Mark as Unread</a>
                                </div>
                            </div>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div><!-- end col -->
        <!-- Modal -->
        <div id="custom-modal" class="modal-demo">
            <button type="button" class="close" onclick="Custombox.modal.close();">
                <span>&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="custom-modal-title">Add User</h4>
            <div class="custom-modal-text text-left">
                <form @submit.prevent = "createContact">
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
                        <!--<input v-model="form.photo" type="file" class="form-control" id="photo" name="photo">-->
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <textarea v-model="form.subject" class="form-control" id="subject" name="subject" placeholder="Enter subject"></textarea>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                        <button type="submit" class="btn btn-danger waves-effect waves-light m-l-10" onclick="Custombox.close();">Cancel</button>
                    </div>
                </form>
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
                    name : '',
                    position : '',
                    email : '',
                    company : '',
                    phone : '',
                    subject : '',
                    photo : ''
                })
            }
        },
        methods: {
            createContact(){
                this.form.post('contacts');
            }
        }
    }
</script>

<style scoped>

</style>
