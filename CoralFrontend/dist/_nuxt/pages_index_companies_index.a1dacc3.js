(window.webpackJsonp=window.webpackJsonp||[]).push([[23],{486:function(t,e,n){"use strict";n.r(e);var r={data:function(){return{search:"",headers:[{text:"Name",value:"name"},{text:"Address",value:"address"},{text:"City",value:"city"},{text:"Email",value:"email"},{text:"Actions",value:"actions"}],items:[]}},created:function(){var t=this;this.$axios.get("company").then((function(e){200===e.status&&(t.items=e.data)}))},methods:{deleteItem:function(t){var e=this;this.$axios.delete("company/".concat(t)).then((function(t){200===t.status&&e.$router.push({name:"index-companies"})}))}}},c=n(25),o=n(29),l=n.n(o),d=n(159),m=n(367),v=n(366),h=n(481),f=n(143),x=n(362),_=n(352),component=Object(c.a)(r,(function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("v-card",{attrs:{flat:""}},[n("v-card-title",[n("v-text-field",{staticClass:"shrink mx-10",attrs:{"append-icon":"mdi-magnify",label:"Search","single-line":"","hide-details":""},model:{value:t.search,callback:function(e){t.search=e},expression:"search"}}),t._v(" "),n("v-spacer"),t._v(" "),n("v-btn",{attrs:{color:"pink",dark:"",right:"",text:"",to:"Companies/add"}},[t._v("\n            Add New\n            ")])],1),t._v(" "),n("v-data-table",{staticClass:"elevation-0",attrs:{search:t.search,headers:t.headers,items:t.items,"pagination.sync":"pagination","item-key":t.items.id},scopedSlots:t._u([{key:"item.firstname",fn:function(e){var r=e.item;return[n("nuxt-link",{attrs:{to:{name:"index-companies-id",params:{id:r.id}}}},[t._v(t._s(r.name))])]}},{key:"item.actions",fn:function(e){var r=e.item;return[n("v-btn",{attrs:{icon:"",flat:"",to:{name:"index-companies-edit-id",params:{id:r.id}}}},[n("v-icon",{attrs:{color:"secondary"}},[t._v(" mdi-pencil")])],1),t._v(" "),n("v-btn",{attrs:{icon:""},on:{click:function(e){return t.deleteItem(r.id)}}},[n("v-icon",{attrs:{color:"warning"}},[t._v(" mdi-delete")])],1)]}}])})],1)}),[],!1,null,null,null),y=component.exports;l()(component,{VBtn:d.a,VCard:m.a,VCardTitle:v.c,VDataTable:h.a,VIcon:f.a,VSpacer:x.a,VTextField:_.a});var C={components:{list:y},data:function(){return{}}},V=n(363),k=n(372),w=Object(c.a)(C,(function(){var t=this.$createElement,e=this._self._c||t;return e("v-row",[e("v-col",{attrs:{cols:"12"}},[e("v-card",[e("v-card-title",{staticClass:"primary--text justify-center",attrs:{"primary-title":""}},[this._v("\n          Companies\n      ")]),this._v(" "),e("v-card-text",[e("list")],1)],1)],1)],1)}),[],!1,null,"8a9a8672",null);e.default=w.exports;l()(w,{VCard:m.a,VCardText:v.b,VCardTitle:v.c,VCol:V.a,VRow:k.a})}}]);