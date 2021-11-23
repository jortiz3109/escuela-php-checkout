import axios from 'axios'

export default function useApi() {
    const session = window.document.querySelector('meta[name="session"]').content
    const token = window.document.querySelector('meta[name="token"]').content

    const urls = {
        paymentMethods: `/api/v1/session/${session}/payment-methods`,
        validateCardSettings: `api/v1/session/${session}/card-settings`,
    }

    const headers = {
        Accept: 'application/json',
        Authorization: 'Bearer ' + token,
    }

    const getPaymentMethods = async function () {
        const response = await axios.get(urls.paymentMethods, {
            headers: headers,
        })
        return response.data
    }

    const postValidateCardSettings = async function (body) {
        const response = await axios.post(urls.validateCardSettings, {
            headers: headers,
            data: body,
        })
        return response.data
    }

    return {
        getPaymentMethods,
        postValidateCardSettings,
    }
}
