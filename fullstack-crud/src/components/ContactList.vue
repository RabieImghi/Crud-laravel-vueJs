<template>
    <div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Designation</th>
            <th scope="col">Contact No</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody v-for="contact in conatctsData" :key="contact.id">
            <tr>
                <th scope="row">{{ contact.id }}</th>
                <th scope="row">{{ contact.name }}</th>
                <th scope="row">{{ contact.email }}</th>
                <th scope="row">{{ contact.designation }}</th>
                <th scope="row">{{ contact.contact_no }}</th>
                <th scope="row">
                    <button class="btn btn-primary" @click="deleteContact(contact.id)">Delete</button>
                    <router-link :to="{ name: 'contactUpdate', params: { id: contact.id, name:contact.name,email:contact.email,
                                        designation:contact.designation,contact_no:contact.contact_no  } }
                    ">
                        <button class="btn btn-primary">Update</button>
                    </router-link>
                </th>
            </tr>
        </tbody>
    </table>
    </div>
</template>
<style>

</style>
<script>
    import axios from 'axios';

    export default{
        name: 'ContactList',
        data(){
            return {
                conatctsData: Array,
            }
        },
        created(){
            this.contactId = this.$route.params.id;
            this.getContacts();
        },
        methods: {
            async getContacts(){
                let url = "http://127.0.0.1:8000/api/Contacts";
                await axios.get(url).then(Response=>{
                    this.conatctsData= Response.data.Contacts;
                }).catch(error => {
                    console.log(error);
                });
            },
            deleteContact(contactId) {
                let url = `http://127.0.0.1:8000/api/DeleteContact/${contactId}`;
                const response = axios.get(url);
                this.conatctsData = this.conatctsData.filter(contact => contact.id !== contactId); 
            },
            updateContact(contactId){

            }
        },
        mounted(){
        }
    }
</script>