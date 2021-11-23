<template>
    <button
        :disabled="disabled"
        type="button"
        :class="disabled ? 'bg-gray-400 cursor-default text-gray-200' : 'bg-gray-600 hover:bg-gray-700'"
        class="border border-transparent focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 font-bold font-medium gap-2 inline-flex items-center px-4 py-2 rounded-md shadow-sm text-sm text-white"
    >
        <ArrowSmLeftIcon v-if="icon === 'back'" class="h-5 w-5" aria-hidden="true"/>
        {{ text }}
        <ArrowSmRightIcon v-if="icon === 'next'" class="h-5 w-5" aria-hidden="true"/>
    </button>
</template>

<script>
import { ArrowSmRightIcon, ArrowSmLeftIcon } from '@heroicons/vue/solid'
export default {
    name: 'CustomButton',
    components: { ArrowSmRightIcon, ArrowSmLeftIcon },
    props: {
        text: { type: String, default: 'Button' },
        icon: { type: String, default: null },
        disabled: { type: Boolean, default: false }
    }
}
</script>
