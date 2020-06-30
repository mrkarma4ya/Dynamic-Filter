<template>
    <div>
        <select
            :class="selectClass"
            :value="value"
            @input="updateValue($event.target.value)"
            @change="handler()"
        >
            <option value="10">10</option>
            <option value="20">20</option>
            <option value="30">50</option>
            <option value="40">100</option>
            <option value="50">500</option>
        </select>
    </div>
</template>
<script>
export default {
    data() {
        return {
            
        }
    },
    props: {
        value:{
            default: 10
        },
        changeHandler:{
            type: Function,
            default: ()=>{}
        },
        selectClass:{
            type: String
        }
    },
    methods: {
        updateValue: function(value) {
            this.$emit("input", value);
        },
        handler() {
            this.changeHandler();
        }
    }
};
</script>