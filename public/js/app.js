(self.webpackChunk=self.webpackChunk||[]).push([[773],{778:(e,t,n)=>{"use strict";var r=n(166),a={class:"2xl:flex-row flex flex-col justify-center px-10"},o=(0,r._)("p",{class:"2xl:text-right"},"Session expires in:",-1),s={class:"2xl:text-left px-1"};var i=n(490),u=(0,r.iH)(!1);function l(){return{expired:u,expireSession:function(){u.value=!0}}}const c={name:"Countdown",props:{expiration:{type:String,default:""}},setup:function(e){var t,n=(0,r.iH)(new Date),a=l(),o=a.expired,s=a.expireSession,u=(0,r.Fl)((function(){var t=i.ou.fromISO(e.expiration).diff(i.ou.fromJSDate(n.value),["hours","minutes","seconds","milliseconds"]);return t<=0&&(s(),t<0&&(t=i.nL.fromObject({hours:0,minutes:0,seconds:0}))),{hours:t.toObject().hours.toString().padStart(2,"0"),minutes:t.toObject().minutes.toString().padStart(2,"0"),seconds:t.toObject().seconds.toString().padStart(2,"0")}}));return(0,r.YP)((function(){return o.value}),(function(e){e&&clearInterval(t)})),(0,r.wF)((function(){t=setInterval((function(){n.value=new Date}),1e3)})),{remaining:u}}};var d=n(744);const p=(0,d.Z)(c,[["render",function(e,t,n,i,u,l){return(0,r.wg)(),(0,r.iD)("div",a,[o,(0,r._)("p",s,(0,r.zw)(i.remaining.hours)+":"+(0,r.zw)(i.remaining.minutes)+":"+(0,r.zw)(i.remaining.seconds),1)])}]]);var m={class:"flex items-center relative w-full"},f={class:"container"},v={class:"progressbar"},y={class:"step-circle"},w={class:"text-center"};var b=(0,r.iH)(1);function g(){return{step:b,firstStep:1,lastStep:4,stepBack:function(){b.value>1&&b.value--},stepForward:function(){b.value<4&&b.value++},inStep:function(e){return b.value===e}}}const h={name:"Stepper",setup:function(){return{step:g().step,descriptions:{1:"Fill in payer data",2:"Select payment method",3:"Insert card data"}}}};var x=n(379),_=n.n(x),S=n(594),k={insert:"head",singleton:!1};_()(S.Z,k);S.Z.locals;const D=(0,d.Z)(h,[["render",function(e,t,n,a,o,s){return(0,r.wg)(),(0,r.iD)("div",m,[(0,r._)("div",f,[(0,r._)("ul",v,[((0,r.wg)(!0),(0,r.iD)(r.HY,null,(0,r.Ko)(a.descriptions,(function(e,t){return(0,r.wg)(),(0,r.iD)("li",{key:t,class:"step-group"},[(0,r._)("div",{class:(0,r.C_)(["step",a.step>=t?"active":""])},[(0,r._)("div",y,(0,r.zw)(t),1),(0,r._)("div",w,(0,r.zw)(e),1)],2)])})),128))])])])}],["__scopeId","data-v-5b322381"]]);var P={class:"flex flex-col h-full items-center justify-between w-full"},j={class:"flex h-5/6 items-center justify-items-center mt-12"};var C={class:"gap-x-6 gap-y-8 grid grid-cols-2 grid-rows-4"},M={class:"field-group"},T=(0,r._)("label",{class:"field-label"},"Name",-1),z={class:"field-group"},q=(0,r._)("label",{class:"field-label"},"Surname",-1),F={class:"field-group"},U=(0,r._)("label",{class:"field-label"},"Document",-1),Z={class:"flex gap-4"},H=["value"],I={class:"field-group"},O={class:"field-group"},B=(0,r._)("label",{class:"field-label"},"Email",-1),V={class:"col-end-2 col-start-1 field-group"},$=(0,r._)("label",{class:"field-label"},"Mobile",-1),E={class:"col-span-2 flex justify-self-end self-start"};var W=n(954),L=n(387);Object.keys(L.ZP).forEach((function(e){(0,W.aH)(e,L.ZP[e])})),(0,W.jQ)({generateMessage:function(e){return"The field ".concat(e.field," is invalid")}});const N={name:"PayerData",props:{payer:{type:Object,default:function(){}}},emits:["save-payer"],setup:function(e,t){var n=t.emit,r=["CC","CE","NIT","PPN","TI","RUT"],a=(0,W.cI)({validationSchema:{name:"required|min:1|max:80",surname:"required|min:1|max:80",documentType:"required|one_of:".concat(r),document:"required|alpha_num",email:"required|email",mobile:"required|numeric"},initialValues:e.payer}),o=a.handleSubmit,s=a.errors;return{documentTypes:r,name:(0,W.U$)("name").value,surname:(0,W.U$)("surname").value,documentType:(0,W.U$)("documentType").value,document:(0,W.U$)("document").value,email:(0,W.U$)("email").value,mobile:(0,W.U$)("mobile").value,errors:s,onSubmit:o((function(e){n("save-payer",e)}))}}},Y=(0,d.Z)(N,[["render",function(e,t,n,a,o,s){return(0,r.wg)(),(0,r.iD)("div",C,[(0,r._)("div",M,[T,(0,r.wy)((0,r._)("input",{id:"name","onUpdate:modelValue":t[0]||(t[0]=function(e){return a.name=e}),class:(0,r.C_)(["field-input",a.errors.name?"border-red-500":""]),type:"text",name:"name"},null,2),[[r.nr,a.name]]),(0,r.wy)((0,r._)("p",{class:"error-message"},(0,r.zw)(a.errors.name),513),[[r.F8,a.errors.name]])]),(0,r._)("div",z,[q,(0,r.wy)((0,r._)("input",{id:"surname","onUpdate:modelValue":t[1]||(t[1]=function(e){return a.surname=e}),class:(0,r.C_)(["field-input",a.errors.surname?"border-red-500":""]),type:"text",name:"surname"},null,2),[[r.nr,a.surname]]),(0,r.wy)((0,r._)("p",{class:"error-message"},(0,r.zw)(a.errors.surname),513),[[r.F8,a.errors.surname]])]),(0,r._)("div",F,[U,(0,r._)("div",Z,[(0,r.wy)((0,r._)("select",{id:"documentType","onUpdate:modelValue":t[2]||(t[2]=function(e){return a.documentType=e}),class:(0,r.C_)(["field-input field-label",a.errors.documentType?"border-red-500":""])},[((0,r.wg)(!0),(0,r.iD)(r.HY,null,(0,r.Ko)(a.documentTypes,(function(e){return(0,r.wg)(),(0,r.iD)("option",{key:e,value:e},(0,r.zw)(e),9,H)})),128))],2),[[r.bM,a.documentType]]),(0,r.wy)((0,r._)("input",{id:"document","onUpdate:modelValue":t[3]||(t[3]=function(e){return a.document=e}),class:(0,r.C_)(["field-input",a.errors.document?"border-red-500":""]),type:"text",name:"document"},null,2),[[r.nr,a.document]])]),(0,r._)("div",I,[(0,r.wy)((0,r._)("p",{class:"error-message"},(0,r.zw)(a.errors.documentType),513),[[r.F8,a.errors.documentType]]),(0,r.wy)((0,r._)("p",{class:"error-message"},(0,r.zw)(a.errors.document),513),[[r.F8,a.errors.document]])])]),(0,r._)("div",O,[B,(0,r.wy)((0,r._)("input",{id:"email","onUpdate:modelValue":t[4]||(t[4]=function(e){return a.email=e}),class:(0,r.C_)(["field-input",a.errors.email?"border-red-500":""]),type:"email",name:"email"},null,2),[[r.nr,a.email]]),(0,r.wy)((0,r._)("p",{class:"error-message"},(0,r.zw)(a.errors.email),513),[[r.F8,a.errors.email]])]),(0,r._)("div",V,[$,(0,r.wy)((0,r._)("input",{id:"mobile","onUpdate:modelValue":t[5]||(t[5]=function(e){return a.mobile=e}),class:(0,r.C_)(["field-input",a.errors.mobile?"border-red-500":""]),type:"text",name:"mobile"},null,2),[[r.nr,a.mobile]]),(0,r.wy)((0,r._)("p",{class:"error-message"},(0,r.zw)(a.errors.mobile),513),[[r.F8,a.errors.mobile]])]),(0,r._)("div",E,[(0,r._)("button",{class:"bg-gray-500 border hover:bg-gray-700 px-8 py-3 rounded-lg text-white",onClick:t[6]||(t[6]=function(){return a.onSubmit&&a.onSubmit.apply(a,arguments)})}," Next ")])])}]]);var K={class:"gap-8 grid lg:grid-cols-2"},R=["onClick"],A=["src"],X={class:"pr-8"};var J=n(757),Q=n.n(J),G=n(669),ee=n.n(G);function te(e,t,n,r,a,o,s){try{var i=e[o](s),u=i.value}catch(e){return void n(e)}i.done?t(u):Promise.resolve(u).then(r,a)}function ne(){var e=window.document.querySelector('meta[name="session"]').content,t=window.document.querySelector('meta[name="token"]').content,n={paymentMethods:"/api/session/".concat(e,"/paymentMethods")},r={Accept:"application/json",Authorization:"Bearer "+t},a=function(){var e,t=(e=Q().mark((function e(){var t;return Q().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,ee().get(n.paymentMethods,{headers:r});case 2:return t=e.sent,e.abrupt("return",t.data);case 4:case"end":return e.stop()}}),e)})),function(){var t=this,n=arguments;return new Promise((function(r,a){var o=e.apply(t,n);function s(e){te(o,r,a,s,i,"next",e)}function i(e){te(o,r,a,s,i,"throw",e)}s(void 0)}))});return function(){return t.apply(this,arguments)}}();return{getPaymentMethods:a}}function re(e,t,n,r,a,o,s){try{var i=e[o](s),u=i.value}catch(e){return void n(e)}i.done?t(u):Promise.resolve(u).then(r,a)}const ae={name:"PaymentMethods",emits:["select-payment-method"],setup:function(e,t){return(n=Q().mark((function e(){var n,r,a,o,s;return Q().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return s=function(e){n("select-payment-method",e)},n=t.emit,r=ne(),a=r.getPaymentMethods,e.next=5,a();case 5:return o=e.sent,e.abrupt("return",{paymentMethods:o,select:s});case 7:case"end":return e.stop()}}),e)})),function(){var e=this,t=arguments;return new Promise((function(r,a){var o=n.apply(e,t);function s(e){re(o,r,a,s,i,"next",e)}function i(e){re(o,r,a,s,i,"throw",e)}s(void 0)}))})();var n}},oe=(0,d.Z)(ae,[["render",function(e,t,n,a,o,s){return(0,r.wg)(),(0,r.iD)("div",K,[((0,r.wg)(!0),(0,r.iD)(r.HY,null,(0,r.Ko)(a.paymentMethods,(function(e){return(0,r.wg)(),(0,r.iD)("div",{key:e.id,class:"bg-white cursor-pointer flex gap-5 items-center justify-between p-6 rounded-lg shadow",onClick:function(t){return a.select(e.id)}},[(0,r._)("img",{src:e.logo,alt:"logo",class:"h-16 mx-4 my-6"},null,8,A),(0,r._)("h1",X,(0,r.zw)(e.name),1)],8,R)})),128))])}]]);var se={key:0};const ie={name:"SuspenseComponent",components:{MoonLoader:n(433).Z},setup:function(){var e=(0,r.iH)(null);return(0,r.d1)((function(t){e.value=t.message})),{suspenseError:e}}};var ue={class:"grid grid-cols-2 items-baseline w-5/6"},le={key:1,href:"#",class:"col-start-2 hover:text-blue-900 justify-self-end my-8 p-2 text-gray-500 underline"};const ce={name:"Footer",setup:function(){var e=g();return{step:e.step,firstStep:e.firstStep,lastStep:e.lastStep,stepBack:e.stepBack}}},de={name:"Transaction",components:{PayerData:Y,PaymentMethods:oe,SuspenseComponent:(0,d.Z)(ie,[["render",function(e,t,n,a,o,s){var i=(0,r.up)("MoonLoader");return a.suspenseError?((0,r.wg)(),(0,r.iD)("div",se,(0,r.zw)(a.suspenseError),1)):((0,r.wg)(),(0,r.j4)(r.n4,{key:1,timeout:"0"},{default:(0,r.w5)((function(){return[(0,r.WI)(e.$slots,"default")]})),fallback:(0,r.w5)((function(){return[(0,r.Wm)(i,{color:"#1e3b8a"})]})),_:3}))}]]),Footer:(0,d.Z)(ce,[["render",function(e,t,n,a,o,s){return(0,r.wg)(),(0,r.iD)("div",ue,[a.step>a.firstStep?((0,r.wg)(),(0,r.iD)("button",{key:0,class:"bg-gray-500 hover:bg-gray-700 justify-self-start my-8 px-12 py-3 rounded-lg shadow text-white",onClick:t[0]||(t[0]=function(){return a.stepBack&&a.stepBack.apply(a,arguments)})}," Back ")):(0,r.kq)("",!0),a.step<a.lastStep?((0,r.wg)(),(0,r.iD)("a",le," Do not want to continue ")):(0,r.kq)("",!0)])}]])},setup:function(){var e=g(),t=e.step,n=e.stepForward,a=e.inStep,o=(0,r.iH)({name:"",surname:"",documentType:"",document:"",email:"",mobile:""}),s=(0,r.iH)({});return{payer:o,step:t,inStep:a,savePayerData:function(e){o.value=e,n()},selectPaymentMethod:function(e){s.value=e,n()}}}},pe=(0,d.Z)(de,[["render",function(e,t,n,a,o,s){var i=(0,r.up)("PayerData"),u=(0,r.up)("PaymentMethods"),l=(0,r.up)("SuspenseComponent"),c=(0,r.up)("Footer");return(0,r.wg)(),(0,r.iD)("div",P,[(0,r._)("div",j,[a.inStep(1)?((0,r.wg)(),(0,r.j4)(i,{key:0,payer:a.payer,class:"mt-20",onSavePayer:a.savePayerData},null,8,["payer","onSavePayer"])):(0,r.kq)("",!0),a.inStep(2)?((0,r.wg)(),(0,r.j4)(l,{key:1},{default:(0,r.w5)((function(){return[(0,r.Wm)(u,{onSelectPaymentMethod:a.selectPaymentMethod},null,8,["onSelectPaymentMethod"])]})),_:1})):(0,r.kq)("",!0)]),(0,r.Wm)(c,{class:"h-1/6"})])}]]);n(333),(0,r.ri)({components:{Countdown:p,Stepper:D,Transaction:pe}}).mount("#app")},333:(e,t,n)=>{window._=n(486),window.axios=n(669),window.axios.defaults.headers.common["X-Requested-With"]="XMLHttpRequest"},594:(e,t,n)=>{"use strict";n.d(t,{Z:()=>o});var r=n(645),a=n.n(r)()((function(e){return e[1]}));a.push([e.id,'.container[data-v-5b322381]{position:absolute;width:100%;z-index:20}.progressbar[data-v-5b322381]{display:flex;justify-content:space-evenly}.progressbar li[data-v-5b322381],.step[data-v-5b322381]{display:flex;width:100%}.step[data-v-5b322381]{align-items:center;flex-direction:column;justify-items:center;position:relative}.step-circle[data-v-5b322381]{--tw-border-opacity:1;--tw-bg-opacity:1;align-items:center;background-color:rgba(255,255,255,var(--tw-bg-opacity));border-color:rgba(209,213,219,var(--tw-border-opacity));border-radius:9999px;border-width:4px;display:flex;height:2.5rem;justify-content:center;transition:border-color .5s ease-in-out .1s;width:2.5rem}.active .step-circle[data-v-5b322381]{--tw-border-opacity:1;border-color:rgba(30,58,138,var(--tw-border-opacity))}.active.step[data-v-5b322381]:before{--tw-bg-opacity:1;background-color:rgba(30,58,138,var(--tw-bg-opacity))}.step[data-v-5b322381]:before{--tw-bg-opacity:1;background-color:rgba(209,213,219,var(--tw-bg-opacity));content:"";height:.25rem;position:absolute;top:1.25rem;transition:background .5s ease-in-out;width:100%;z-index:-1}.step-group:first-child .step[data-v-5b322381]:before{align-self:flex-end;width:50%}.step-group:last-child .step[data-v-5b322381]:before{align-self:flex-start;width:50%}',""]);const o=a},584:()=>{}},e=>{var t=t=>e(e.s=t);e.O(0,[170,898],(()=>(t(778),t(584))));e.O()}]);