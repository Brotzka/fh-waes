<template>
  <b-container id="course ubdex">
      <b-row>
          <b-col cols="12">
                <h1>Kursverwaltung</h1>
          </b-col>
      </b-row>

      <b-row>
        <b-col cols="12"></b-col>
          <courses-list></courses-list>
      </b-row>
  </b-container>
</template>

<script>

import {mapGetters} from 'vuex'
import CoursesList from "@/components/courses/CoursesList.vue"

export default {
  name: 'CourseIndexView',

components:{
  CoursesList
},

  computed: {
      ...mapGetters({
          user: 'user'
      })
  }
  
}
</script>
