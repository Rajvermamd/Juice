(()=>{"use strict";var e={n:n=>{var t=n&&n.__esModule?()=>n.default:()=>n;return e.d(t,{a:t}),t},d:(n,t)=>{for(var r in t)e.o(t,r)&&!e.o(n,r)&&Object.defineProperty(n,r,{enumerable:!0,get:t[r]})},o:(e,n)=>Object.prototype.hasOwnProperty.call(e,n),r:e=>{"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})}},n={};e.r(n);var t="https://js.stripe.com/v3",r=/^https:\/\/js\.stripe\.com\/v3\/?(\?.*)?$/,o="loadStripe.setLoadParameters was called but an existing Stripe.js script already exists in the document; existing script parameters will be used",i=null,a=Promise.resolve().then((function(){return e=null,null!==i||(i=new Promise((function(n,i){if("undefined"!=typeof window&&"undefined"!=typeof document)if(window.Stripe&&e&&console.warn(o),window.Stripe)n(window.Stripe);else try{var a=function(){for(var e=document.querySelectorAll('script[src^="'.concat(t,'"]')),n=0;n<e.length;n++){var o=e[n];if(r.test(o.src))return o}return null}();a&&e?console.warn(o):a||(a=function(e){var n=e&&!e.advancedFraudSignals?"?advancedFraudSignals=false":"",r=document.createElement("script");r.src="".concat(t).concat(n);var o=document.head||document.body;if(!o)throw new Error("Expected document.body not to be null. Stripe.js requires a <body> element.");return o.appendChild(r),r}(e)),a.addEventListener("load",(function(){window.Stripe?n(window.Stripe):i(new Error("Stripe.js not available"))})),a.addEventListener("error",(function(){i(new Error("Failed to load Stripe.js"))}))}catch(e){return void i(e)}else n(null)}))),i;var e})),c=!1;a.catch((function(e){c||console.warn(e)}));const u=window.jQuery;var l,s=e.n(u),d={},p=function(e,n){m("bucket",n)},f=function(e){var n=e.newURL.match(/response=(.*)/);if(n){var t,r=JSON.parse(window.atob(decodeURIComponent(n[1])));null===(t=v("bucket"))||void 0===t||null===(t=t.swal)||void 0===t||t.hide(),m("paymentIntent",r.payment_intent),history.pushState({},"",window.location.pathname+window.location.search),l.confirmCardPayment(r.client_secret).then((function(e){e.error?h():(m("paymentComplete",!0),v("bucket").sendBucket())})).catch((function(e){console.log(e)}))}},w=function(e){return e._payment_intent=v("paymentIntent"),e},v=function(e){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null;return d.hasOwnProperty(e)||(d[e]=n),d[e]},m=function(e,n){d[e]=n},h=function(){v("bucket").inOfferTransaction=!1,v("bucket").EnableButtonState(),v("bucket").HasEventRunning=!1};s()(document).on("wfocuBucketCreated",(function(e,n){var t;d=null===(t=window)||void 0===t||null===(t=t.wfocu_vars)||void 0===t?void 0:t.stripeData,m("bucket",n),s()(document).on("wfocu_external",p),window.addEventListener("hashchange",f),wfocuCommons.addFilter("wfocu_front_charge_data",w),function(){for(var e=arguments.length,n=new Array(e),t=0;t<e;t++)n[t]=arguments[t];c=!0;var r=Date.now();return a.then((function(e){return function(e,n,t){if(null===e)return null;var r=e.apply(void 0,n);return function(e,n){e&&e._registerWrapper&&e._registerWrapper({name:"stripe-js",version:"1.54.2",startTime:n})}(r,t),r}(e,n,r)}))}(v("publishableKey"),v("account")?{stripeAccount:v("account")}:{}).then((function(e){l=e})).catch((function(e){console.log(e)}))})),(this.wc_stripe=this.wc_stripe||{})["wc-stripe-woofunnels-upsell"]=n})();
//# sourceMappingURL=wc-stripe-woofunnels-upsell.js.map