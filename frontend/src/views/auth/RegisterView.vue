<template>
  <b-container id="register-view">
    <b-row class="home">
      <b-col cols="12" md="6" offset-md="3">
        <h1>Registrieren</h1>

          <p>
            Hier kannst du dich für einen Account registieren.
          </p>

        <b-form @submit.prevent="registerUser">
        
          <b-form-group
            id="user-name"
            label="Dein Nutzername"
            label-for="name"
          >
            <b-form-input id="name" v-model="user.name" trim></b-form-input>
          </b-form-group>

          <b-form-group
            id="user-email"
            label="Deine Mailadresse"
            label-for="email"
          >
            <b-form-input id="email" type="email" v-model="user.email" trim></b-form-input>
          </b-form-group>

          <b-form-group
            id="user-email"
            label="Dein Passwort"
            label-for="password"
          >
            <b-form-input id="password" type="password" v-model="user.password" trim></b-form-input>
          </b-form-group>

          <b-form-group
            id="user-email"
            label="Bitte gebe dein Passwort erneut ein"
            label-for="password-confirmation"
          >
            <b-form-input id="password-confirmation" type="password" v-model="user.password_confirmation" trim></b-form-input>
          </b-form-group>

          <b-form-group>
            <b-button type="submit" variant="primary" class="mt-3">Registrieren</b-button>
          </b-form-group>

        </b-form>
      </b-col>
    </b-row>
  </b-container>
  
</template>

<script>

export default {
  name: 'RegisterView',
  data() {
    return {
      user: {
        name: "",
        email: "",
        password: "",
        password_confirmation: ""
      }
    }
  },
  methods: {
    registerUser() {
      this.$store.dispatch('userRegister', this.user)
    }
  }
}
</script>