import { reactive } from 'vue'

export default reactive({
    payer: {
        name: undefined,
        surname: undefined,
        documentType: undefined,
        document: undefined,
        email: undefined,
        mobile: undefined,
    },
    paymentMethod: {
        category: undefined,
    },
    session: {
        expired: false,
    },
})
