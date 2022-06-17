<template>
    <div>
        <h2>Übersicht</h2>

        <table v-if="courses.length > 0">
            <tr>
                <th>Name</th>
                <th>Beschreibung</th>
                <th>Startet am</th>
                <th>Endet am</th>
            </tr>
            <tr v-for="course in courses" :key="course.id">
                <td>{{ course.name }}</td>
                <td>{{ course.description }}</td>
                <td>{{ course.start_date }}</td>
                <td>{{ course.end_date }}</td>
            </tr>
        </table>

        
    </div>
</template>

<script>

export default {
  name: 'CoursesList',
  computed: {},
  data() {
    return {
        courses: []
    }
  },

  methods: {
    getCourses() {
        this.$http.get('/courses/list')
            .then(response => {
                console.log(response)
                this.courses = response.data.data
            })
            .catch(error => {
                console.error(error)
            })
    }
  },

  mounted() {
    this.getCourses()
  }
}

</script>

<style lang="scss">

</style>