<template lang="pug">
  #hello
    b-jumbotron(:lead="$t('description')")
      template(slot="header")
        img(src="https://raw.githubusercontent.com/TeamFND/TeamFNDLogo/master/Full.PNG" scale="auto")
      b-btn(variant="primary" :to="{name:'Projects'}") {{$t('view_our_projects')}}
</template>

<script lang="coffeescript">
export default
  name: 'home'
  metaInfo:
    title: 'Landing'
</script>

<i18n src='@/translations/Home.yaml'></i18n>

<style scoped lang="sass">
img
  max-width: 100%
</style>
