<template lang="pug">
  #page-container
    b-navbar(toggleable="md" type="light" variant="light" fixed="top")
      b-navbar-toggle(target="nav_collapse")
      b-navbar-brand(:to="{name:'Home'}") TeamFND
      b-collapse(is-nav id="nav_collapse")
        b-navbar-nav
          b-nav-item(:to="{name:'Projects'}") {{$t('our_projects')}}
          b-nav-item(:to="{name:'About'}") {{$t('about_us')}}
        b-navbar-nav(class="ml-auto")
          b-nav-form
            label(for="locale" style="margin: 5px") {{$t('language')}}:
            b-form-select(v-model="locale")
              option(value="en") English
              //option(value="jp") 日本語
              option(value="ru") Русский
    #app(class="container body-content")
      router-view
      hr
      footer
        p &copy; 2018 TeamFND
</template>

<script lang="coffeescript">
export default
  name: 'app'
  data: () ->
    locale: this.$root.$i18n.locale
  watch:
    locale: (val) ->
      this.$root.$i18n.locale = val
      window.localStorage.language = val
</script>

<i18n src='@/translations/App.yaml'></i18n>

<style lang="sass">
#page-container
  font-family: 'Avenir', Helvetica, Arial, sans-serif
  -webkit-font-smoothing: antialiased
  -moz-osx-font-smoothing: grayscale
#app
  margin-top: 70px
footer
  text-align: left
  font-family: monospace
  font-size: 14px
</style>
