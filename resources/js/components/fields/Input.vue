<template>
    <div class="relative pt-4">
        <label :for="id" class="label-input-default">
            <slot name="label">{{label}}</slot> :
        </label>
        <input 
            :type="type"
            :id="id"
            :name="name"
            :placeholder="placeholder"
            class="input-default"
            >
    </div>
</template>
<script>
export default {
    props:{
        type:{
            type: String,
            default: "text"
        },
        id:{
            type: String,
            default: "field"
        },
        name:{
            type: String,
            default: "field"
        },
        placeholder:{
            type: String,
            default: "placeholder"
        },
        label:{
            type: String,
            default: "Field"
        }
    },
    data()
    {
        return {}
    },
    created()
    {

    },
    mounted() {
        
    },
    methods:
    {
        
    }
}
</script>