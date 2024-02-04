import { createRouter, createWebHistory } from 'vue-router';
import AddContact from '../components/AddContact';
import ContactList from '../components/ContactList.vue';
import contactUpdate from '../components/UpdateContact.vue';

const routes = [
    {name: 'ContactList', path: '/', component: ContactList},
    {name: 'AddContact', path: '/AddContact', component: AddContact},
    {name: 'contactUpdate', path: '/contactUpdate/:id', component: contactUpdate},
];

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;