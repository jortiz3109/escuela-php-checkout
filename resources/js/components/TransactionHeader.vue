<template>
    <div>
        <h1 class="font-bold text-3xl text-gray-500">{{ title }}</h1>
    </div>
</template>

<script>
import { useStep } from '../use'
import { computed } from 'vue'

export default {
    name: 'TransactionHeader',
    setup() {
        const { step } = useStep()
        const titles = [
            'Payer Information',
            'Payment Method',
            'Card Information',
        ]
        const title = computed(() => titles[step.value - 1])
        return { title }
    }
}
</script>
