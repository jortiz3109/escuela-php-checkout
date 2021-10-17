import { onBeforeUnmount, ref } from 'vue';

export const useCurrentTime = () => {
	const currentTime = ref(new Date());
	const updateCurrentTime = () => { currentTime.value = new Date(); };
	const intervalHandle = setInterval(updateCurrentTime, 1000);

	onBeforeUnmount(() => clearInterval(intervalHandle.value));

	return { currentTime, intervalHandle };
};
