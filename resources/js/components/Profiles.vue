<template>
    <div>
        <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-lg-8">
                        <form class="form-inline">
                            <div class="form-group">
                                <label for="inputPassword2" class="sr-only">Search</label>
                                <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                            </div>
                            <div class="form-group mx-sm-3">
                                <label for="status-select" class="mr-2">Sort By</label>
                                <select class="custom-select" id="status-select">
                                    <option selected="">All</option>
                                    <option value="1">Name</option>
                                    <option value="2">Post</option>
                                    <option value="3">Followers</option>
                                    <option value="4">Followings</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="text-lg-right mt-3 mt-lg-0">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success waves-effect waves-light float-right" @click = "openContactModal(id= null)">
                                <i class="mdi mdi-plus-circle mr-1"></i> Add New  </button>                        </div>
                    </div><!-- end col-->
                </div> <!-- end row -->
            </div> <!-- end card-box -->
        </div><!-- end col-->
    </div>
        <div class="row">
        <div class="col-lg-4" v-for="contact in contacts" :key="contact.id">
            <div class="text-center card-box">
                <div class="pt-2 pb-2">
                    <img v-bind:src="'/assets/uploaded_images/'+ contact.photo" class="rounded-circle img-thumbnail avatar-xl" alt="profile-image">

                    <h4 class="mt-3"><a href="extras-profile.html" class="text-dark">{{contact.name | capitalFirst}}</a></h4>
                    <p class="text-muted">@{{contact.position | capitalFirst}} <span> | </span> <span> <a href="#" class="text-pink">{{contact.company | capitalFirst}}</a> </span></p>

                    <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Message</button>
                    <button type="button" class="btn btn-light btn-sm waves-effect">Follow</button>

                    <div class="row mt-4">
                        <div class="col-4">
                            <div class="mt-3">
                                <h4>$7845</h4>
                                <p class="mb-0 text-muted text-truncate">Post</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mt-3">
                                <h4>$16.7k</h4>
                                <p class="mb-0 text-muted text-truncate">Followers</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mt-3">
                                <h4>5846</h4>
                                <p class="mb-0 text-muted text-truncate">Followings</p>
                            </div>
                        </div>
                    </div> <!-- end row-->

                </div> <!-- end .padding -->
            </div> <!-- end card-box-->
        </div> <!-- end col -->

    </div>
        <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"  id="contactModalLabel">Add New Contact</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Profiles",
        data(){
            return {
                contacts: {},
                editMode: false,
            }
        },
        methods: {
            loadContacts(){
                this.$Progress.start();
                axios.get('contacts').then(({data}) => (this.contacts = data));
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
