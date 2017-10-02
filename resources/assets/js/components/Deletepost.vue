<template id="post-delete">
  <div>
    <h2>Delete post {{ post.name }}</h2>
    <form v-on:submit.prevent="deletePost">
      <p>The action cannot be undone.</p>
      <button type="submit" class="btn btn-danger">Delete</button>
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
	   	deletePost: function() {
		    let uri = 'http://127.0.0.1:8000/api/'+this.$route.params.id;
			  Axios.delete(uri, this.post).then((response) => {
			    this.$router.push({name: 'Listposts'})	
				
              })
			 
		}
	  }

    }
</script>
