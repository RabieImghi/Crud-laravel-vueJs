<template>
    <nav class="navbar navbar-expand-lg bg-light" data-bs-theme="light">
        <div class="container-fluid">
        <h4>{{ title }}</h4>
        <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <router-link class="nav-link active" to="/">Home
                    <span class="visually-hidden">(current)</span>
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" to="AddContact">Add Contact</router-link>
                </li>
            </ul>
        </div>
        </div>
    </nav>
</template>
<script>
    export default{
        name: 'AppLayout',
        props: {
            title: String
        }
    }
</script>