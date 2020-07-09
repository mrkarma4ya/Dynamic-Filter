<template>
    
        <div class="row">
            <div class="col">
                <label for="minPrice">
                    <h6>Min Price ($)</h6>
                </label>
                <input
                    type="number"
                    class="form-control"
                    ref="minPriceInput"
                    :placeholder="minPrice"
                    :value="value.min"
                    @input="updatePrice()"
                    @change="handler()"
                />
            </div>
            <div class="col">
                <label for="maxPrice">
                    <h6>Max Price ($)</h6>
                </label>
                <input
                    type="number"
                    class="form-control"
                    ref="maxPriceInput"
                    :placeholder="maxPrice"
                    :value="value.max"
                    @input="updatePrice()"
                    @change="handler()"
                />
            </div> 
        </div>
    
</template>
<script>
export default {
    data() {
        return {
           
        };
    },
    props: {
        value: {
            type: Object,
            default(){
                return {
                    min: null,
                    max: null
                }
            }
        },
        minPrice: {

        },
        maxPrice: {

        },
        changeHandler: {
            type: Function,
            default: () => {}
        }
    },

    methods: {
        updatePrice(value) {
            this.$emit("input", {
                min: this.$refs.minPriceInput.value,
                max: this.$refs.maxPriceInput.value,
            });
        },
        
        handler(){
            this.changeHandler();
        }
    },
};
</script>