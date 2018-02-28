<template lang="pug">
  #about
    b-jumbotron(:header="$t('about_us')" :lead="$t('our_description')")
    h1 {{$t('our_people')}}
    br
    b-container
      b-row
        b-col(sm="12" md="12" lg="6" xl="6")
          b-card(:title="$t('artem_gavrilov')" )
            p(class="card-text") {{$t('artem_gavrilov_short_description')}}
            ul
              li E-mail: cx-1212@yandex.ru
              li VK: <a href="https://vk.com/artgav">vk.com/artgav</a>
        b-col(sm="12" md="12" lg="6" xl="6")
          b-card(:title="$t('vladislav_utkin')" )
            p(class="card-text") {{$t('vladislav_utkin_short_description')}}
            ul
              li E-mail: vlad@teamfnd.ru
              li Telegram: @viad00
              li VK: <a href="https://vk.com/viad2">vk.com/viad2</a>
              li Jabber: vlad@teamfnd.ru
</template>

<script lang="coffeescript">
export default
  name: "about"
</script>

<i18n src='@/translations/About.yaml'></i18n>
<i18n src='@/translations/App.yaml'></i18n>

<style scoped lang="sass">
</style>
