<template>
  <b-container id="course-index">
        <b-row>
            <b-col cols="12">
                <h1>Kursverwaltung</h1>
            </b-col>
        </b-row>

        <b-row>
            <b-col cols="12">
                <courses-list></courses-list>
            </b-col>
        </b-row>

  </b-container>
</template>

<script>

import {mapGetters} from 'vuex'
import CoursesList from "@/components/courses/CoursesList"

export default {
  name: 'CourseIndexView',

  components: {
    CoursesList
  },

  computed: {
      ...mapGetters({
          user: 'user'
      })
  }
  
}
</script>
