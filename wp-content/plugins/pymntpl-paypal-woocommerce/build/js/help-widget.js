(()=>{"use strict";var e={n:t=>{var n=t&&t.__esModule?()=>t.default:()=>t;return e.d(n,{a:n}),n},d:(t,n)=>{for(var o in n)e.o(n,o)&&!e.o(t,o)&&Object.defineProperty(t,o,{enumerable:!0,get:n[o]})},o:(e,t)=>Object.prototype.hasOwnProperty.call(e,t),r:e=>{"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})}},t={};e.r(t);const n=window.jQuery;var o=e.n(n);window.zESettings={webWidget:{color:{theme:"#00457C"},position:{horizontal:"right",vertical:"bottom"},zIndex:9999999999,launcher:{label:{"en-US":"Contact Us"}},contactForm:{title:{"en-US":"Contact Payment Plugins"},fields:[{id:"360024242873",prefill:{"*":"PayPal WooCommerce"}}]},helpCenter:{suppress:!0}}},window.zEmbed||function(e,t){var n,o,i,a,r=[],d=document.createElement("iframe");window.zEmbed=function(){r.push(arguments)},window.zE=window.zE||window.zEmbed,d.src="javascript:false",d.title="",d.role="presentation",(d.frameElement||d).style.cssText="display: none",(i=(i=document.getElementsByTagName("script"))[i.length-1]).parentNode.insertBefore(d,i),a=d.contentWindow.document;try{o=a}catch(e){n=document.domain,d.src='javascript:var d=document.open();d.domain="'+n+'";void(0);',o=a}o.open()._l=function(){var e=this.createElement("script");n&&(this.domain=n),e.id="js-iframe-async",e.src="https://assets.zendesk.com/embeddable_framework/main.js",this.t=+new Date,this.zendeskHost="paymentplugins.zendesk.com",this.zEQueue=r,this.body.appendChild(e)},o.write('<body onload="document._l();">'),o.close()}(),o()((function(){zE((function(){zE.hide()})),zE("webWidget","prefill",{name:{value:wcPPCPSupportParams.name},email:{value:wcPPCPSupportParams.email}}),o()(document.body).on("click","#paypalSupportButton",(function(e){e.preventDefault(),zE("webWidget","updateSettings",{webWidget:{offset:{horizontal:o()(".wc-ppcp-support__page").outerWidth()/2-187+"px"}}}),zE((function(){zE.activate()}))}))})),(this.wcPPCP=this.wcPPCP||{})["help-widget"]=t})();
//# sourceMappingURL=help-widget.js.map