import PaymentMethods from '../../resources/js/components/PaymentMethods';
import { flushPromises, mount } from '@vue/test-utils';
import { defineComponent, h, Suspense } from 'vue';
import api from '../../resources/js/api.js';

describe('PaymentMethods', () => {
	let wrapper;

	const mockPaymentMethodsList = [
		{
			id: 1,
			name: 'Visa credit',
			category: 'credit',
			logo: 'https://logos-marcas.com/wp-content/uploads/2020/04/Visa-Emblema.png'
		},
		{
			id: 2,
			name: 'Visa debit',
			category: 'debit',
			logo: 'https://seeklogo.com/images/V/visa-electron-logo-71BEC57E8F-seeklogo.com.png'
		},
	];

	api.getPaymentMethods = jest.fn(() => mockPaymentMethodsList);

	const mountSuspense =  async (component, options) => {
		const wrapper = mount(defineComponent({
			render() {
				return h(Suspense, null, {
					default: h(component),
					fallback: h('div', 'fallback')
				});
			}
		}), options);

		await flushPromises();
		return wrapper;
	};

	beforeEach(async () => {
		wrapper = await mountSuspense(PaymentMethods);
	});

	test('it can fetch payment methods', () => {
		expect(api.getPaymentMethods).toHaveBeenCalledTimes(1);
	});

	test('it can show the payment methods', () => {
		see('Visa credit');
		see('Visa debit');
	});

	test('it broadcasts when a payment method is selected', async () => {
		const paymentMethodsComponent = wrapper.findComponent(PaymentMethods);

		paymentMethodsComponent.find('.cursor-pointer').trigger('click');

		expect(paymentMethodsComponent.emitted('select-payment-method')).toBeTruthy();
		expect(paymentMethodsComponent.emitted('select-payment-method').length).toEqual(1);
		expect(paymentMethodsComponent.emitted('select-payment-method')[0]).toEqual([1]);
	});

	// Helper functions
	let see = (text, selector) => {
		let wrap = selector ? wrapper.find(selector) : wrapper;

		expect(wrap.html()).toContain(text);
	};
});
