Vue.component('star-rating', VueStarRating.default);
var app = new Vue({
  el: '#app',
  data: {
    number: '',
    max: '',
    current: {},
    loading: true,
    addedName: '',
    addedComment: '',
    comments: {},
    ratings: {},
    averageRating: [],
  },
  created: function() {
    this.xkcd();
  },
  computed: {
    month: function() {
      var month = new Array;
      if (this.current.month === undefined)
        return '';
      month[0] = "January";
      month[1] = "February";
      month[2] = "March";
      month[3] = "April";
      month[4] = "May";
      month[5] = "June";
      month[6] = "July";
      month[7] = "August";
      month[8] = "September";
      month[9] = "October";
      month[10] = "November";
      month[11] = "December";
      return month[this.current.month - 1];
    }
  },
  watch: {
    number: function(value, oldvalue) {
      if (oldvalue === '') {
        this.max = value;
      } else {
        this.xkcd();
      }
    },
  },
  methods: {
    xkcd: function() {

      this.loading = true;
      fetch('https://xkcdapi.now.sh/' + this.number, {
        crossdomain: true
      }).then(response => {
        return response.json();
      }).then(json => {
        this.current = json;
        this.loading = false;
        this.number = json.num;
        return true;
      }).catch(err => {
        this.number = this.max;
      });
    },
    previousComic: function() {
      this.number = this.current.num - 1;
    },
    firstComic: function() {
      this.number = 1;
    },
    lastComic: function() {
      this.number = this.max;
    },
    nextComic: function() {
      this.number = this.current.num + 1;
    },
    getRandom: function(min, max) {
      min = Math.ceil(min);
      max = Math.floor(max);
      return Math.floor(Math.random() * (max - min + 1)) + min; //The maximum and minimum are inclusive 
    },
    randomComic: function() {
      this.number = this.getRandom(1, this.max);
    },
    addComment: function() {
      if (!(this.number in this.comments))
        Vue.set(app.comments, this.number, new Array);
      var d = new Date,
      dformat = [(d.getMonth()+1).padLeft(),
               d.getDate().padLeft(),
               d.getFullYear()].join('/') +' ' +
              [d.getHours().padLeft(),
               d.getMinutes().padLeft()].join(':');
      this.comments[this.number].push({author:this.addedName,text:this.addedComment, date:dformat});
      this.addedName = '';
      this.addedComment = '';
    },
    average: function(selected) {
      if (!(this.number in this.ratings))
        Vue.set(app.ratings, this.number, new Array);
      this.ratings[this.number].push(selected);
      let total = 0;
      this.ratings[this.number].forEach(function(item) {
        total += item;
      });
      this.averageRating[this.number] = total / this.ratings[this.number].length;
    },
  }
});


Number.prototype.padLeft = function(base,chr){
    var  len = (String(base || 10).length - String(this).length)+1;
    return len > 0? new Array(len).join(chr || '0')+this : this;
}