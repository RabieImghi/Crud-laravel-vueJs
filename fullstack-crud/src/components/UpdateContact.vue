<template>
   <form class="container" @submit.prevent="updateContacts()" novalidate>
        <div class="alert alert-danger mt-4" v-if="errors.length">
            <ul class="mb-0">
                <li v-for="(error,index) in errors" :key="index">{{ error }}</li>
            </ul>
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name </label>
            <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp"  v-model="contact.name">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"  v-model="contact.email">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">designation</label>
            <input type="text" name="designation" class="form-control" id="designation"  v-model="contact.designation">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Contact No</label>
            <input type="text" name="contact_no" class="form-control" id="contact_no"  v-model="contact.contact_no">
        </div>
        <button class="btn btn-primary">Submit</button>
    </form>
</template>
<script>
import axios from 'axios';
    export default{
        name: 'UpdateContact',
        data(){
            return {
                contactId: null,
                contactData: {},
                contact: {},
                name:'',
                email:'',
                designation: '',
                contact_no:'',
                errors:[]
            }
        },
        created(){
            this.contact.id = this.$route.params.id;
            this.contact.name = this.$route.params.name;
            this.contact.email = this.$route.params.email;
            this.contact.designation = this.$route.params.designation;
            this.contact.contact_no = this.$route.params.contact_no;
        },
        methods:{
            updateContacts(){
                this.errors= [];
                if(!this.contact.id){ this.errors.push("Name Is required")}
                if(!this.contact.email){ this.errors.push("Email Is required")}
                if(!this.contact.designation){ this.errors.push("Designation Is required")}
                if(!this.contact.contact_no){ this.errors.push("Contact No Is required")}
                if(!this.errors.length){
                    let formData = new FormData();
                    formData.append('name',this.contact.name);
                    formData.append('email',this.contact.email);
                    formData.append('designation',this.contact.designation);
                    formData.append('contact_no',this.contact.contact_no);
                    let url =`http://127.0.0.1:8000/api/updateContact/${this.contact.id}`;
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