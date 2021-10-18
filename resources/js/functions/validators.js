import { defineRule } from "vee-validate";
import AllRules from '@vee-validate/rules';

Object.keys(AllRules).forEach(rule => {
    defineRule(rule, AllRules[rule]);
});

import { configure } from 'vee-validate';

configure({
    generateMessage: context => {
        return `The field ${context.field} is invalid`;
    },
});

