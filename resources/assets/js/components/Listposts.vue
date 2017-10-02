<template id="post-list">
  <div>
    <div class="actions">
      <router-link class="btn btn-default" v-bind:to="{path: '/add-post'}">
        <span class="glyphicon glyphicon-plus"></span>
        Add Post
      </router-link>
    </div>
    <div class="filters row">
      <div class="form-group col-sm-3">
        <label for="search-element"Post name</label>
        <input v-model="searchKey" class="form-control" id="search-element" requred/>
      </div>
    </div>
    <table class="table">
      <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th class="col-sm-2">Actions</th>
      </tr>
      </thead>
      <tbody>
      <tr  v-for="post in filteredPosts">
        <td>
          <router-link v-bind:to="{name: 'Viewpost', params: {id: post.id}}">{{ post.name }}</router-link>
        </td>
        <td>{{ post.description }}</td>
       
        <td>
        <router-link class="btn btn-warning btn-xs" v-bind:to="{name: 'Editpost', params: {id: post.id}}">Edit</router-link>
          <router-link class="btn btn-danger btn-xs" v-bind:to="{name: 'Deletepost', params: {id: post.id}}">Delete</router-link>
        </td>
      </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
	export default {
			data:function () {
				return {posts: '', searchKey: ''};
			},
			created: function(){
				 let uri = 'http://127.0.0.1:8000/api/';
				  Axios.get(uri).then((response) => {
				
					  this.posts = response.data;
				  });
			 
			},
			computed: {
					filteredPosts: function () {
					if(this.posts.length){
					  return this.posts.filter(function (post) {
						return this.searchKey=='' || post.name.indexOf(this.searchKey) !== -1;
					  },this);
					}
					}
			}
		  
	}
	

</script>