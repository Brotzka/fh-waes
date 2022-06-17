<template>
    <div>
        <h2>Übersicht</h2>
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