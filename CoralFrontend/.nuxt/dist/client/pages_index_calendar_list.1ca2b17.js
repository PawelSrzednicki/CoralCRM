(window.webpackJsonp=window.webpackJsonp||[]).push([[19],{491:function(t,e,n){"use strict";n.r(e);var r={data:function(){return{search:"",headers:[{text:"Name",value:"name"},{text:"Start Date",value:"start"},{text:"End Date",value:"end"},{text:"Actions",value:"actions"}],items:[]}},created:function(){var t=this;this.$axios.get("event").then((function(e){200===e.status&&(t.items=e.data)}))}},l=n(25),o=n(29),c=n.n(o),d=n(159),v=n(367),m=n(366),_=n(481),h=n(143),x=n(362),y=n(352),component=Object(l.a)(r,(function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("v-card",{attrs:{flat:""}},[n("v-card-title",[n("v-text-field",{staticClass:"shrink mx-10",attrs:{"append-icon":"mdi-magnify",label:"Search","single-line":"","hide-details":""},model:{value:t.search,callback:function(e){t.search=e},expression:"search"}}),t._v(" "),n("v-spacer"),t._v(" "),n("v-btn",{attrs:{color:"pink",dark:"",right:"",text:"",to:"/add"}},[t._v("\n      Add New\n    ")])],1),t._v(" "),n("v-data-table",{staticClass:"elevation-0",attrs:{headers:t.headers,items:t.items,"pagination.sync":"pagination","item-key":t.items.id,search:t.search},scopedSlots:t._u([{key:"item.firstname",fn:function(e){var r=e.item;return[n("nuxt-link",{attrs:{to:{name:"index-calendar-id",params:{id:r.id}}}},[t._v(t._s(r.name))])]}},{key:"item.actions",fn:function(e){var r=e.item;return[n("v-btn",{attrs:{icon:"",flat:"",to:{name:"index-calendar-edit-id",params:{id:r.id}}}},[n("v-icon",{attrs:{color:"secondary"}},[t._v(" mdi-pencil")])],1),t._v(" "),n("v-btn",{attrs:{icon:""},on:{click:function(e){return t.deleteItem(r)}}},[n("v-icon",{attrs:{color:"warning"}},[t._v(" mdi-delete")])],1)]}}])})],1)}),[],!1,null,null,null),f=component.exports;c()(component,{VBtn:d.a,VCard:v.a,VCardTitle:m.c,VDataTable:_.a,VIcon:h.a,VSpacer:x.a,VTextField:y.a});var V={components:{List:f},data:function(){return{type:"month",typeToLabel:{month:"Month",week:"Week",day:"Day","4day":"4 Days"}}},methods:{setFoodItem:function(t){console.log(t),this.type=t}}},k=n(363),w=n(144),C=n(88),L=n(26),T=n(413),D=n(372),I=Object(l.a)(V,(function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("v-row",[n("v-col",{attrs:{cols:"12"}},[n("v-card",[n("v-card-title",{staticClass:"primary--text",attrs:{"primary-title":""}},[t._v("\n          Event List\n          "),n("v-spacer"),t._v(" "),n("v-menu",{attrs:{bottom:"",right:""},scopedSlots:t._u([{key:"activator",fn:function(e){var r=e.on,l=e.attrs;return[n("v-btn",t._g(t._b({attrs:{outlined:""}},"v-btn",l,!1),r),[n("span",[t._v(t._s(t.typeToLabel[t.type]))]),t._v(" "),n("v-icon",{attrs:{right:""}},[t._v("mdi-menu-down")])],1)]}}])},[t._v(" "),n("v-list",[n("v-list-item",{attrs:{to:{name:"index-calendar",params:{Ctype:"day"}},nuxt:""}},[n("v-list-item-title",[t._v("Day")])],1),t._v(" "),n("v-list-item",{attrs:{to:{name:"index-calendar",params:{Ctype:"week"}},nuxt:""}},[n("v-list-item-title",[t._v("Week")])],1),t._v(" "),n("v-list-item",{attrs:{to:{name:"index-calendar",params:{Ctype:"month"}},nuxt:""}},[n("v-list-item-title",[t._v("Month")])],1),t._v(" "),n("v-list-item",{attrs:{to:{name:"index-calendar",params:{Ctype:"4day"}},nuxt:""}},[n("v-list-item-title",[t._v("4 days")])],1),t._v(" "),n("v-list-item",{attrs:{to:{name:"index-calendar-list"},nuxt:""}},[n("v-list-item-title",[t._v("List")])],1)],1)],1)],1),t._v(" "),n("v-card-text",[n("List")],1)],1)],1)],1)}),[],!1,null,"7fab0a16",null);e.default=I.exports;c()(I,{VBtn:d.a,VCard:v.a,VCardText:m.b,VCardTitle:m.c,VCol:k.a,VIcon:h.a,VList:w.a,VListItem:C.a,VListItemTitle:L.b,VMenu:T.a,VRow:D.a,VSpacer:x.a})}}]);