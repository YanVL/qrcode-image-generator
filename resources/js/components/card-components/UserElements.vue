<template>
    <div class="pt-3">
        <h1 class="title">Hi! My name is {{ userData.alias }} !</h1>
    </div>
</template>

<style scoped>
.title {
    font-family: 'Open Sans', sans-serif;
    font-size: 1.4em;
    font-weight: 600;
    color: #4047F0;
}
</style>

<script>
export default {
    data() {
        return {
            userData: {}
        };
    },
    mounted() {
        axios.get('/api/businesscard')
            .then(response => {
                this.userData = response.data[0];
                console.log(this.userData)
            });
    }
};
</script>