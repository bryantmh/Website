<template>
  <div class="todo">
    <h1>A List of Things To Do</h1>
    <p v-show="activeItems.length === 0">You are done with all your tasks! Good job!</p>
    <form v-on:submit.prevent="addItem">
      <input type="text" v-model="text">
      <select v-model="priority">
        <option value="Low">Low</option>
        <option value="Medium">Medium</option>
        <option value="High">High</option>
      </select>
      <button type="submit">Add</button>
    </form>
    <div class="controls">
      <button v-on:click="showAll()">Show All</button>
      <button v-on:click="showActive()">Show Active</button>
      <button v-on:click="showCompleted()">Show Completed</button>
      <button v-on:click="deleteCompleted()">Delete Completed</button>
      <button v-on:click="sortPriority()">Sort By Priority</button>
    </div>
    <ul>
      <li v-for="item in filteredItems" draggable="true" v-on:dragstart="dragItem(item)" v-on:dragover.prevent v-on:drop="dropItem(item)">
        <input type="checkbox" v-model="item.completed" v-on:click="completeItem(item)"/>
        <label v-bind:class="{ completed: item.completed }">{{ item.text }}
          <span style="float: right;">{{ item.priority }}&nbsp;<button v-on:click="priorityUp(item)">&#x25B2;</button><button v-on:click="priorityDown(item)">&#x25BC;</button></span>
        </label><button v-on:click="deleteItem(item)" class="delete">X</button>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: 'Todo',
  data () {
    return {
      text: '',
      priority: "Low",
      show: 'all',
      drag: {},
    }
  },
  computed: {
    items: function() {
     return this.$store.getters.items;
    },
    activeItems: function() {
     return this.items.filter(function(item) {
      return !item.completed;
    });
    },
    filteredItems: function() {
    if (this.show === 'active')
      return this.items.filter(function(item) {
       return !item.completed;
     });
    if (this.show === 'completed')
      return this.items.filter(function(item) {
       return item.completed;
     });
    return this.items;
    },
  },
  created: function() {
   this.getItems();
  },
methods: {
 getItems: function() {
   this.$store.dispatch('getItems');
 },
 addItem: function() {
  this.$store.dispatch('addItem',{
   text: this.text,
   priority: this.priority, 
   completed: false,
   completedDate: null
 });
},
completeItem: function(item) {
  var date;
  if (!item.completed){
    date = new Date();}
  else
    date = null;
 this.$store.dispatch('updateItem', {
   id: item.id,
   text: item.text,
   priority: item.priority,
   completed: !item.completed,
   completedDate: date,
   orderChange: false,
 });
},
deleteItem: function(item) {
  this.$store.dispatch('deleteItem',{
    id: item.id
  });
},
showAll: function() {
 this.show = 'all';
},
showActive: function() {
 this.show = 'active';
},
showCompleted: function() {
 this.show = 'completed';
},
deleteCompleted: function() {
 this.items.forEach(item => {
   if (item.completed)
     this.deleteItem(item)
 });
},
dragItem: function(item) {
 this.drag = item;
},
dropItem: function(item) {
 this.$store.dispatch('updateItem',{
   id: this.drag.id,
   text: this.drag.text,
   priority: this.drag.priority,
   completed: this.drag.completed,
   completedDate: this.drag.completedDate,
   orderChange: true,
   orderTarget: item.id
 });
},
priorityUp: function(item) {
  up(item);
  this.$store.dispatch('updateItem', item);
},
priorityDown: function(item) {
  down(item);
  this.$store.dispatch('updateItem', item);
},
sortPriority: function() {
  let low = [];
  let medium = [];
  let high = [];
  this.items.forEach(item => {
    if (item.priority == "Low")
     low.push(item);
   else if (item.priority == "Medium")
    medium.push(item);
  else
    high.push(item);
  let lowMed = low.concat(medium);
  let all = lowMed.concat(high);
  this.$store.dispatch('setItems', all);
});
}
},
}

function up(item) {
 if (item.priority == "Low")
  item.priority = "Medium";
else if (item.priority == "Medium")
  item.priority = "High";
else
  item.priority = "Low";
}

function down(item) {
 if (item.priority == "Low")
  item.priority = "High";
else if (item.priority == "Medium")
  item.priority = "Low";
else
  item.priority = "Medium";
}
</script>

<style scoped>
ul {
 list-style: none;
}

li {
 background: #f3f3f3;
 width: 500px;
 min-height: 30px;
 padding: 10px;
 margin-bottom: 10px;
 font-size: 1em;
 display: flex;
 align-items: center;
}

.delete {
 display: none;
 margin-left: auto;
}

li:hover .delete {
 display: block;
}

label {
 width: 400px;
}

.completed {
 text-decoration: line-through;
}

/* Form */

input[type=checkbox] {
 transform: scale(1.5);
 margin-right: 10px;
}

input[type=text] {
 font-size: 1em;
}

button {
 font-family: 'Arvo';
 font-size: 1em;
}
.controls {
 margin-top: 20px;
}
</style>