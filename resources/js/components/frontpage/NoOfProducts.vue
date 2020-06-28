<template>
    <div>
        <select
            :class="selectClass"
            :value="value"
            @input="updateValue($event.target.value)"
            @change="handler()"
        >
            <option>10</option>
            <option>20</option>
            <option>50</option>
            <option>100</option>
            <option>500</option>
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
            type: Number,
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