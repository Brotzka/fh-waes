<template>
<div>
  <b-navbar toggleable="lg" type="light" variant="primary">
    <b-navbar-brand to="/">NavBar</b-navbar-brand>

    <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

    <b-collapse id="nav-collapse" is-nav>
      <b-navbar-nav v-if="!loggedIn">
        <b-nav-item to="login">Einloggen</b-nav-item>
        <b-nav-item to="register">Registrieren</b-nav-item>
      </b-navbar-nav>

      <b-navbar-nav v-else>
        <b-nav-item-dropdown right>
          <!-- Using 'button-content' slot -->
          <template #button-content>
            {{ user.name }}
          </template>
          
          <b-dropdown-item to="dashboard">Dashboard</b-dropdown-item>
          <b-dropdown-item href="#" @click="logout">Logout</b-dropdown-item>
        </b-nav-item-dropdown>

        <b-nav-item to="courses">Kursübersicht</b-nav-item>
      </b-navbar-nav>

    </b-collapse>
  </b-navbar>
</div>
</template>

<script>

import {mapGetters, mapState} from 'vuex'

export default {
  name: 'NavBar',

  methods: {
    logout() {
      this.$store.dispatch('logout')

      this.$router.push({name: 'home'})
    }
  },

  computed: {
    ...mapGetters({
      loggedIn: 'userLoggedIn',
      user: 'user'
    }),
    ...mapState({
      userDetails: 'user'
    })
  }
}

</script>

<style>

</style>
