import axios from "axios";

export default function useApi() {
    const session = window.document.querySelector('meta[name="session"]').content;
    const token = window.document.querySelector('meta[name="token"]').content;

    const urls = {
        paymentMethods: `/api/session/${session}/paymentMethods`,
    };

    const headers = {
        Accept: 'application/json',
        Authorization: 'Bearer ' + token,
    };

    const getPaymentMethods = async function() {
        const response = await axios.get(urls.paymentMethods, { headers: headers });
        return response.data;
    };

    return {
        getPaymentMethods
    }
}
