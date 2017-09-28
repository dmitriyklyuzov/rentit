<template>
    <div class="panel panel-default">
        <div class="panel-heading">Profile</div>

        <div class="panel-body">

            <h3>{{user.name}}</h3>
            <p>{{user.email}}</p>
            <p>{{user.phone}}</p>
            
        </div>
    </div>
</template>

<script>
    export default{
        data: function(){
            return{
                user:{}
            }
        },
        mounted: function(){
            console.log('UserInfo component loaded');
            this.fetchUserInfo();
        },
        methods: {
            fetchUserInfo:function(){
                console.log('Fetching user info...');
                axios.get('api/user')
                    .then((response)=>{
                        console.log(response.data);
                        this.user = response.data;
                    })
                    .catch((error)=>{
                        console.log(error);
                    });
            }
        }
    }
</script>