import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

//---------- main components ----------
import Card from "./components/Card.vue";
app.component("card-component", Card);

import Home from "./components/Home.vue";
app.component("home-component", Home);

import Login from './components/Login.vue';
app.component('login-component', Login);

import Profile from "./components/Profile.vue";
app.component("profile-component", Profile);

import Register from "./components/Register.vue";
app.component("register-component", Register);

import Welcome from "./components/Welcome.vue";
app.component("welcome-component", Welcome);

//---------- card components ----------
import Header from "./components/card-components/Header.vue";
app.component("header-component", Header);

import UserElements from "./components/card-components/UserElements.vue";
app.component("user-elements-component", UserElements);

app.mount('#app');
