import axios from 'axios';

const getUrl = (url) => {
	const session = window.document.querySelector('meta[name="session"]').content;
	const urls = {
		paymentMethods: `/api/session/${session}/paymentMethods`,
	};
	return urls[url];
};

const getHeader = function () {
	const token = window.document.querySelector('meta[name="token"]').content;
	return {
		Accept: 'application/json',
		Authorization: 'Bearer ' + token,
	};
};

const getPaymentMethods = async function() {
	const response = await axios.get(getUrl('paymentMethods'), { headers: getHeader() });

	return response.data;
};

export default {
	getPaymentMethods,
};
