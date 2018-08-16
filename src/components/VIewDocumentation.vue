<template lang="pug">
  #viewdoccontainer
    #viewdoc_head
      router-link(:to="{name:'View Project', params: {project_name: $route.params.project_name}}") {{ $t('app_name_' + this.$route.params.project_name) }}
    #viewdoc
      vue-markdown(:source="this.markdown_data")
</template>

<script lang="coffeescript">
import VueMarkdown from 'vue-markdown'
import Axios from 'axios'
export default
  name: "viewdoc"
  data: () ->
    markdown_data: 'Please wait...'
  metaInfo: () ->
    title: this.$t('app_name_' + this.$route.params.project_name) + ' Documentation'
  components: { VueMarkdown }
  methods: 
    getMarkdown: () ->
      Axios.get('https://raw.githubusercontent.com/' + @$t('github_link_' + this.$route.params.project_name) + '/master/DOC_' + this.$root.$i18n.locale.toUpperCase() + '.MD')
        .then((response) => (this.markdown_data = response.data))
        .catch((error) => (this.markdown_data = 'Sorry, but there was an error while loading documentation: </br></br>' + error.message))
  created: () ->
    this.getMarkdown()
  watch:
    '$root.$i18n.locale': (val, oldVal) ->
      this.markdown_data = 'Locale changed, please wait...'
      this.getMarkdown()
</script>

<i18n src='@/translations/ViewProject.yaml'></i18n>

<style scoped lang="sass">
#viewdoc
    padding: 5px
    max-width: 800px
    margin: auto
    overflow: auto
#viewdoc_head
    text-align: center
    font-size: 40px
</style>
