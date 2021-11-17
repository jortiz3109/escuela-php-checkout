import axios from 'axios'

export default function useApi() {
    const session = window.document.querySelector('meta[name="session"]').content
    const token = window.document.querySelector('meta[name="token"]').content

    const urls = {
        paymentMethods: `/api/v1/session/${session}/payment-methods`,
        validateCardInformation: 'api/v1/validate-card-information',
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

    const postValidateCardInformation = async function (body) {
        const response = await axios.post(urls.validateCardInformation, {
            headers: headers,
            data: body,
        })
        return response.data
    }

    return {
        getPaymentMethods,
        postValidateCardInformation
    }
}
