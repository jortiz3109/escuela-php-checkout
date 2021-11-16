<template>
    <div class="flex flex-col max-w-sm">
        <label class="font-black text-gray-600" :class="labelClass" :for="id">{{ label }}</label>
        <select
            :id="id"
            v-model="selectValue"
            @change="update"
            class="block border-gray-300 focus:border-gray-400 focus:ring-gray-400 rounded-md shadow-sm sm:text-sm w-full"
        >
            <slot/>
        </select>
        <span v-show="error" class="error-message">
            {{ error }}
        </span>
    </div>
</template>

<script>
import { ref } from 'vue'

export default {
    name: 'CustomSelect',
    props: {
        id: { type: String, required: true },
        name: { type: String, default: null },
        label: { type: String, default: null },
        labelClass: { type: String, default: null },
        modelValue: { type: String, default: null },
        error: { type: String, default: null }
    },
    emits: ['update:modelValue'],
    setup(props, { emit }) {
        const selectValue = ref(props.modelValue)
        const update = () => emit('update:modelValue', selectValue.value)
        return { selectValue, update }
    }
}
</script>
