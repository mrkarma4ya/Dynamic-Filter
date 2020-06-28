<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-12">
                <form action="" @submit.prevent="addCategory">
                    <label for="" >Category</label>
                    <input type="text" name="category" id="" class="form-control" v-model="categoryName">
                    <input type="submit" value="Add Category" class="btn btn-success mt-1">
                </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            categoryName: null
        }
    },

    methods: {
        addCategory: function(){
            console.log('creating category...')
            axios.post('api/categories',{
                name: this.categoryName
            })
            .then(function(response){
                console.log('New Category Created: ' + response.data.data.name)
            })
            .catch(function(error){
                console.log(error)
            })
        }
    },
    
}
</script>