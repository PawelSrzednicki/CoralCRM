(window.webpackJsonp=window.webpackJsonp||[]).push([[18],{485:function(t,e,n){"use strict";n.r(e);var o={data:function(){return{today:(new Date).toISOString().substr(0,10),focus:(new Date).toISOString().substr(0,10),type:"month",typeToLabel:{month:"Month",week:"Week",day:"Day","4day":"4 Days"},name:null,details:null,start:null,end:null,currentlyEditing:null,selectedEvent:{},selectedElement:null,selectedOpen:!1,events:[]}},computed:{title:function(){var t=this.start,e=this.end;if(!t||!e)return"";var n=this.monthFormatter(t),o=(this.monthFormatter(e),t.year),r=(e.year,t.day+this.nth(t.day)),c=e.day+this.nth(e.day);switch(this.type){case"month":return"".concat(n," ").concat(o);case"week":case"4day":return"".concat(n," ").concat(r,"- ").concat(c);case"day":return"".concat(n," ").concat(r," ").concat(o)}return""},monthFormatter:function(){return this.$refs.calendar.getFormatter({timeZone:"UTC",month:"long"})}},created:function(){this.fetchEventsList(),this.setType()},methods:{setType:function(){this.$route.params.Ctype&&(this.type=this.$route.params.Ctype)},fetchEventsList:function(){var t=this;this.$axios.get("event").then((function(e){200===e.status&&(t.events=e.data)}))},setDialogDate:function(t){var e=t.date;this.dialogDate=!0,this.focus=e},viewDay:function(t){var e=t.date;this.focus=e,this.type="day"},getEventColor:function(t){return"Meeting"==t.event_type[0].value?t.color="red":"Event"==t.event_type[0].value?t.color="green":"Call"==t.event_type[0].value?t.color="blue":void 0},setToday:function(){this.focus=this.today},prev:function(){this.$refs.calendar.prev()},next:function(){this.$refs.calendar.next()},deleteEvent:function(t){var e=this;this.$axios.delete("event/".concat(t)).then((function(t){200===t.status&&(e.selectedOpen=!1,e.fetchEventsList())}))},showEvent:function(t){var e=this,n=t.nativeEvent,o=t.event,r=function(){e.selectedEvent=o,e.selectedElement=n.target,setTimeout((function(){return e.selectedOpen=!0}),10)};this.selectedOpen?(this.selectedOpen=!1,setTimeout(r,10)):r(),n.stopPropagation()},updateRange:function(t){var e=t.start,n=t.end;this.start=e,this.end=n},nth:function(t){return t>3&&t<21?"th":["th","st","nd","rd","th","th","th","th","th","th"][t%10]}}},r=n(25),c=n(29),l=n.n(c),v=n(159),d=n(479),h=n(367),m=n(366),f=n(363),y=n(143),_=n(144),k=n(88),w=n(26),E=n(413),C=n(372),V=n(36),x=n(362),T=n(37),O=n(77),component=Object(r.a)(o,(function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("v-row",{staticClass:"fill-height"},[n("v-col",[n("v-sheet",{attrs:{height:"64"}},[n("v-toolbar",{attrs:{flat:"",color:"white"}},[n("v-btn",{staticClass:"mr-4",attrs:{outlined:"",color:"grey darken-2"},on:{click:t.setToday}},[t._v("\n          Today\n        ")]),t._v(" "),n("v-btn",{attrs:{fab:"",text:"",small:"",color:"grey darken-2"},on:{click:t.prev}},[n("v-icon",{attrs:{small:""}},[t._v("mdi-chevron-left")])],1),t._v(" "),n("v-btn",{attrs:{fab:"",text:"",small:"",color:"grey darken-2"},on:{click:t.next}},[n("v-icon",{attrs:{small:""}},[t._v("mdi-chevron-right")])],1),t._v(" "),n("v-toolbar-title",[t._v("\n          "+t._s(t.title)+"\n        ")]),t._v(" "),n("v-spacer"),t._v(" "),n("v-menu",{attrs:{bottom:"",right:""},scopedSlots:t._u([{key:"activator",fn:function(e){var o=e.on,r=e.attrs;return[n("v-btn",t._g(t._b({attrs:{outlined:"",color:"grey darken-2"}},"v-btn",r,!1),o),[n("span",[t._v(t._s(t.typeToLabel[t.type]))]),t._v(" "),n("v-icon",{attrs:{right:""}},[t._v("mdi-menu-down")])],1)]}}])},[t._v(" "),n("v-list",[n("v-list-item",{on:{click:function(e){t.type="day"}}},[n("v-list-item-title",[t._v("Day")])],1),t._v(" "),n("v-list-item",{on:{click:function(e){t.type="week"}}},[n("v-list-item-title",[t._v("Week")])],1),t._v(" "),n("v-list-item",{on:{click:function(e){t.type="month"}}},[n("v-list-item-title",[t._v("Month")])],1),t._v(" "),n("v-list-item",{on:{click:function(e){t.type="4day"}}},[n("v-list-item-title",[t._v("4 days")])],1),t._v(" "),n("v-list-item",{attrs:{to:{name:"index-calendar-list"},nuxt:""}},[n("v-list-item-title",[t._v("List")])],1)],1)],1)],1)],1),t._v(" "),n("v-sheet",{attrs:{height:"600"}},[n("v-calendar",{ref:"calendar",attrs:{color:"primary",events:t.events,"event-color":t.getEventColor,type:t.type,now:t.today},on:{"click:event":t.showEvent,"click:more":t.viewDay,"click:date":t.viewDay,change:t.updateRange},model:{value:t.focus,callback:function(e){t.focus=e},expression:"focus"}}),t._v(" "),n("v-menu",{attrs:{"close-on-content-click":!1,activator:t.selectedElement},model:{value:t.selectedOpen,callback:function(e){t.selectedOpen=e},expression:"selectedOpen"}},[n("v-card",{attrs:{color:"grey lighten-4",flat:""}},[n("v-toolbar",{attrs:{color:t.selectedEvent.color,dark:""}},[n("v-toolbar-title",{domProps:{innerHTML:t._s(t.selectedEvent.name)}}),t._v(" "),n("v-spacer"),t._v(" "),n("v-btn",{attrs:{icon:"",flat:"",to:{name:"index-calendar-edit-id",params:{id:t.selectedEvent.id}}}},[n("v-icon",[t._v(" mdi-pencil")])],1),t._v(" "),n("v-btn",{attrs:{icon:""},on:{click:function(e){return t.deleteEvent(t.selectedEvent.id)}}},[n("v-icon",[t._v(" mdi-delete")])],1)],1),t._v(" "),n("v-card-text",[n("span",{domProps:{innerHTML:t._s(t.selectedEvent.details)}})]),t._v(" "),n("v-card-actions",[n("v-btn",{attrs:{text:"",color:"secondary"},on:{click:function(e){t.selectedOpen=!1}}},[t._v("\n              Cancel\n            ")])],1)],1)],1)],1)],1)],1)}),[],!1,null,null,null),D=component.exports;l()(component,{VBtn:v.a,VCalendar:d.a,VCard:h.a,VCardActions:m.a,VCardText:m.b,VCol:f.a,VIcon:y.a,VList:_.a,VListItem:k.a,VListItemTitle:w.b,VMenu:E.a,VRow:C.a,VSheet:V.a,VSpacer:x.a,VToolbar:T.a,VToolbarTitle:O.a});var L={components:{Calendar:D},data:function(){return{}}},$=Object(r.a)(L,(function(){var t=this.$createElement,e=this._self._c||t;return e("v-row",[e("v-col",{attrs:{cols:"12"}},[e("v-card",[e("v-card-title",{staticClass:"primary--text",attrs:{"primary-title":""}},[this._v("\n          Calendar\n          "),e("v-spacer"),this._v(" "),e("v-btn",{attrs:{color:"pink",dark:"",right:"",to:"Calendar/add"}},[this._v("\n            Add New\n            ")])],1),this._v(" "),e("v-card-text",[e("Calendar")],1)],1)],1)],1)}),[],!1,null,"39126f28",null);e.default=$.exports;l()($,{VBtn:v.a,VCard:h.a,VCardText:m.b,VCardTitle:m.c,VCol:f.a,VRow:C.a,VSpacer:x.a})}}]);