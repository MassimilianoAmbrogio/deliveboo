import Vue from 'vue';
import axios from 'axios';

const deliveboo = new Vue({

    el: '#app',
    data: {
        name: '',
        categories: [],
        allRestaurants:[],

    },
    created() {
      this.filterRestaurant();
    },
    methods: {
      filterRestaurant(){
        console.log(this.categories);
        axios.get('http://127.0.0.1:8000/api/filter-restaurant', {
            params: {
                name: this.name,
                categories: this.categories,
            }
        })
        .then(response => {
          this.allRestaurants=response.data;
            console.log(this.allRestaurants);
        })
        .catch(error => {
            console.log(error);
        })
      },

      routing(slug){
        return window.location + '/' + slug ;
      }
    }

});
