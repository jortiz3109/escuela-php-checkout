(self.webpackChunk=self.webpackChunk||[]).push([[773],{392:(e,t,r)=>{"use strict";var n=r(166),a={class:"flex flex-col justify-center px-10 2xl:flex-row"},o=(0,n._)("p",{class:"2xl:text-right"}," Session expires in: ",-1),s={class:"2xl:text-left px-1"};var i=r(490);const u={name:"Countdown",props:{expiration:{type:String,default:""}},emits:["expired"],setup:function(e,t){var r=t.emit,a=function(){var e=(0,n.iH)(new Date),t=setInterval((function(){e.value=new Date}),1e3);return(0,n.Jd)((function(){return clearInterval(t.value)})),{currentTime:e,intervalHandle:t}}(),o=a.currentTime,s=a.intervalHandle;function u(){var t=i.ou.fromISO(e.expiration).diff(i.ou.fromJSDate(o.value),["hours","minutes","seconds","milliseconds"]);return t<0?i.nL.fromObject({hours:0,minutes:0,seconds:0}):t}var l=(0,n.qj)({hours:u().toObject().hours.toString().padStart(2,"0"),minutes:u().toObject().minutes.toString().padStart(2,"0"),seconds:u().toObject().seconds.toString().padStart(2,"0")});return(0,n.YP)((function(){return o.value}),(function(){u()<=0&&(r("expired"),clearInterval(s)),l.hours=u().toObject().hours.toString().padStart(2,"0"),l.minutes=u().toObject().minutes.toString().padStart(2,"0"),l.seconds=u().toObject().seconds.toString().padStart(2,"0")})),{remaining:l}}};var l=r(744);const c=(0,l.Z)(u,[["render",function(e,t,r,i,u,l){return(0,n.wg)(),(0,n.iD)("div",a,[o,(0,n._)("p",s,(0,n.zw)(i.remaining.hours)+":"+(0,n.zw)(i.remaining.minutes)+":"+(0,n.zw)(i.remaining.seconds),1)])}]]);var d={class:"flex items-center relative w-full"},p={class:"container"},m={class:"progressbar"},f={class:"step-circle"},v={class:"text-center"};var y=(0,n.iH)(1);function g(){return{step:y,firstStep:1,lastStep:4,stepBack:function(){y.value>1&&y.value--},stepForward:function(){y.value<4&&y.value++},inStep:function(e){return y.value===e}}}const w={name:"Stepper",setup:function(){return{step:g().step,descriptions:{1:"Fill in payer data",2:"Select payment method",3:"Insert card data"}}}};var b=r(379),h=r.n(b),x=r(902),_={insert:"head",singleton:!1};h()(x.Z,_);x.Z.locals;const S=(0,l.Z)(w,[["render",function(e,t,r,a,o,s){return(0,n.wg)(),(0,n.iD)("div",d,[(0,n._)("div",p,[(0,n._)("ul",m,[((0,n.wg)(!0),(0,n.iD)(n.HY,null,(0,n.Ko)(a.descriptions,(function(e,t){return(0,n.wg)(),(0,n.iD)("li",{key:t,class:"step-group"},[(0,n._)("div",{class:(0,n.C_)(["step",a.step>=t?"active":""])},[(0,n._)("div",f,(0,n.zw)(t),1),(0,n._)("div",v,(0,n.zw)(e),1)],2)])})),128))])])])}],["__scopeId","data-v-1116d008"]]);var k={class:"flex flex-col h-full justify-between w-full items-center"},j={class:"flex items-center justify-items-center h-5/6 mt-12"};var D={class:"grid grid-cols-2 grid-rows-4 gap-x-6 gap-y-8"},P={class:"field-group"},C=(0,n._)("label",{class:"field-label"},"Name",-1),M={class:"field-group"},T=(0,n._)("label",{class:"field-label"},"Surname",-1),z={class:"field-group"},q=(0,n._)("label",{class:"field-label"},"Document",-1),U={class:"flex gap-4"},Z=["value"],F={class:"field-group"},H={class:"field-group"},O=(0,n._)("label",{class:"field-label"},"Email",-1),I={class:"field-group col-start-1 col-end-2"},B=(0,n._)("label",{class:"field-label"},"Mobile",-1),V={class:"flex col-span-2 justify-self-end self-start"};var $=r(954),E=r(387);Object.keys(E.ZP).forEach((function(e){(0,$.aH)(e,E.ZP[e])})),(0,$.jQ)({generateMessage:function(e){return"The field ".concat(e.field," is invalid")}});const W={name:"PayerData",props:{payer:{type:Object,default:function(){}}},emits:["save-payer"],setup:function(e,t){var r=t.emit,n=["CC","CE","NIT","PPN","TI","RUT"],a=(0,$.cI)({validationSchema:{name:"required|min:1|max:80",surname:"required|min:1|max:80",documentType:"required|one_of:".concat(n),document:"required|alpha_num",email:"required|email",mobile:"required|numeric"},initialValues:e.payer}),o=a.handleSubmit,s=a.errors;return{documentTypes:n,name:(0,$.U$)("name").value,surname:(0,$.U$)("surname").value,documentType:(0,$.U$)("documentType").value,document:(0,$.U$)("document").value,email:(0,$.U$)("email").value,mobile:(0,$.U$)("mobile").value,errors:s,onSubmit:o((function(e){r("save-payer",e)}))}}},L=(0,l.Z)(W,[["render",function(e,t,r,a,o,s){return(0,n.wg)(),(0,n.iD)("div",D,[(0,n._)("div",P,[C,(0,n.wy)((0,n._)("input",{id:"name","onUpdate:modelValue":t[0]||(t[0]=function(e){return a.name=e}),class:(0,n.C_)(["field-input",a.errors.name?"border-red-500":""]),type:"text",name:"name"},null,2),[[n.nr,a.name]]),(0,n.wy)((0,n._)("p",{class:"error-message"},(0,n.zw)(a.errors.name),513),[[n.F8,a.errors.name]])]),(0,n._)("div",M,[T,(0,n.wy)((0,n._)("input",{id:"surname","onUpdate:modelValue":t[1]||(t[1]=function(e){return a.surname=e}),class:(0,n.C_)(["field-input",a.errors.surname?"border-red-500":""]),type:"text",name:"surname"},null,2),[[n.nr,a.surname]]),(0,n.wy)((0,n._)("p",{class:"error-message"},(0,n.zw)(a.errors.surname),513),[[n.F8,a.errors.surname]])]),(0,n._)("div",z,[q,(0,n._)("div",U,[(0,n.wy)((0,n._)("select",{id:"documentType","onUpdate:modelValue":t[2]||(t[2]=function(e){return a.documentType=e}),class:(0,n.C_)(["field-label field-input",a.errors.documentType?"border-red-500":""])},[((0,n.wg)(!0),(0,n.iD)(n.HY,null,(0,n.Ko)(a.documentTypes,(function(e){return(0,n.wg)(),(0,n.iD)("option",{key:e,value:e},(0,n.zw)(e),9,Z)})),128))],2),[[n.bM,a.documentType]]),(0,n.wy)((0,n._)("input",{id:"document","onUpdate:modelValue":t[3]||(t[3]=function(e){return a.document=e}),class:(0,n.C_)(["field-input",a.errors.document?"border-red-500":""]),type:"text",name:"document"},null,2),[[n.nr,a.document]])]),(0,n._)("div",F,[(0,n.wy)((0,n._)("p",{class:"error-message"},(0,n.zw)(a.errors.documentType),513),[[n.F8,a.errors.documentType]]),(0,n.wy)((0,n._)("p",{class:"error-message"},(0,n.zw)(a.errors.document),513),[[n.F8,a.errors.document]])])]),(0,n._)("div",H,[O,(0,n.wy)((0,n._)("input",{id:"email","onUpdate:modelValue":t[4]||(t[4]=function(e){return a.email=e}),class:(0,n.C_)(["field-input",a.errors.email?"border-red-500":""]),type:"email",name:"email"},null,2),[[n.nr,a.email]]),(0,n.wy)((0,n._)("p",{class:"error-message"},(0,n.zw)(a.errors.email),513),[[n.F8,a.errors.email]])]),(0,n._)("div",I,[B,(0,n.wy)((0,n._)("input",{id:"mobile","onUpdate:modelValue":t[5]||(t[5]=function(e){return a.mobile=e}),class:(0,n.C_)(["field-input",a.errors.mobile?"border-red-500":""]),type:"text",name:"mobile"},null,2),[[n.nr,a.mobile]]),(0,n.wy)((0,n._)("p",{class:"error-message"},(0,n.zw)(a.errors.mobile),513),[[n.F8,a.errors.mobile]])]),(0,n._)("div",V,[(0,n._)("button",{class:"border px-8 py-3 bg-gray-500 rounded-lg hover:bg-gray-700 text-white",onClick:t[6]||(t[6]=function(){return a.onSubmit&&a.onSubmit.apply(a,arguments)})}," Next ")])])}]]);var N={class:"grid gap-8 lg:grid-cols-2"},Y=["onClick"],K=["src"],R={class:"pr-8"};var A=r(757),J=r.n(A),X=r(669),Q=r.n(X);function G(e,t,r,n,a,o,s){try{var i=e[o](s),u=i.value}catch(e){return void r(e)}i.done?t(u):Promise.resolve(u).then(n,a)}const ee={getPaymentMethods:function(){var e,t=(e=J().mark((function e(){var t;return J().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,Q().get((r="paymentMethods",n=void 0,n=window.document.querySelector('meta[name="session"]').content,{paymentMethods:"/api/session/".concat(n,"/paymentMethods")}[r]),{headers:{Accept:"application/json",Authorization:"Bearer "+window.document.querySelector('meta[name="token"]').content}});case 2:return t=e.sent,e.abrupt("return",t.data);case 4:case"end":return e.stop()}var r,n}),e)})),function(){var t=this,r=arguments;return new Promise((function(n,a){var o=e.apply(t,r);function s(e){G(o,n,a,s,i,"next",e)}function i(e){G(o,n,a,s,i,"throw",e)}s(void 0)}))});return function(){return t.apply(this,arguments)}}()};function te(e,t,r,n,a,o,s){try{var i=e[o](s),u=i.value}catch(e){return void r(e)}i.done?t(u):Promise.resolve(u).then(n,a)}const re={name:"PaymentMethods",emits:["select-payment-method"],setup:function(e,t){return(r=J().mark((function e(){var r,n,a;return J().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return a=function(e){r("select-payment-method",e)},r=t.emit,e.next=4,ee.getPaymentMethods();case 4:return n=e.sent,e.abrupt("return",{paymentMethods:n,select:a});case 6:case"end":return e.stop()}}),e)})),function(){var e=this,t=arguments;return new Promise((function(n,a){var o=r.apply(e,t);function s(e){te(o,n,a,s,i,"next",e)}function i(e){te(o,n,a,s,i,"throw",e)}s(void 0)}))})();var r}},ne=(0,l.Z)(re,[["render",function(e,t,r,a,o,s){return(0,n.wg)(),(0,n.iD)("div",N,[((0,n.wg)(!0),(0,n.iD)(n.HY,null,(0,n.Ko)(a.paymentMethods,(function(e){return(0,n.wg)(),(0,n.iD)("div",{key:e.id,class:"bg-white p-6 flex gap-5 justify-between items-center rounded-lg shadow cursor-pointer",onClick:function(t){return a.select(e.id)}},[(0,n._)("img",{src:e.logo,alt:"logo",class:"h-16 my-6 mx-4"},null,8,K),(0,n._)("h1",R,(0,n.zw)(e.name),1)],8,Y)})),128))])}]]);var ae={key:0};const oe={name:"SuspenseComponent",components:{MoonLoader:r(433).Z},setup:function(){var e=(0,n.iH)(null);return(0,n.d1)((function(t){e.value=t.message})),{suspenseError:e}}};var se={class:"grid grid-cols-2 items-baseline w-5/6"},ie={key:1,href:"#",class:"p-2 my-8 justify-self-end col-start-2 underline text-gray-500 hover:text-blue-900"};const ue={name:"Footer",setup:function(){var e=g();return{step:e.step,firstStep:e.firstStep,lastStep:e.lastStep,stepBack:e.stepBack}}},le={name:"Transaction",components:{PayerData:L,PaymentMethods:ne,SuspenseComponent:(0,l.Z)(oe,[["render",function(e,t,r,a,o,s){var i=(0,n.up)("MoonLoader");return a.suspenseError?((0,n.wg)(),(0,n.iD)("div",ae,(0,n.zw)(a.suspenseError),1)):((0,n.wg)(),(0,n.j4)(n.n4,{key:1,timeout:"0"},{default:(0,n.w5)((function(){return[(0,n.WI)(e.$slots,"default")]})),fallback:(0,n.w5)((function(){return[(0,n.Wm)(i,{color:"#1e3b8a"})]})),_:3}))}]]),Footer:(0,l.Z)(ue,[["render",function(e,t,r,a,o,s){return(0,n.wg)(),(0,n.iD)("div",se,[a.step>a.firstStep?((0,n.wg)(),(0,n.iD)("button",{key:0,class:"bg-gray-500 text-white shadow py-3 px-12 my-8 rounded-lg justify-self-start hover:bg-gray-700",onClick:t[0]||(t[0]=function(){return a.stepBack&&a.stepBack.apply(a,arguments)})}," Back ")):(0,n.kq)("",!0),a.step<a.lastStep?((0,n.wg)(),(0,n.iD)("a",ie,"Do not want to continue")):(0,n.kq)("",!0)])}]])},setup:function(){var e=g(),t=e.step,r=e.stepBack,a=e.stepForward,o=e.inStep,s=(0,n.iH)({name:"",surname:"",documentType:"",document:"",email:"",mobile:""}),i=(0,n.iH)({});return{payer:s,step:t,stepBack:r,inStep:o,savePayerData:function(e){s.value=e,a()},selectPaymentMethod:function(e){i.value=e,a()}}}},ce=(0,l.Z)(le,[["render",function(e,t,r,a,o,s){var i=(0,n.up)("PayerData"),u=(0,n.up)("PaymentMethods"),l=(0,n.up)("SuspenseComponent"),c=(0,n.up)("Footer");return(0,n.wg)(),(0,n.iD)("div",k,[(0,n._)("div",j,[a.inStep(1)?((0,n.wg)(),(0,n.j4)(i,{key:0,payer:a.payer,class:"mt-20",onSavePayer:a.savePayerData},null,8,["payer","onSavePayer"])):(0,n.kq)("",!0),a.inStep(2)?((0,n.wg)(),(0,n.j4)(l,{key:1},{default:(0,n.w5)((function(){return[(0,n.Wm)(u,{onSelectPaymentMethod:a.selectPaymentMethod},null,8,["onSelectPaymentMethod"])]})),_:1})):(0,n.kq)("",!0)]),(0,n.Wm)(c,{class:"h-1/6"})])}]]);r(333),(0,n.ri)({components:{Countdown:c,Stepper:S,Transaction:ce}}).mount("#app")},333:(e,t,r)=>{window._=r(486),window.axios=r(669),window.axios.defaults.headers.common["X-Requested-With"]="XMLHttpRequest"},902:(e,t,r)=>{"use strict";r.d(t,{Z:()=>o});var n=r(645),a=r.n(n)()((function(e){return e[1]}));a.push([e.id,'.container[data-v-1116d008]{position:absolute;width:100%;z-index:20}.progressbar[data-v-1116d008]{display:flex;justify-content:space-evenly}.progressbar li[data-v-1116d008],.step[data-v-1116d008]{display:flex;width:100%}.step[data-v-1116d008]{align-items:center;flex-direction:column;justify-items:center;position:relative}.step-circle[data-v-1116d008]{--tw-border-opacity:1;--tw-bg-opacity:1;align-items:center;background-color:rgba(255,255,255,var(--tw-bg-opacity));border-color:rgba(209,213,219,var(--tw-border-opacity));border-radius:9999px;border-width:4px;display:flex;height:2.5rem;justify-content:center;transition:border-color .5s ease-in-out .1s;width:2.5rem}.active .step-circle[data-v-1116d008]{--tw-border-opacity:1;border-color:rgba(30,58,138,var(--tw-border-opacity))}.active.step[data-v-1116d008]:before{--tw-bg-opacity:1;background-color:rgba(30,58,138,var(--tw-bg-opacity))}.step[data-v-1116d008]:before{--tw-bg-opacity:1;background-color:rgba(209,213,219,var(--tw-bg-opacity));content:"";height:.25rem;position:absolute;top:1.25rem;transition:background .5s ease-in-out;width:100%;z-index:-1}.step-group:first-child .step[data-v-1116d008]:before{align-self:flex-end;width:50%}.step-group:last-child .step[data-v-1116d008]:before{align-self:flex-start;width:50%}',""]);const o=a},584:()=>{}},e=>{var t=t=>e(e.s=t);e.O(0,[170,898],(()=>(t(392),t(584))));e.O()}]);