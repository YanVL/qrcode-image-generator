<template>
    <div id="app">
        <Header></Header>
        <div class="container text-center py-5">
            <div class="row">
                <div>
                    <UserElements></UserElements>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Header from './card-components/Header.vue'
import UserElements from './card-components/UserElements.vue'

export default {
    components: {
        Header,
        UserElements,
    }
}
</script>