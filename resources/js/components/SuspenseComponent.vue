<template>
    <div v-if="suspenseError">{{ suspenseError }}</div>
    <Suspense timeout="0" v-else>
        <template #default>
            <slot></slot>
        </template>
        <template #fallback>
            <MoonLoader color="#1e3b8a"></MoonLoader>
        </template>
    </Suspense>
</template>

<script>
import MoonLoader from 'vue-spinner/src/MoonLoader'
import { onErrorCaptured, ref } from 'vue';

export default {
	name: 'SuspenseComponent',

    components: { MoonLoader },

	setup() {
		const suspenseError = ref(null);

		onErrorCaptured(e => {
			suspenseError.value = e.message;
		});

		return { suspenseError };
	}
};
</script>
