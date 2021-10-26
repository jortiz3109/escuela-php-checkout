import { ref } from 'vue';

const expired = ref(false);

export default function useState() {
	const expireSession = () => {
		expired.value = true;
	};

	return { expired, expireSession };
}
