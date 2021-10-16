import Countdown from "../../resources/js/components/Countdown";
import { mount } from '@vue/test-utils';
import { DateTime } from "luxon";
import sinon from "sinon";

describe('Countdown', () => {
    let wrapper, clock;

    beforeEach(() => {
        clock = sinon.useFakeTimers();
        wrapper = mount(Countdown, {
            props: {
                expiration: DateTime.now().plus({minutes: 15}).toISO()
            }
        });
    })

    afterEach(() => clock.restore());

    test('renders a countdown timer', () => {
        see('00:15:00');
    })

    // Helper functions
    let see = (text, selector) => {
        let wrap = selector ? wrapper.find(selector) : wrapper;

        expect(wrap.html()).toContain(text);
    }
});
