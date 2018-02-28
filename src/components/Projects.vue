<template lang="pug">
  #projects
    b-container
      b-row
        b-col(sm="12" md="12" lg="6" xl="6")
          b-card(title="Fasm4Delphi" class="mb-3")
            p(class="card-text") {{$t('fasm4delphi_description')}}
            b-button(href="http://fasm4delphi.teamfnd.ru" target="_blank") {{$t('project_site')}}
            span http://fasm4delphi.teamfnd.ru
        b-col(sm="12" md="12" lg="6" xl="6")
          b-card(title="TeamFND")
            p(class="card-text") {{$t('teamfind_description')}}
            b-button(href="https://find.teamfnd.ru" target="_blank") {{$t('project_site')}}
            span https://find.teamfnd.ru
      //
        b-col(sm="12" md="12" lg="6" xl="6")
          b-card(title="Name")
            p(class="card-text") desc
            b-button Go on
</template>

<script lang="coffeescript">
export default
  name: "projects"
</script>

<i18n src='@/translations/Projects.yaml'></i18n>

<style scoped lang="sass">
  span
    margin-left: 20px
    color: #b0b0b0
</style>
