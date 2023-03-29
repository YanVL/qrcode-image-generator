<template>
    <div class="container py-5 d-flex justify-content-center align-items-center flex-column">
        <div class="apresentation">
            <h1 class="py-1">Hello! My name is {{ userData.alias }}! </h1>
            <h2>... and this is my story</h2>
        </div>
        <p class="py-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu suscipit orci, in laoreet neque. Maecenas
            pulvinar nisi tellus, vitae tempus tortor bibendum vel. Curabitur suscipit turpis nec interdum sodales.
            Pellentesque libero dui, tincidunt at viverra bibendum, laoreet et purus. Mauris non est id sem consequat
            ornare. Phasellus feugiat pulvinar lacinia. Cras consectetur vel tellus nec varius. In tempus risus sit amet
            nibh ultricies ullamcorper.</p>
        <div class="row py-2">
            <div class="col-6">
                <a :href="userData.github_url" class="btn btn-dark" target="_blank" role="button">Github</a>
            </div>
            <div class="col-6">
                <a :href="userData.linkedin_url" class="btn btn-primary" target="_blank" role="button">Linkedin</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            userData: {}
        };
    },
    mounted() {
        const id = window.location.pathname.split('/').pop();

        axios.get(`/api/businesscard/${id}`)
            .then(response => {
                this.userData = response.data;
            });
    }
};
</script>

<style>
.apresentation {
    font-family: 'Montserrat', sans-serif;
    font-size: 2em;
}
</style>