<template>
    <div class="left-side-menu">

        <div class="slimscroll-menu">

            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul class="metismenu" id="side-menu">

                    <li class="menu-title">Navigation</li>
                    <br>
                    <li style="padding:10px 20px">
                        <router-link to="/dashboard"><i class="fe-settings"></i> Dashboard</router-link>
                    </li>
                    <li style="padding:10px 20px">
                        <router-link to="/users"><i class="fe-user"></i> Users Lists</router-link>
                    </li>

                    <li style="padding:10px 20px">
                        <router-link to="/profiles"><i class="fe-user-check"></i> Profles</router-link>
                    </li>
                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>

</template>

<script>
    export default {
        name: "sidebar"
    }
</script>

<style scoped>

</style>
