<template>
    <div class="container">
        <div>
            <transition name="fade">
                <router-view></router-view>
            </transition>
        </div>
    </div>
</template>

<style>
	.logo {
	  width: 50px;
	  float: left;
	  margin-right: 15px;
	}

	.form-group {
	  max-width: 500px;
	}

	.actions {
	  padding: 10px 0;
	}

	.glyphicon-euro {
	  font-size: 12px;
	}
		
	.fade-enter-active, .fade-leave-active {
      transition: opacity .5s
    }
    .fade-enter, .fade-leave-active {
      opacity: 0
    }
</style>


<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
