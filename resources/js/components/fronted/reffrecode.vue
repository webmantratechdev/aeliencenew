<template>
    <div></div>
</template>
<script>
export default {
    data: () => ({

    }),
    methods: {
        getreffrecode() {
            var userid = this.$route.params.reffrecode;
            localStorage.setItem('reffrecode', userid);
            this.$router.push('/signup');
        }
    },mounted(){
        this.getreffrecode()
    }
}
</script>