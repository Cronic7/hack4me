<template>
    <div>
        <button  :type="type" class="my-button" v-text="test"></button>
        <h1>s</h1>

    </div>
</template>

<script>
export default {
    mounted() {

        console.log('Component mounted.')
        
        axios.post('api/test',{})
        .then(response=>{
            this.test=response.data;
        });
    },


data:function(){
    return {
        test:null,
    }
},




    props:[
       'text',
       'type'
    ]

}

</script>
<style>
    .my-button{
            background-color: red;
    }
</style>
