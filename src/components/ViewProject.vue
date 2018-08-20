<template lang="html">
<div class="viewproject">
<h1>{{ $t('app_name_' + this.$route.params.project_name) }}</h1>
<hr />
<div class="main">
    <h2>{{ $t('description_word') }}</h2>
    {{ $t('main_' + this.$route.params.project_name) }}
    <h2>{{ $t('download_word') }}</h2>
    <ul>
    <li><a :href="'https://github.com/'+$t('github_link_' + this.$route.params.project_name)+'/archive/master.zip'">{{ $t('latest_version') }}</a></li>
    </ul>
    <h2>{{ $t('documentation') }}</h2>
    <ul>
    <li><router-link :to="{name:'ViewDoc', params: {project_name: $route.params.project_name}}">{{ $t('read_online') }}</router-link></li>
    <li><a :href="'https://github.com/'+$t('github_link_' + this.$route.params.project_name)+'/blob/master/DOC_'+this.$root.$i18n.locale.toUpperCase()+'.MD'">{{ $t('view_on_github') }}</a></li>
    </ul>
    <h2>GitHub</h2>
    <ul>
    <li>GitHub {{ $t('link') }}: <a :href="'https://github.com/' + $t('github_link_' + this.$route.params.project_name)" target="_blank">https://github.com/{{$t('github_link_' + this.$route.params.project_name)}}</a> {{ $t('or') }}</li>
    </ul>
    <b-form-input type="text" disabled :value="'git clone https://github.com/' + $t('github_link_' + this.$route.params.project_name) + '.git'"></b-form-input>
    <h2>{{ $t('donate') }}:</h2>
    <div style="overflow:auto">
    <iframe src="https://money.yandex.ru/quickpay/shop-widget?writer=seller&targets=%D0%9D%D0%B0%20%D1%80%D0%B0%D0%B7%D0%B2%D0%B8%D1%82%D0%B8%D0%B5%20%D1%8D%D1%82%D0%BE%D0%B3%D0%BE%20%D0%B8%20%D0%B4%D1%80%D1%83%D0%B3%D0%B8%D1%85%20%D0%BF%D1%80%D0%BE%D0%B5%D0%BA%D1%82%D0%BE%D0%B2&targets-hint=&default-sum=30&button-text=14&payment-type-choice=on&hint=&successURL=fasm4delphi.teamfnd.ru&quickpay=shop&account=410014959153552" width="450" height="213" frameborder="0" allowtransparency="true" scrolling="no"></iframe>
    </div>
</div>
</div>
</template>

<script lang="coffeescript">
export default
  name: "viewproject"
  metaInfo: () ->
    title: this.$t('app_name_' + this.$route.params.project_name)
    meta: [
      { vmid: 'description', name: 'description', content: this.$t('description_' + this.$route.params.project_name) }
      { vmid: 'keywords', name: 'keywords', content: this.$t('keywords_' + this.$route.params.project_name) }
    ]
</script>

<i18n src='@/translations/ViewProject.yaml'></i18n>

<style scoped lang="css">
        .viewproject {
            padding: 5px;
            color: black;
            max-width: 800px;
            margin: auto;
            text-align: center;
        }
        .main {
            text-align: left;
        }
        .lang-span {
            text-align: right;
        }
        .error {
            color: red;
            font-family: monospace;
        }
        h2 {
          padding: 5px;
        }
</style>
