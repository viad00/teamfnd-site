import Vue from 'vue'
import Router from 'vue-router'
import Meta from 'vue-meta'
import Home from '@/components/Home'
import Projects from '@/components/Projects'
import About from '@/components/About'
import ViewProject from '@/components/ViewProject'
import ViewDocumentation from '@/components/ViewDocumentation'

Vue.use(Router)
Vue.use(Meta)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/projects',
      name: 'Projects',
      component: Projects
    },
    {
      path: '/about',
      name: 'About',
      component: About
    },
    {
      path: '/viewproject/:project_name',
      name: 'View Project',
      component: ViewProject
    },
    {
      path: '/viewdoc/:project_name',
      name: 'ViewDoc',
      component: ViewDocumentation
    }
  ]
})
