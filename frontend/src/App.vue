<template>
  <div id="app">

    <nav-bar></nav-bar>
    
    <router-view/>

  </div>
</template>

<script>
import NavBar from './components/nav/NavBar.vue'

export default {
  name: 'App',
  components: {
    NavBar
  }
}

</script>

<style lang="scss">

</style>
