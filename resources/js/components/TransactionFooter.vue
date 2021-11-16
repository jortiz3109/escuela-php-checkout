<template>
    <div class="flex justify-between">
        <div>
            <custom-button
                v-if="step > firstStep"
                text="Back"
                icon="back"
                class="ring-offset-gray-200"
                @click="stepBack"
            />
        </div>
        <a
            v-if="step < lastStep"
            href="#"
            class="hover:text-gray-700 text-gray-500 underline"
        >
            Do not want to continue
        </a>
    </div>
</template>

<script>
import useStep from '../use/useStep'
import CustomButton from './CustomButton'

export default {
    name: 'Footer',

    components: { CustomButton },

    setup() {
        const { step, firstStep, lastStep, stepBack } = useStep()

        return { step, firstStep, lastStep, stepBack }
    },
}
</script>
