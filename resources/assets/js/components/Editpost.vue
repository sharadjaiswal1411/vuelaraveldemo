<template id="post-edit">
  <div>
    <h2>Edit post</h2>
    <form v-on:submit.prevent="updatePost">
      <div class="form-group">
        <label for="edit-name">Name</label>
        <input class="form-control" id="edit-name" v-model="post.name" required/>
      </div>
      <div class="form-group">
        <label for="edit-description">Description</label>
        <textarea class="form-control" id="edit-description" rows="3" v-model="post.description"></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Save</button>
      <router-link class="btn btn-default" v-bind:to="'/'">Cancel</router-link>
    </form>
  </div>
</template>

<script>
    export default {
    
	  data: function () {
		return {post: {name: '', description: ''}}
	  },
	  created: function(){
				let uri = 'http://127.0.0.1:8000/api/'+this.$route.params.id+'/edit';
                Axios.get(uri).then((response) => {
				    this.post = response.data;
                });
			 
	  },
	  methods: {
	   	updatePost: function() {
		    let uri = 'http://127.0.0.1:8000/api/'+this.$route.params.id;
			  Axios.patch(uri, this.post).then((response) => {
			    this.$router.push({name: 'Listposts'})	
				
              })
			 
		}
	  }

    }
</script>
