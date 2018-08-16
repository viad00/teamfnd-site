<template lang="pug">
  #hello
    b-jumbotron(header="TeamFND" :lead="$t('description')")
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
</style>
