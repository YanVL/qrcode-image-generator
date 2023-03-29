<template>
    <div class="container">
        <div v-if="showLoginMessage" class="login-message alert alert-success">
            Account created successfully. Please log in to continue.
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form method="POST" @submit.prevent="login($event)">
                            <input type="hidden" name="_token" :value="csrf_token">

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email Adress</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" required
                                        autocomplete="email" autofocus v-model="email">
                                    <div v-for="error in errors.email" class="text-danger">{{ error }}</div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required
                                        autocomplete="current-password" v-model="password">
                                    <div v-for="error in errors.password" class="text-danger">{{ error }}</div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember">

                                        <label class="form-check-label" for="remember">
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Login</button>

                                    <a class="btn btn-link" href="">Forgot Your Password?</a>
                                </div>
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
    props: ['csrf_token'],
    data() {
        return {
            email: '',
            password: '',
            errors: {}
        }
    },
    mounted() {
        if (localStorage.getItem('showLoginMessage')) {
            this.showLoginMessage = JSON.parse(localStorage.getItem('showLoginMessage'));
            localStorage.setItem('showLoginMessage', false);
        }
    },
    methods: {
        async login(e) {
            e.preventDefault();
            try {
                await axios.get('/sanctum/csrf-cookie');
                const response = await axios.post('/api/login', {
                    email: this.email,
                    password: this.password
                });
                localStorage.setItem('token', response.data.token);
                e.target.submit();
            } catch (error) {
                this.errors = error.response.data.errors;
            }
        }
    },
};
</script>
