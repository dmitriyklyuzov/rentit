<template>
  <ul class="nav nav-sidebar">
    <li><a href="#"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a></li>
    <li><a @click="fetchProperties()"><i class="fa fa-fw fa-home"></i> Properties</a></li>
    <li><a href="#"><i class="fa fa-fw fa-user"></i> Profile</a></li>
    <li><a href="#"><i class="fa fa-fw fa-list"></i> Reports</a></li>
  </ul>
</template>
<script>
	export default{
		mounted: function(){
			console.log('Sidebar component mounted...');
		},
		methods: {
			fetchProperties:function(){
                console.log('Fetching properties...');
                axios.get('api/properties')
                    .then((response)=>{
                        console.log(response.data);
                        this.properties = response.data;
                        
                    })
                    .catch((error)=>{
                        console.log(error);
                    });
            }
		}
	}
</script>