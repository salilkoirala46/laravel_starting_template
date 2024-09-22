<template>
   <div class="home">
      <button @click="testApi">Test API</button>
   </div>
</template>

<script>


export default {
    methods: {
        async testApi() {
            const res = await this.$axios.get('cars');    //$axios variable is set in app.js  which utilises axios.js   
            console.log(res.data);
        }
    }
}
</script>