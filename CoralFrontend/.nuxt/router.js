import Vue from 'vue'
import Router from 'vue-router'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _ac89166c = () => interopDefault(import('..\\pages\\admin.vue' /* webpackChunkName: "pages_admin" */))
const _0039c878 = () => interopDefault(import('..\\pages\\admin\\index.vue' /* webpackChunkName: "pages_admin_index" */))
const _6e7e1bd8 = () => interopDefault(import('..\\pages\\admin\\users\\index.vue' /* webpackChunkName: "pages_admin_users_index" */))
const _02966c6b = () => interopDefault(import('..\\pages\\admin\\settings\\picklists\\index.vue' /* webpackChunkName: "pages_admin_settings_picklists_index" */))
const _5b90a4e3 = () => interopDefault(import('..\\pages\\admin\\users\\add.vue' /* webpackChunkName: "pages_admin_users_add" */))
const _e899389c = () => interopDefault(import('..\\pages\\admin\\users\\edit\\_id.vue' /* webpackChunkName: "pages_admin_users_edit__id" */))
const _0b672d08 = () => interopDefault(import('..\\pages\\admin\\users\\_id.vue' /* webpackChunkName: "pages_admin_users__id" */))
const _41f3c3e4 = () => interopDefault(import('..\\pages\\login.vue' /* webpackChunkName: "pages_login" */))
const _784c20cd = () => interopDefault(import('..\\pages\\index.vue' /* webpackChunkName: "pages_index" */))
const _31732315 = () => interopDefault(import('..\\pages\\index\\index.vue' /* webpackChunkName: "pages_index_index" */))
const _49579fd7 = () => interopDefault(import('..\\pages\\index\\calendar\\index.vue' /* webpackChunkName: "pages_index_calendar_index" */))
const _7e8d74a4 = () => interopDefault(import('..\\pages\\index\\companies\\index.vue' /* webpackChunkName: "pages_index_companies_index" */))
const _2b9aaba2 = () => interopDefault(import('..\\pages\\index\\contacts\\index.vue' /* webpackChunkName: "pages_index_contacts_index" */))
const _2cf68230 = () => interopDefault(import('..\\pages\\index\\leads\\index.vue' /* webpackChunkName: "pages_index_leads_index" */))
const _145940de = () => interopDefault(import('..\\pages\\index\\tasks\\index.vue' /* webpackChunkName: "pages_index_tasks_index" */))
const _0dc7cd50 = () => interopDefault(import('..\\pages\\index\\tickets\\index.vue' /* webpackChunkName: "pages_index_tickets_index" */))
const _1e6de766 = () => interopDefault(import('..\\pages\\index\\calendar\\add.vue' /* webpackChunkName: "pages_index_calendar_add" */))
const _4bcd8529 = () => interopDefault(import('..\\pages\\index\\calendar\\list.vue' /* webpackChunkName: "pages_index_calendar_list" */))
const _a686e91a = () => interopDefault(import('..\\pages\\index\\companies\\add.vue' /* webpackChunkName: "pages_index_companies_add" */))
const _410769f1 = () => interopDefault(import('..\\pages\\index\\contacts\\add.vue' /* webpackChunkName: "pages_index_contacts_add" */))
const _66c996b7 = () => interopDefault(import('..\\pages\\index\\leads\\add.vue' /* webpackChunkName: "pages_index_leads_add" */))
const _586a4da0 = () => interopDefault(import('..\\pages\\index\\tasks\\add.vue' /* webpackChunkName: "pages_index_tasks_add" */))
const _a75665b2 = () => interopDefault(import('..\\pages\\index\\tickets\\add.vue' /* webpackChunkName: "pages_index_tickets_add" */))
const _61e777f5 = () => interopDefault(import('..\\pages\\index\\calendar\\edit\\_id.vue' /* webpackChunkName: "pages_index_calendar_edit__id" */))
const _a947c37c = () => interopDefault(import('..\\pages\\index\\companies\\edit\\_id.vue' /* webpackChunkName: "pages_index_companies_edit__id" */))
const _10d9a640 = () => interopDefault(import('..\\pages\\index\\contacts\\edit\\_id.vue' /* webpackChunkName: "pages_index_contacts_edit__id" */))
const _4d46b2f4 = () => interopDefault(import('..\\pages\\index\\leads\\edit\\_id.vue' /* webpackChunkName: "pages_index_leads_edit__id" */))
const _32ae6aa2 = () => interopDefault(import('..\\pages\\index\\tasks\\edit\\_id.vue' /* webpackChunkName: "pages_index_tasks_edit__id" */))
const _3fe148f6 = () => interopDefault(import('..\\pages\\index\\tickets\\edit\\_id.vue' /* webpackChunkName: "pages_index_tickets_edit__id" */))
const _5dbc2948 = () => interopDefault(import('..\\pages\\index\\user\\edit\\_id.vue' /* webpackChunkName: "pages_index_user_edit__id" */))
const _85aca802 = () => interopDefault(import('..\\pages\\index\\calendar\\_id.vue' /* webpackChunkName: "pages_index_calendar__id" */))
const _4b78500c = () => interopDefault(import('..\\pages\\index\\companies\\_id.vue' /* webpackChunkName: "pages_index_companies__id" */))
const _4079a2ec = () => interopDefault(import('..\\pages\\index\\contacts\\_id.vue' /* webpackChunkName: "pages_index_contacts__id" */))
const _05855b50 = () => interopDefault(import('..\\pages\\index\\leads\\_id.vue' /* webpackChunkName: "pages_index_leads__id" */))
const _11b3db8e = () => interopDefault(import('..\\pages\\index\\tasks\\_id.vue' /* webpackChunkName: "pages_index_tasks__id" */))
const _4b1091c0 = () => interopDefault(import('..\\pages\\index\\tickets\\_id.vue' /* webpackChunkName: "pages_index_tickets__id" */))
const _1d669792 = () => interopDefault(import('..\\pages\\index\\user\\_id.vue' /* webpackChunkName: "pages_index_user__id" */))

// TODO: remove in Nuxt 3
const emptyFn = () => {}
const originalPush = Router.prototype.push
Router.prototype.push = function push (location, onComplete = emptyFn, onAbort) {
  return originalPush.call(this, location, onComplete, onAbort)
}

Vue.use(Router)

export const routerOptions = {
  mode: 'history',
  base: decodeURI('/'),
  linkActiveClass: 'nuxt-link-active',
  linkExactActiveClass: 'nuxt-link-exact-active',
  scrollBehavior,

  routes: [{
    path: "/admin",
    component: _ac89166c,
    children: [{
      path: "",
      component: _0039c878,
      name: "admin"
    }, {
      path: "users",
      component: _6e7e1bd8,
      name: "admin-users"
    }, {
      path: "settings/picklists",
      component: _02966c6b,
      name: "admin-settings-picklists"
    }, {
      path: "users/add",
      component: _5b90a4e3,
      name: "admin-users-add"
    }, {
      path: "users/edit/:id?",
      component: _e899389c,
      name: "admin-users-edit-id"
    }, {
      path: "users/:id",
      component: _0b672d08,
      name: "admin-users-id"
    }]
  }, {
    path: "/login",
    component: _41f3c3e4,
    name: "login"
  }, {
    path: "/",
    component: _784c20cd,
    children: [{
      path: "",
      component: _31732315,
      name: "index"
    }, {
      path: "calendar",
      component: _49579fd7,
      name: "index-calendar"
    }, {
      path: "companies",
      component: _7e8d74a4,
      name: "index-companies"
    }, {
      path: "contacts",
      component: _2b9aaba2,
      name: "index-contacts"
    }, {
      path: "leads",
      component: _2cf68230,
      name: "index-leads"
    }, {
      path: "tasks",
      component: _145940de,
      name: "index-tasks"
    }, {
      path: "tickets",
      component: _0dc7cd50,
      name: "index-tickets"
    }, {
      path: "calendar/add",
      component: _1e6de766,
      name: "index-calendar-add"
    }, {
      path: "calendar/list",
      component: _4bcd8529,
      name: "index-calendar-list"
    }, {
      path: "companies/add",
      component: _a686e91a,
      name: "index-companies-add"
    }, {
      path: "contacts/add",
      component: _410769f1,
      name: "index-contacts-add"
    }, {
      path: "leads/add",
      component: _66c996b7,
      name: "index-leads-add"
    }, {
      path: "tasks/add",
      component: _586a4da0,
      name: "index-tasks-add"
    }, {
      path: "tickets/add",
      component: _a75665b2,
      name: "index-tickets-add"
    }, {
      path: "calendar/edit/:id?",
      component: _61e777f5,
      name: "index-calendar-edit-id"
    }, {
      path: "companies/edit/:id?",
      component: _a947c37c,
      name: "index-companies-edit-id"
    }, {
      path: "contacts/edit/:id?",
      component: _10d9a640,
      name: "index-contacts-edit-id"
    }, {
      path: "leads/edit/:id?",
      component: _4d46b2f4,
      name: "index-leads-edit-id"
    }, {
      path: "tasks/edit/:id?",
      component: _32ae6aa2,
      name: "index-tasks-edit-id"
    }, {
      path: "tickets/edit/:id?",
      component: _3fe148f6,
      name: "index-tickets-edit-id"
    }, {
      path: "user/edit/:id?",
      component: _5dbc2948,
      name: "index-user-edit-id"
    }, {
      path: "calendar/:id?",
      component: _85aca802,
      name: "index-calendar-id"
    }, {
      path: "companies/:id?",
      component: _4b78500c,
      name: "index-companies-id"
    }, {
      path: "contacts/:id?",
      component: _4079a2ec,
      name: "index-contacts-id"
    }, {
      path: "leads/:id?",
      component: _05855b50,
      name: "index-leads-id"
    }, {
      path: "tasks/:id?",
      component: _11b3db8e,
      name: "index-tasks-id"
    }, {
      path: "tickets/:id?",
      component: _4b1091c0,
      name: "index-tickets-id"
    }, {
      path: "user/:id?",
      component: _1d669792,
      name: "index-user-id"
    }]
  }],

  fallback: false
}

export function createRouter () {
  return new Router(routerOptions)
}
