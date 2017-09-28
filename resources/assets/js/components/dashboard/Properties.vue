<template>
    <div class="panel panel-default">
        <div class="panel-heading">My properties</div>

        <div class="panel-body">
            <!-- @if(count($properties)>0) -->
            <ul class="list-group">
                <!-- @foreach($properties as $property) -->
                <li class="list-group-item" v-for="property in properties">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4>
                                <a href="#">
                                   {{property.title}}
                                </a> - <small>{{property.price}}</small>
                            </h4>
                        </div>
                        <div class="col-sm-6">
                            <div class="pull-right">
                                <a href="#" class="btn btn-default btn-sm">View</a>
                                <a href="#" class="btn btn-info btn-sm">Edit</a>
                            </div>    
                        </div>
                        
                    </div>
                </li>
                <!-- @endforeach -->
            </ul>
            <!-- @else -->
                <!-- <p>You have no properties listed. Why not <a href="/properties/create">create one</a>?</p> -->
            <!-- @endif -->
        </div>
    </div>	
</template>

<script>
    export default{
        data: function(){
            return{
                properties:[]
            }
        },
        mounted: function(){
            console.log('Properties component loaded');;
            this.fetchProperties();
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