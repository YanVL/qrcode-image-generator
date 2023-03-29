<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">QR Code Image Generator - Take a screenshot on your phone to use as a digital card.</div>
                    <div class="card-body">
                        <form @submit.prevent="submitForm($event)">
                            <div class="form-group mb-3">
                                <label for="alias">Alias:</label>
                                <input type="text" class="form-control" id="alias" v-model="alias" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="linkedin_url">LinkedIn URL:</label>
                                <input type="url" class="form-control" id="linkedin_url" v-model="linkedin_url" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="github_url">GitHub URL:</label>
                                <input type="url" class="form-control" id="github_url" v-model="github_url" required>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Generate Image</button>
                                <button v-if="success" @click="showCard" type="button" class="btn btn-success">See my Card</button>
                            </div>
                        </form>
                        <div v-if="success" class="alert alert-success mt-4" role="alert">
                            The image was successfully generated!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user_id: '',
            alias: '',
            linkedin_url: '',
            github_url: '',
            success: false,
        };
    },
     mounted() {
        axios.get('/api/user')
            .then(response => {
                this.user_id = response.data;
            })
            .catch(error => {
                console.log(error);
            });
    },
    methods: {
        async submitForm(e) {
            e.preventDefault();
            try {
                await axios.get('/sanctum/csrf-cookie');
                const response = await axios.post('/api/businesscard', {
                    alias: this.alias,
                    linkedin_url: this.linkedin_url,
                    github_url: this.github_url,
                    user_id: this.user_id,
                });
                this.success = true;
            } catch (error) {
                this.errors = error.response.data.errors;
            }
        },
        showCard() {
            window.location.href = '/card';
        }
        
    },
};
</script>
