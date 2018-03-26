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
            b-form(@sumbit="send")
              b-form-group(id="EmailInputGroup"
                            label="Email address"
                            label-for="EmailInput"
                            description="We'll never share your email with anyone else.")
                b-form-input(id="EmailInput"
                              type="email"
                              v-model="form.email"
                              required
                              placeholder="Enter email")
              b-form-group(id="NameInputGroup"
                            label="Your name:"
                            label-for="NameInput")
                b-form-input(id="NameInput"
                              type="text"
                              v-model="form.name"
                              required
                              placeholder="Enter name")
              b-form-group(id="TextInputGroup"
                            label="Your Message"
                            label-for="TextInput")
                b-form-textarea(id="TextInput"
                                v-model="form.text"
                                required
                                placeholder=""
                                :rows="3")
              vue-recaptcha(:sitekey="sitekey" @verify="captchaPass")
              p
              b-button(type="submit" variant="primary" @click.prevent="send") Submit
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
      captcha_challenge: ''
    }
    sitekey: '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI'
  watch:
    locale: (val) ->
      this.$root.$i18n.locale = val
      window.localStorage.language = val
  methods:
    send: (evt) ->
      # TODO: Check data
      console.log(JSON.stringify(@form))
      @modalShow = !@modalShow
    captchaPass: (key) ->
      @form.captcha_challenge = key
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
