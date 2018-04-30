 <div id="app">
  <h1>XKCD Browser</h1>
  <div v-if="loading">
    <p>Loading...</p>
  </div>
  <div v-else>
    <p>
      <button v-on:click="previousComic">Previous</button>
      <button v-on:click="nextComic">Next</button>
    </p>
    <p>
      <button v-on:click="firstComic">First</button>
      <button v-on:click="lastComic">Last</button>
      <button v-on:click="randomComic">Random</button>
    </p>
    <h2>{{ current.safe_title}}</h2>
    <img v-bind:src="current.img" v-bind:alt="current.alt">
    <p><i># {{number}}, drawn on {{current.day}} {{month}} {{current.year}}</i></p>
    <star-rating @rating-selected="average" v-model="averageRating[number]" v-bind:increment="0.5" active-color="#f26101" v-bind:show-rating="false"></star-rating>
    <p>Average Rating: {{averageRating[number]}}</p>
    <h3>Add a Comment</h3>
    <form v-on:submit.prevent="addComment">
      <input v-model="addedName" placeholder="Name"></p>
      <textarea v-model="addedComment"></textarea>
      <br/>
      <button type="submit">Comment</button>
    </form>
    <h3>Comments</h3>
    <div v-for="comment in comments[number]">
      <hr>
      <p>{{comment.text}}</p>
      <p><i>-- {{comment.author}} &nbsp; &nbsp; {{comment.date}}</i></p>
    </div>
  </div> 