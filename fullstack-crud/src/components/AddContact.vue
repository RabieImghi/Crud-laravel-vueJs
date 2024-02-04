<template>
   <form class="container" @submit.prevent="saveContact()" novalidate>
        <div class="alert alert-danger mt-4" v-if="errors.length">
            <ul class="mb-0">
                <li v-for="(error,index) in errors" :key="index">{{ error }}</li>
            </ul>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name </label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="contact.name">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="contact.email">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">designation</label>
            <input type="text" name="designation" class="form-control" id="exampleInputPassword1" v-model="contact.designation">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Contact No</label>
            <input type="text" name="contact_no" class="form-control" id="exampleInputPassword1" v-model="contact.contact_no">
        </div>
        <button class="btn btn-primary">Submit</button>
    </form>
</template>
<script>
import axios from 'axios';
    export default{
        name: 'AddContact',
        data(){
            return {
                contact: {},
                name:'',
                email:'',
                designation: '',
                contact_no:'',
                errors:[]
            }
        },
        methods:{
            saveContact(){
                this.errors= [];
                if(!this.contact.name){ this.errors.push("Name Is required")}
                if(!this.contact.email){ this.errors.push("Email Is required")}
                if(!this.contact.designation){ this.errors.push("Designation Is required")}
                if(!this.contact.contact_no){ this.errors.push("Contact No Is required")}
                if(!this.errors.length){
                    let formData = new FormData();
                    formData.append('name',this.contact.name);
                    formData.append('email',this.contact.email);
                    formData.append('designation',this.contact.designation);
                    formData.append('contact_no',this.contact.contact_no);
                    let url ="http://127.0.0.1:8000/api/SaveConstact";
                    axios.post(url,this.contact).then(response => {
                        console.log(response);
                        this.$router.push({ name: 'ContactList' });
                    }).catch(error => {
                        console.error('Error:', error);
                    });
                    
                }
            }
        }
    }
</script>