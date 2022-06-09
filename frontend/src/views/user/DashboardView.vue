<template>
  <b-container id="dashboard">
      <b-row>
          <b-col cols="12">
                <h1>Hey {{ user.name }}</h1>
          </b-col>
      </b-row>
  </b-container>
</template>

<script>

import {mapGetters} from 'vuex'

export default {
  name: 'DashboardView',

  computed: {
      ...mapGetters({
          user: 'user'
      })
  }
  
}
</script>
