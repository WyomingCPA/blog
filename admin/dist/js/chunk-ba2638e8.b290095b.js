(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-ba2638e8"],{"057f":function(t,n,e){var o=e("fc6a"),i=e("241c").f,r={}.toString,a="object"==typeof window&&window&&Object.getOwnPropertyNames?Object.getOwnPropertyNames(window):[],s=function(t){try{return i(t)}catch(n){return a.slice()}};t.exports.f=function(t){return a&&"[object Window]"==r.call(t)?s(t):i(o(t))}},"1ca8":function(t,n,e){"use strict";e.r(n);var o=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("section",{staticClass:"forms"},[t._m(0),e("div",{staticClass:"row"},[e("div",{staticClass:"col-md-10 d-flex align-items-stretch grid-margin"},[e("div",{staticClass:"row flex-grow"},[e("div",{staticClass:"col-12 grid-margin"},[e("div",{staticClass:"card"},[e("div",{staticClass:"card-body"},[e("h4",{staticClass:"card-title"},[t._v("Редактирования источника")]),e("p",{staticClass:"card-description"},[t._v("Заголовок источника")]),e("form",{staticClass:"forms-sample",on:{submit:function(n){return n.preventDefault(),t.update(n)}}},[e("b-form-group",{attrs:{label:"Название","label-for":"name"}},[e("b-form-input",{attrs:{type:"text",id:"name",placeholder:"Название"},model:{value:t.name,callback:function(n){t.name=n},expression:"name"}})],1),e("b-form-group",{attrs:{label:"Source","label-for":"source"}},[e("b-form-input",{attrs:{type:"text",id:"source",placeholder:"Source"},model:{value:t.source,callback:function(n){t.source=n},expression:"source"}})],1),e("b-form-group",[e("editor",{attrs:{id:"description","api-key":"no-api-key",value:"",init:{height:700,menubar:!0,plugins:["advlist autolink lists link image charmap print preview anchor","searchreplace visualblocks code fullscreen","insertdatetime media table paste code help wordcount","codesample toc autosave"],toolbar:"undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image                         formatselect | bold italic backcolor |          alignleft aligncenter alignright alignjustify |          bullist numlist outdent indent | removeformat | help"}},model:{value:t.description,callback:function(n){t.description=n},expression:"description"}})],1),e("div",{staticClass:"d-flex"},[e("b-button",{staticClass:"mr-2",attrs:{type:"submit",variant:"success"}},[e("span",{directives:[{name:"show",rawName:"v-show",value:!t.loading,expression:"!loading"}]},[t._v(" Обновить ")]),e("div",{directives:[{name:"show",rawName:"v-show",value:t.loading,expression:"loading"}],staticClass:"spinner-border spinner-border-sm",attrs:{role:"status"}},[e("span",{staticClass:"sr-only"},[t._v("Loading...")])])]),e("b-button",{attrs:{variant:"dark"}},[t._v("Cancel")])],1)],1)])])])])])])])},i=[function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{staticClass:"page-header"},[e("h3",{staticClass:"page-title"},[t._v("Редактирование источника")])])}],r=(e("a4d3"),e("e01a"),e("b0c0"),e("d3b7"),e("96cf"),e("bc3a")),a=e.n(r),s=e("ca72"),c={components:{editor:s["a"]},name:"editForm",data:function(){return{name:"",source:"",description:"",loading:!1}},methods:{getSourceData:function(){var t=this;a.a.get("/api/sources/edit/"+this.$route.params.id).then((function(n){t.name=n.data.source.name,t.source=n.data.source.source,t.description=n.data.source.description})).catch((function(t){console.error(t)}))},update:function(){var t,n=this;return regeneratorRuntime.async((function(e){while(1)switch(e.prev=e.next){case 0:t=this,this.loading=!0,a.a.get("/sanctum/csrf-cookie").then((function(e){a.a.post("/api/sources/update",{source_id:n.$route.params.id,name:t.name,source:t.source,description:t.description}).then((function(n){n.status?(console.log("Вызвали алерт"),t.loading=!1):(console.log("Не работает"),console.log(n.status),t.loading=!1)})).catch((function(t){console.log(e),console.error(t)}))}));case 3:case"end":return e.stop()}}),null,this)}},mounted:function(){this.getSourceData()}},u=c,l=e("2877"),d=Object(l["a"])(u,o,i,!1,null,null,null);n["default"]=d.exports},"746f":function(t,n,e){var o=e("428f"),i=e("5135"),r=e("c032"),a=e("9bf2").f;t.exports=function(t){var n=o.Symbol||(o.Symbol={});i(n,t)||a(n,t,{value:r.f(t)})}},a4d3:function(t,n,e){"use strict";var o=e("23e7"),i=e("da84"),r=e("d066"),a=e("c430"),s=e("83ab"),c=e("4930"),u=e("fdbf"),l=e("d039"),d=e("5135"),f=e("e8b5"),p=e("861d"),m=e("825a"),h=e("7b0b"),v=e("fc6a"),g=e("c04e"),b=e("5c6c"),y=e("7c73"),S=e("df75"),w=e("241c"),C=e("057f"),$=e("7418"),O=e("06cf"),j=e("9bf2"),E=e("d1e7"),k=e("9112"),x=e("6eeb"),D=e("5692"),P=e("f772"),I=e("d012"),_=e("90e3"),A=e("b622"),M=e("c032"),L=e("746f"),N=e("d44e"),B=e("69f3"),F=e("b727").forEach,R=P("hidden"),z="Symbol",U="prototype",K=A("toPrimitive"),J=B.set,V=B.getterFor(z),G=Object[U],T=i.Symbol,H=r("JSON","stringify"),Q=O.f,W=j.f,q=C.f,X=E.f,Y=D("symbols"),Z=D("op-symbols"),tt=D("string-to-symbol-registry"),nt=D("symbol-to-string-registry"),et=D("wks"),ot=i.QObject,it=!ot||!ot[U]||!ot[U].findChild,rt=s&&l((function(){return 7!=y(W({},"a",{get:function(){return W(this,"a",{value:7}).a}})).a}))?function(t,n,e){var o=Q(G,n);o&&delete G[n],W(t,n,e),o&&t!==G&&W(G,n,o)}:W,at=function(t,n){var e=Y[t]=y(T[U]);return J(e,{type:z,tag:t,description:n}),s||(e.description=n),e},st=c&&"symbol"==typeof T.iterator?function(t){return"symbol"==typeof t}:function(t){return Object(t)instanceof T},ct=function(t,n,e){t===G&&ct(Z,n,e),m(t);var o=g(n,!0);return m(e),d(Y,o)?(e.enumerable?(d(t,R)&&t[R][o]&&(t[R][o]=!1),e=y(e,{enumerable:b(0,!1)})):(d(t,R)||W(t,R,b(1,{})),t[R][o]=!0),rt(t,o,e)):W(t,o,e)},ut=function(t,n){m(t);var e=v(n),o=S(e).concat(mt(e));return F(o,(function(n){s&&!dt.call(e,n)||ct(t,n,e[n])})),t},lt=function(t,n){return void 0===n?y(t):ut(y(t),n)},dt=function(t){var n=g(t,!0),e=X.call(this,n);return!(this===G&&d(Y,n)&&!d(Z,n))&&(!(e||!d(this,n)||!d(Y,n)||d(this,R)&&this[R][n])||e)},ft=function(t,n){var e=v(t),o=g(n,!0);if(e!==G||!d(Y,o)||d(Z,o)){var i=Q(e,o);return!i||!d(Y,o)||d(e,R)&&e[R][o]||(i.enumerable=!0),i}},pt=function(t){var n=q(v(t)),e=[];return F(n,(function(t){d(Y,t)||d(I,t)||e.push(t)})),e},mt=function(t){var n=t===G,e=q(n?Z:v(t)),o=[];return F(e,(function(t){!d(Y,t)||n&&!d(G,t)||o.push(Y[t])})),o};if(c||(T=function(){if(this instanceof T)throw TypeError("Symbol is not a constructor");var t=arguments.length&&void 0!==arguments[0]?String(arguments[0]):void 0,n=_(t),e=function(t){this===G&&e.call(Z,t),d(this,R)&&d(this[R],n)&&(this[R][n]=!1),rt(this,n,b(1,t))};return s&&it&&rt(G,n,{configurable:!0,set:e}),at(n,t)},x(T[U],"toString",(function(){return V(this).tag})),E.f=dt,j.f=ct,O.f=ft,w.f=C.f=pt,$.f=mt,s&&(W(T[U],"description",{configurable:!0,get:function(){return V(this).description}}),a||x(G,"propertyIsEnumerable",dt,{unsafe:!0}))),u||(M.f=function(t){return at(A(t),t)}),o({global:!0,wrap:!0,forced:!c,sham:!c},{Symbol:T}),F(S(et),(function(t){L(t)})),o({target:z,stat:!0,forced:!c},{for:function(t){var n=String(t);if(d(tt,n))return tt[n];var e=T(n);return tt[n]=e,nt[e]=n,e},keyFor:function(t){if(!st(t))throw TypeError(t+" is not a symbol");if(d(nt,t))return nt[t]},useSetter:function(){it=!0},useSimple:function(){it=!1}}),o({target:"Object",stat:!0,forced:!c,sham:!s},{create:lt,defineProperty:ct,defineProperties:ut,getOwnPropertyDescriptor:ft}),o({target:"Object",stat:!0,forced:!c},{getOwnPropertyNames:pt,getOwnPropertySymbols:mt}),o({target:"Object",stat:!0,forced:l((function(){$.f(1)}))},{getOwnPropertySymbols:function(t){return $.f(h(t))}}),H){var ht=!c||l((function(){var t=T();return"[null]"!=H([t])||"{}"!=H({a:t})||"{}"!=H(Object(t))}));o({target:"JSON",stat:!0,forced:ht},{stringify:function(t,n,e){var o,i=[t],r=1;while(arguments.length>r)i.push(arguments[r++]);if(o=n,(p(n)||void 0!==t)&&!st(t))return f(n)||(n=function(t,n){if("function"==typeof o&&(n=o.call(this,t,n)),!st(n))return n}),i[1]=n,H.apply(null,i)}})}T[U][K]||k(T[U],K,T[U].valueOf),N(T,z),I[R]=!0},b0c0:function(t,n,e){var o=e("83ab"),i=e("9bf2").f,r=Function.prototype,a=r.toString,s=/^\s*function ([^ (]*)/,c="name";!o||c in r||i(r,c,{configurable:!0,get:function(){try{return a.call(this).match(s)[1]}catch(t){return""}}})},c032:function(t,n,e){var o=e("b622");n.f=o},c4a9:function(t,n,e){"use strict";(function(t){e.d(n,"a",(function(){return i}));var o=function(){return"undefined"!==typeof window?window:t},i=function(){var t=o();return t&&t.tinymce?t.tinymce:null}}).call(this,e("c8ba"))},ca72:function(t,n,e){"use strict";var o=["onActivate","onAddUndo","onBeforeAddUndo","onBeforeExecCommand","onBeforeGetContent","onBeforeRenderUI","onBeforeSetContent","onBeforePaste","onBlur","onChange","onClearUndos","onClick","onContextMenu","onCopy","onCut","onDblclick","onDeactivate","onDirty","onDrag","onDragDrop","onDragEnd","onDragGesture","onDragOver","onDrop","onExecCommand","onFocus","onFocusIn","onFocusOut","onGetContent","onHide","onInit","onKeyDown","onKeyPress","onKeyUp","onLoadContent","onMouseDown","onMouseEnter","onMouseLeave","onMouseMove","onMouseOut","onMouseOver","onMouseUp","onNodeChange","onObjectResizeStart","onObjectResized","onObjectSelected","onPaste","onPostProcess","onPostRender","onPreProcess","onProgressState","onRedo","onRemove","onReset","onSaveContent","onSelectionChange","onSetAttrib","onSetContent","onShow","onSubmit","onUndo","onVisualAid"],i=function(t){return-1!==o.map((function(t){return t.toLowerCase()})).indexOf(t.toLowerCase())},r=function(t,n,e){Object.keys(n).filter(i).forEach((function(o){var i=n[o];"function"===typeof i&&("onInit"===o?i(t,e):e.on(o.substring(2),(function(t){return i(t,e)})))}))},a=function(t,n){var e=t.$props.modelEvents?t.$props.modelEvents:null,o=Array.isArray(e)?e.join(" "):e;n.on(o||"change input undo redo",(function(){t.$emit("input",n.getContent({format:t.$props.outputFormat}))}))},s=function(t,n,e){var o=n.$props.value?n.$props.value:"",i=n.$props.initialValue?n.$props.initialValue:"";e.setContent(o||(n.initialized?n.cache:i)),n.$watch("value",(function(t,o){e&&"string"===typeof t&&t!==o&&t!==e.getContent({format:n.$props.outputFormat})&&e.setContent(t)})),n.$listeners.input&&a(n,e),r(t,n.$listeners,e),n.initialized=!0},c=0,u=function(t){var n=Date.now(),e=Math.floor(1e9*Math.random());return c++,t+"_"+e+c+String(n)},l=function(t){return null!==t&&"textarea"===t.tagName.toLowerCase()},d=function(t){return"undefined"===typeof t||""===t?[]:Array.isArray(t)?t:t.split(" ")},f=function(t,n){return d(t).concat(d(n))},p=function(t){return null===t||void 0===t},m=function(){return{listeners:[],scriptId:u("tiny-script"),scriptLoaded:!1}},h=function(){var t=m(),n=function(t,n,e,o){var i=n.createElement("script");i.referrerPolicy="origin",i.type="application/javascript",i.id=t,i.src=e;var r=function(){i.removeEventListener("load",r),o()};i.addEventListener("load",r),n.head&&n.head.appendChild(i)},e=function(e,o,i){t.scriptLoaded?i():(t.listeners.push(i),e.getElementById(t.scriptId)||n(t.scriptId,e,o,(function(){t.listeners.forEach((function(t){return t()})),t.scriptLoaded=!0})))},o=function(){t=m()};return{load:e,reinitialize:o}},v=h(),g=e("c4a9"),b={apiKey:String,cloudChannel:String,id:String,init:Object,initialValue:String,inline:Boolean,modelEvents:[String,Array],plugins:[String,Array],tagName:String,toolbar:[String,Array],value:String,disabled:Boolean,tinymceScriptSrc:String,outputFormat:{type:String,validator:function(t){return"html"===t||"text"===t}}},y=function(){return y=Object.assign||function(t){for(var n,e=1,o=arguments.length;e<o;e++)for(var i in n=arguments[e],n)Object.prototype.hasOwnProperty.call(n,i)&&(t[i]=n[i]);return t},y.apply(this,arguments)},S=function(t,n,e){return t(e||"div",{attrs:{id:n}})},w=function(t,n){return t("textarea",{attrs:{id:n},style:{visibility:"hidden"}})},C=function(t){return function(){var n=y(y({},t.$props.init),{readonly:t.$props.disabled,selector:"#"+t.elementId,plugins:f(t.$props.init&&t.$props.init.plugins,t.$props.plugins),toolbar:t.$props.toolbar||t.$props.init&&t.$props.init.toolbar,inline:t.inlineEditor,setup:function(n){t.editor=n,n.on("init",(function(e){return s(e,t,n)})),t.$props.init&&"function"===typeof t.$props.init.setup&&t.$props.init.setup(n)}});l(t.element)&&(t.element.style.visibility="",t.element.style.display=""),Object(g["a"])().init(n)}},$={props:b,created:function(){this.elementId=this.$props.id||u("tiny-vue"),this.inlineEditor=this.$props.init&&this.$props.init.inline||this.$props.inline,this.initialized=!1},watch:{disabled:function(){this.editor.setMode(this.disabled?"readonly":"design")}},mounted:function(){if(this.element=this.$el,null!==Object(g["a"])())C(this)();else if(this.element&&this.element.ownerDocument){var t=this.$props.cloudChannel?this.$props.cloudChannel:"5",n=this.$props.apiKey?this.$props.apiKey:"no-api-key",e=p(this.$props.tinymceScriptSrc)?"https://cdn.tiny.cloud/1/"+n+"/tinymce/"+t+"/tinymce.min.js":this.$props.tinymceScriptSrc;v.load(this.element.ownerDocument,e,C(this))}},beforeDestroy:function(){null!==Object(g["a"])()&&Object(g["a"])().remove(this.editor)},deactivated:function(){var t;this.inlineEditor||(this.cache=this.editor.getContent(),null===(t=Object(g["a"])())||void 0===t||t.remove(this.editor))},activated:function(){!this.inlineEditor&&this.initialized&&C(this)()},render:function(t){return this.inlineEditor?S(t,this.elementId,this.$props.tagName):w(t,this.elementId)}};n["a"]=$},e01a:function(t,n,e){"use strict";var o=e("23e7"),i=e("83ab"),r=e("da84"),a=e("5135"),s=e("861d"),c=e("9bf2").f,u=e("e893"),l=r.Symbol;if(i&&"function"==typeof l&&(!("description"in l.prototype)||void 0!==l().description)){var d={},f=function(){var t=arguments.length<1||void 0===arguments[0]?void 0:String(arguments[0]),n=this instanceof f?new l(t):void 0===t?l():l(t);return""===t&&(d[n]=!0),n};u(f,l);var p=f.prototype=l.prototype;p.constructor=f;var m=p.toString,h="Symbol(test)"==String(l("test")),v=/^Symbol\((.*)\)[^)]+$/;c(p,"description",{configurable:!0,get:function(){var t=s(this)?this.valueOf():this,n=m.call(t);if(a(d,t))return"";var e=h?n.slice(7,-1):n.replace(v,"$1");return""===e?void 0:e}}),o({global:!0,forced:!0},{Symbol:f})}}}]);
//# sourceMappingURL=chunk-ba2638e8.b290095b.js.map