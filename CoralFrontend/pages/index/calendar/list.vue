<template>
  <v-row>
    <v-col cols="12">
      <v-card>
        <v-card-title primary-title class="primary--text">
            Event List
            <v-spacer></v-spacer>          
                <v-menu bottom right>
            <template v-slot:activator="{ on, attrs }">
              <v-btn
                outlined
                v-bind="attrs"
                v-on="on"
              >
                <span>{{ typeToLabel[type] }}</span>
                <v-icon right>mdi-menu-down</v-icon>
              </v-btn>
            </template>
            <v-list>
              <v-list-item  :to="{ name: 'index-calendar', params: { Ctype: 'day' }}" nuxt>
                <v-list-item-title>Day</v-list-item-title>
              </v-list-item>
              <v-list-item  :to="{ name: 'index-calendar', params: { Ctype: 'week' }}" nuxt>
                <v-list-item-title>Week</v-list-item-title>
              </v-list-item>
              <v-list-item  :to="{ name: 'index-calendar', params: { Ctype: 'month' }}" nuxt>
                <v-list-item-title>Month</v-list-item-title>
              </v-list-item>
              <v-list-item   :to="{ name: 'index-calendar', params: { Ctype: '4day' }}" nuxt>
                <v-list-item-title>4 days</v-list-item-title>
              </v-list-item>
              <v-list-item :to="{ name: 'index-calendar-list'}" nuxt>
                <v-list-item-title>List</v-list-item-title>
              </v-list-item>
            </v-list>
          </v-menu>
        </v-card-title>
        <v-card-text>
            <List/>
        </v-card-text>
      </v-card>
    </v-col>
  </v-row>
</template>
<script>
import List from '~/components/calendar/list.vue';
export default {
    components:{
        List
    },
    data() {
        return {
           type: 'month',
           typeToLabel: {
               month: 'Month',
               week: 'Week',
               day: 'Day',
              '4day': '4 Days',
           }
        }
    },
    methods: {
     setFoodItem(item) {
         console.log(item);
        this.type = item;
    }
    },  
}
</script>

<style lang="scss" scoped>

</style>