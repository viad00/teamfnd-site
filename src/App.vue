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
          b-nav-item(@click="modalShow = !modalShow") {{$t('contact_us')}}
          b-modal(id="contactus" hide-footer :title="$t('contact_us')" v-model="modalShow")
            b-form(action="/contact.php" method="post")
              b-form-group(id="EmailInputGroup"
                            :label="$t('email_address')"
                            label-for="EmailInput"
                            :description="$t('email_disclaimer')")
                b-form-input(id="EmailInput"
                              type="email"
                              v-model="form.email"
                              name="email"
                              required
                              :placeholder="$t('email_placeholder')")
              b-form-group(id="NameInputGroup"
                            :label="$t('your_name')"
                            label-for="NameInput")
                b-form-input(id="NameInput"
                              type="text"
                              v-model="form.name"
                              name="name"
                              required
                              :placeholder="$t('name_placeholder')")
              b-form-group(id="TextInputGroup"
                            :label="$t('your_message')"
                            label-for="TextInput")
                b-form-textarea(id="TextInput"
                                v-model="form.text"
                                name="body"
                                required
                                placeholder=""
                                :rows="3")
              vue-recaptcha(:sitekey="sitekey" @verify="captchaPass" @expired="captchaFailed")
              p
              b-button(type="submit" variant="primary" :disabled="!allowsend") {{$t('submit')}}
          b-nav-form
            label(for="locale" style="margin: 5px") {{$t('language')}}:
            b-form-select(v-model="locale")
              option(value="en") English
              option(value="jp") 日本語
              option(value="ru") Русский
    #app(class="container body-content")
      router-view
      hr
      footer
        p &copy; 2018 TeamFND <a href="mailto:info@teamfnd.ru">info@teamfnd.ru</a>
</template>

<script lang="coffeescript">
import VueRecaptcha from 'vue-recaptcha'
export default
  name: 'app'
  data: () ->
    locale: this.$root.$i18n.locale
    modalShow: false
    form: {
      email: ''
      name: ''
      text: ''
    }
    sitekey: '6LcGPU8UAAAAAA0lp61LBl2aTR0k6E_Hf1j4dkHx'
    allowsend: false
  watch:
    locale: (val) ->
      this.$root.$i18n.locale = val
      window.localStorage.language = val
  methods:
    captchaPass: (key) ->
      @form.captcha_challenge = key
      @allowsend = true
    captchaFailed: () ->
      @allowsend = false
  components: { VueRecaptcha }
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
