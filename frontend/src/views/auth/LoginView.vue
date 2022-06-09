<template>
  <b-container>
    <b-row class="home">
      <b-col cols="12" md="6" offset-md="3">
        <h1>Einloggen</h1>

        <p>
          Logge dich mit deinen Zugangsdaten ein.
        </p>

        <b-form @submit.prevent="loginUser">


          <b-form-group id="user-email" label="Deine Mailadresse" label-for="email">
            <b-form-input id="email" type="email" v-model="user.email" trim></b-form-input>
          </b-form-group>

          <b-form-group id="user-email" label="Dein Passwort" label-for="password">
            <b-form-input id="password" type="password" v-model="user.password" trim></b-form-input>
          </b-form-group>

          <b-form-group>
            <b-button type="submit" variant="primary" class="mt-3">Login</b-button>
          </b-form-group>

        </b-form>
      </b-col>
    </b-row>
  </b-container>

</template>

<script>
import {mapGetters} from 'vuex'

export default {
  name: 'LoginView',
  data() {
    return {
      user: {
        email: "",
        password: ""
      }
    }
  },

  computed: {
    ...mapGetters({
      loggedIn: 'userLoggedIn'
    })
  },

  methods: {
    async loginUser() {
      this.$store.dispatch('userLogin', this.user)

      // Empty all fields 
      this.user = {
        email: "",
        password: ""
      }

      const vm = this
      setTimeout(function () {
        vm.$router.push({ name: "dashboard" })
      }, 300)
    }
  },
  mounted() {
    if(this.loggedIn) {
      this.$router.push({ name: "dashboard" })
    }
  }
}
</script>