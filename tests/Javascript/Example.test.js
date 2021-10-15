import Example from '../../resources/js/components/Example';
import { mount } from '@vue/test-utils';

test('displays message', () => {
	const wrapper = mount(Example);

	expect(wrapper.text()).toContain('Hello world');
});
