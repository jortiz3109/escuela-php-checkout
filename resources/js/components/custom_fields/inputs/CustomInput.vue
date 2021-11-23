<template>
    <div class="flex flex-col max-w-lg">
        <label class="font-black text-gray-600" :class="labelClass" :for="id">{{ label }}</label>
        <cleave
            v-if="cleave"
            :id="id"
            v-model="inputValue"
            class="block border-gray-300 focus:border-gray-400 focus:ring-gray-400 rounded-md shadow-sm sm:text-sm w-full"
            :type="type"
            :name="name || id"
            :placeholder="placeholder"
            :maxlength="maxlength"
            :options="cleave"
        />
        <input
            v-else
            :id="id"
            v-model="inputValue"
            class="block border-gray-300 focus:border-gray-400 focus:ring-gray-400 rounded-md shadow-sm sm:text-sm w-full"
            :type="type"
            :name="name || id"
            :placeholder="placeholder"
            :maxlength="maxlength"
        />
        <span
            v-for="pError in errors"
            v-show="errors"
            :key="pError"
            class="error-message"
        >
            {{ '&bull; ' + pError }}
        </span>
        <span v-show="error" class="error-message">
            {{ error }}
        </span>
    </div>
</template>

<script>
import { ref, watch } from 'vue'

export default {
    name: 'CustomInput',
    props: {
        id: { type: String, required: true },
        label: { type: String, default: null },
        labelClass: { type: String, default: null },
        type: { type: String, default: 'text' },
        name: { type: String, default: null },
        placeholder: { type: String, default: null },
        modelValue: { type: String, default: null },
        error: { type: String, default: null },
        errors: { type: Array, default: null },
        cleave: { type: Object, default: null },
        maxlength: { type: String, default: null }
    },
    emits: ['update:modelValue'],
    setup(props, { emit }) {
        const inputValue = ref(props.modelValue)
        watch(inputValue, current => {
            emit('update:modelValue', current)
        })
        return { inputValue }
    }
}
</script>
