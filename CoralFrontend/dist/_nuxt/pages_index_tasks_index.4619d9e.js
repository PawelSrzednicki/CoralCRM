(window.webpackJsonp=window.webpackJsonp||[]).push([[36],{489:function(t,e,n){"use strict";n.r(e);var r={data:function(){return{search:"",headers:[{text:"Name",value:"name"},{text:"Description",value:"lastname"},{text:"Actions",value:"actions"}],items:[]}},created:function(){var t=this;this.$axios.get("task").then((function(e){200===e.status&&(t.items=e.data)}))},methods:{deleteItem:function(t){var e=this;this.$axios.delete("task/".concat(t)).then((function(t){200===t.status&&e.$router.push({name:"index-tasks"})}))}}},c=n(25),l=n(29),o=n.n(l),d=n(159),v=n(367),m=n(366),h=n(481),f=n(143),x=n(362),k=n(352),component=Object(c.a)(r,(function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("v-card",{attrs:{flat:""}},[n("v-card-title",[n("v-text-field",{staticClass:"shrink mx-10",attrs:{"append-icon":"mdi-magnify",label:"Search","single-line":"","hide-details":""},model:{value:t.search,callback:function(e){t.search=e},expression:"search"}}),t._v(" "),n("v-spacer"),t._v(" "),n("v-btn",{attrs:{color:"pink",dark:"",right:"",text:"",to:"Tasks/add"}},[t._v("\n            Add New\n            ")])],1),t._v(" "),n("v-data-table",{staticClass:"elevation-0",attrs:{search:t.search,headers:t.headers,items:t.items,"pagination.sync":"pagination","item-key":t.items.id},scopedSlots:t._u([{key:"item.firstname",fn:function(e){var r=e.item;return[n("nuxt-link",{attrs:{to:{name:"index-tasks-id",params:{id:r.id}}}},[t._v(t._s(r.name))])]}},{key:"item.actions",fn:function(e){var r=e.item;return[n("v-btn",{attrs:{icon:"",flat:"",to:{name:"index-tasks-edit-id",params:{id:r.id}}}},[n("v-icon",{attrs:{color:"secondary"}},[t._v(" mdi-pencil")])],1),t._v(" "),n("v-btn",{attrs:{icon:""},on:{click:function(e){return t.deleteItem(r.id)}}},[n("v-icon",{attrs:{color:"warning"}},[t._v(" mdi-delete")])],1)]}}])})],1)}),[],!1,null,null,null),_=component.exports;o()(component,{VBtn:d.a,VCard:v.a,VCardTitle:m.c,VDataTable:h.a,VIcon:f.a,VSpacer:x.a,VTextField:k.a});var V={components:{list:_},data:function(){return{}}},w=n(363),y=n(372),C=Object(c.a)(V,(function(){var t=this.$createElement,e=this._self._c||t;return e("v-row",[e("v-col",{attrs:{cols:"12"}},[e("v-card",[e("v-card-title",{staticClass:"primary--text justify-center",attrs:{"primary-title":""}},[this._v("\n          Tasks\n      ")]),this._v(" "),e("v-card-text",[e("list")],1)],1)],1)],1)}),[],!1,null,"7bf144d8",null);e.default=C.exports;o()(C,{VCard:v.a,VCardText:m.b,VCardTitle:m.c,VCol:w.a,VRow:y.a})}}]);