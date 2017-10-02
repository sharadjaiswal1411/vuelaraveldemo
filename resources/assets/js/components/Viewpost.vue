<template id="post">
  <div>
    <h2>{{ post.name }}</h2>
    <b>Description: </b>
    <div>{{ post.description }}</div>
    
    
    <br/>
    <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
    <router-link v-bind:to="'/'">Back Post list</router-link>
  </div>
</template>

<script>
     export default {
    
	  data: function () {
		return {post: {name: '', description: ''}}
	  },
	  created: function(){
				let uri = 'http://127.0.0.1:8000/api/'+this.$route.params.id;
                Axios.get(uri).then((response) => {
				    this.post = response.data;
                });
			 
	  }

    }
</script>
