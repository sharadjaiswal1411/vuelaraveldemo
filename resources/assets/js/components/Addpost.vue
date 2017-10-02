<template id="add-post">
  <div>
    <h2>Add new post</h2>
    <form v-on:submit.prevent="createPost">
      <div class="form-group">
        <label for="add-name">Name</label>
        <input class="form-control" id="add-name" v-model="post.name" required/>
      </div>
      <div class="form-group">
        <label for="add-description">Description</label>
        <textarea class="form-control" id="add-description" rows="10" v-model="post.description"></textarea>
      </div>
     
      <button type="submit" class="btn btn-primary">Create</button>
      <router-link class="btn btn-default" v-bind:to="'/'">Cancel</router-link>
    </form>
  </div>
</template>


<script>
    export default {
    
	  data: function () {
		return {post: {name: '', description: ''}}
	  },
	  methods: {
		createPost: function() {
		    let uri = 'http://127.0.0.1:8000/api/';
			  Axios.post(uri, this.post).then((response) => {
			    this.$router.push({name: 'Listposts'})	
				
              })
			 
		}
	  }

    }
</script>