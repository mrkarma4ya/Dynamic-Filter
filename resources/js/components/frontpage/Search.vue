<template>
    <div class="form-group has-search">
        <span class="fa fa-search form-control-feedback"></span>
        <input
            type="text"
            class="form-control"
            placeholder="Search"
            :value="value"
            @input="updateValue($event.target.value)"
            @change="handler()"
        />
    </div>
</template>
<script>
export default {
    data() {
        return {};
    },
    props: {
        value: {
            type: String
        },
        changeHandler: {
            type: Function,
            default: () => {}
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