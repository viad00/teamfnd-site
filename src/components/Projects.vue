<template lang="pug">
  #projects
    b-container
      b-row
        b-col(sm="12" md="12" lg="6" xl="6")
          b-card(title="Fasm4Delphi" class="mb-3")
            p(class="card-text") {{$t('fasm4delphi_description')}}
            b-button(:to="{name:'View Project', params: {project_name: 'fasm4delphi'}}") {{$t('project_site')}}
            //span https://teamfnd.ru/#/viewproject/fasm4delphi
        b-col(sm="12" md="12" lg="6" xl="6")
          b-card(title="TeamFND" class="mb-3")
            p(class="card-text") {{$t('teamfind_description')}}
            b-button(href="https://find.teamfnd.ru" target="_blank") {{$t('project_site')}}
            span https://find.teamfnd.ru
        b-col(sm="12" md="12" lg="6" xl="6")
          b-card(title="FasmOnDelphi" class="mb-3")
            p(class="card-text") {{$t('fasmondelphi_description')}}
            b-button(:to="{name:'View Project', params: {project_name: 'fasmondelphi'}}") {{$t('project_site')}}
            //span https://teamfnd.ru/#/viewproject/fasmondelphi
      //
        b-col(sm="12" md="12" lg="6" xl="6")
          b-card(title="Name")
            p(class="card-text") desc
            b-button Go on
</template>

<script lang="coffeescript">
export default
  name: "projects"
  metaInfo:
    title: 'Our projects'
</script>

<i18n src='@/translations/Projects.yaml'></i18n>

<style scoped lang="sass">
  span
    margin-left: 20px
    color: #b0b0b0
    overflow: auto
</style>
