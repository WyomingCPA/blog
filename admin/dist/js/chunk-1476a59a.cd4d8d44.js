(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-1476a59a"],{"1dde":function(t,e,n){var o=n("d039"),i=n("b622"),r=n("60ae"),a=i("species");t.exports=function(t){return r>=51||!o((function(){var e=[],n=e.constructor={};return n[a]=function(){return{foo:1}},1!==e[t](Boolean).foo}))}},"3b4f":function(t,e,n){"use strict";n.r(e);var o=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("section",{staticClass:"forms"},[t._m(0),n("div",{staticClass:"row"},[n("div",{staticClass:"col-md-10 d-flex align-items-stretch grid-margin"},[n("div",{staticClass:"row flex-grow"},[n("div",{staticClass:"col-12 grid-margin"},[n("div",{staticClass:"card"},[n("div",{staticClass:"card-body"},[n("h4",{staticClass:"card-title"},[t._v("Создание поста")]),n("p",{staticClass:"card-description"},[t._v("Заголовок поста")]),n("form",{staticClass:"forms-sample",on:{submit:function(e){return e.preventDefault(),t.create(e)}}},[n("b-form-group",{attrs:{horizontal:"",label:"Category","label-for":"cat"}},[n("b-form-select",{attrs:{options:t.optionsCategory,id:"cat",placeholder:"Select Category"},model:{value:t.selectedCategory,callback:function(e){t.selectedCategory=e},expression:"selectedCategory"}})],1),n("b-form-group",{attrs:{horizontal:"",label:"Статус","label-for":"status"}},[n("b-form-select",{attrs:{options:t.optionsStatus,id:"status",placeholder:"Select Status"},model:{value:t.selectedStatus,callback:function(e){t.selectedStatus=e},expression:"selectedStatus"}})],1),n("b-form-group",{attrs:{label:"Заголовок","label-for":"title"}},[n("b-form-input",{attrs:{type:"text",id:"title",placeholder:"Заголовок"},model:{value:t.title,callback:function(e){t.title=e},expression:"title"}})],1),n("b-form-group",{attrs:{label:"Slug","label-for":"slug"}},[n("b-form-input",{attrs:{type:"text",id:"slug",placeholder:"Slug"},model:{value:t.slug,callback:function(e){t.slug=e},expression:"slug"}})],1),n("b-form-group",{attrs:{label:"Краткое содержание","label-for":"Resume"}},[n("b-form-textarea",{attrs:{id:"resume",placeholder:"Краткое содержание",rows:3,"max-rows":6},model:{value:t.preview,callback:function(e){t.preview=e},expression:"preview"}})],1),n("b-form-group",[n("editor",{attrs:{id:"content","api-key":"no-api-key",value:"",init:{height:700,menubar:!0,plugins:["advlist autolink lists link image charmap print preview anchor","searchreplace visualblocks code fullscreen","insertdatetime media table paste code help wordcount","codesample toc autosave"],toolbar:"undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image                         formatselect | bold italic backcolor |          alignleft aligncenter alignright alignjustify |          bullist numlist outdent indent | removeformat | help"}},model:{value:t.content,callback:function(e){t.content=e},expression:"content"}})],1),n("div",{staticClass:"d-flex"},[n("b-button",{staticClass:"mr-2",attrs:{type:"submit",variant:"success"}},[t._v("Создать")]),n("b-button",{attrs:{variant:"dark"}},[t._v("Cancel")])],1)],1)])])])])])])])},i=[function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"page-header"},[n("h3",{staticClass:"page-title"},[t._v("Редактирование записи")])])}],r=(n("d81d"),n("d3b7"),n("96cf"),n("bc3a")),a=n.n(r),s=n("ca72"),l={components:{editor:s["a"]},name:"createForm",data:function(){return{title:"",content:"",slug:"",preview:"",selectedCategory:null,selectedStatus:null,optionsCategory:[],category:[],optionsStatus:[{value:"public",text:"public"},{value:"draft",text:"draft"}],file:null}},methods:{getPostData:function(){var t=this;a.a.get("/api/posts/create").then((function(e){t.category=e.data.categorys,t.optionsCategory=t.category.map((function(t){return{value:t.id,text:t.title}}))})).catch((function(t){console.error(t)}))},create:function(){var t,e=this;return regeneratorRuntime.async((function(n){while(1)switch(n.prev=n.next){case 0:t=this,a.a.get("/sanctum/csrf-cookie").then((function(n){a.a.post("/api/posts/store",{post_id:e.$route.params.id,title:t.title,text:t.content,slug:t.slug,preview:t.preview,category_id:t.selectedCategory,status:t.selectedStatus}).then((function(t){t.status?(console.log("Вызвали алерт"),e.$router.push({path:"/posts/list"})):(console.log("Не работает"),console.log(t.status))})).catch((function(t){console.log(n),console.error(t)}))}));case 2:case"end":return n.stop()}}),null,this)}},mounted:function(){this.getPostData()}},c=l,u=n("2877"),d=Object(u["a"])(c,o,i,!1,null,null,null);e["default"]=d.exports},c4a9:function(t,e,n){"use strict";(function(t){n.d(e,"a",(function(){return i}));var o=function(){return"undefined"!==typeof window?window:t},i=function(){var t=o();return t&&t.tinymce?t.tinymce:null}}).call(this,n("c8ba"))},ca72:function(t,e,n){"use strict";var o=["onActivate","onAddUndo","onBeforeAddUndo","onBeforeExecCommand","onBeforeGetContent","onBeforeRenderUI","onBeforeSetContent","onBeforePaste","onBlur","onChange","onClearUndos","onClick","onContextMenu","onCopy","onCut","onDblclick","onDeactivate","onDirty","onDrag","onDragDrop","onDragEnd","onDragGesture","onDragOver","onDrop","onExecCommand","onFocus","onFocusIn","onFocusOut","onGetContent","onHide","onInit","onKeyDown","onKeyPress","onKeyUp","onLoadContent","onMouseDown","onMouseEnter","onMouseLeave","onMouseMove","onMouseOut","onMouseOver","onMouseUp","onNodeChange","onObjectResizeStart","onObjectResized","onObjectSelected","onPaste","onPostProcess","onPostRender","onPreProcess","onProgressState","onRedo","onRemove","onReset","onSaveContent","onSelectionChange","onSetAttrib","onSetContent","onShow","onSubmit","onUndo","onVisualAid"],i=function(t){return-1!==o.map((function(t){return t.toLowerCase()})).indexOf(t.toLowerCase())},r=function(t,e,n){Object.keys(e).filter(i).forEach((function(o){var i=e[o];"function"===typeof i&&("onInit"===o?i(t,n):n.on(o.substring(2),(function(t){return i(t,n)})))}))},a=function(t,e){var n=t.$props.modelEvents?t.$props.modelEvents:null,o=Array.isArray(n)?n.join(" "):n;e.on(o||"change input undo redo",(function(){t.$emit("input",e.getContent({format:t.$props.outputFormat}))}))},s=function(t,e,n){var o=e.$props.value?e.$props.value:"",i=e.$props.initialValue?e.$props.initialValue:"";n.setContent(o||(e.initialized?e.cache:i)),e.$watch("value",(function(t,o){n&&"string"===typeof t&&t!==o&&t!==n.getContent({format:e.$props.outputFormat})&&n.setContent(t)})),e.$listeners.input&&a(e,n),r(t,e.$listeners,n),e.initialized=!0},l=0,c=function(t){var e=Date.now(),n=Math.floor(1e9*Math.random());return l++,t+"_"+n+l+String(e)},u=function(t){return null!==t&&"textarea"===t.tagName.toLowerCase()},d=function(t){return"undefined"===typeof t||""===t?[]:Array.isArray(t)?t:t.split(" ")},p=function(t,e){return d(t).concat(d(e))},f=function(t){return null===t||void 0===t},m=function(){return{listeners:[],scriptId:c("tiny-script"),scriptLoaded:!1}},g=function(){var t=m(),e=function(t,e,n,o){var i=e.createElement("script");i.referrerPolicy="origin",i.type="application/javascript",i.id=t,i.src=n;var r=function(){i.removeEventListener("load",r),o()};i.addEventListener("load",r),e.head&&e.head.appendChild(i)},n=function(n,o,i){t.scriptLoaded?i():(t.listeners.push(i),n.getElementById(t.scriptId)||e(t.scriptId,n,o,(function(){t.listeners.forEach((function(t){return t()})),t.scriptLoaded=!0})))},o=function(){t=m()};return{load:n,reinitialize:o}},h=g(),v=n("c4a9"),b={apiKey:String,cloudChannel:String,id:String,init:Object,initialValue:String,inline:Boolean,modelEvents:[String,Array],plugins:[String,Array],tagName:String,toolbar:[String,Array],value:String,disabled:Boolean,tinymceScriptSrc:String,outputFormat:{type:String,validator:function(t){return"html"===t||"text"===t}}},y=function(){return y=Object.assign||function(t){for(var e,n=1,o=arguments.length;n<o;n++)for(var i in e=arguments[n],e)Object.prototype.hasOwnProperty.call(e,i)&&(t[i]=e[i]);return t},y.apply(this,arguments)},C=function(t,e,n){return t(n||"div",{attrs:{id:e}})},S=function(t,e){return t("textarea",{attrs:{id:e},style:{visibility:"hidden"}})},$=function(t){return function(){var e=y(y({},t.$props.init),{readonly:t.$props.disabled,selector:"#"+t.elementId,plugins:p(t.$props.init&&t.$props.init.plugins,t.$props.plugins),toolbar:t.$props.toolbar||t.$props.init&&t.$props.init.toolbar,inline:t.inlineEditor,setup:function(e){t.editor=e,e.on("init",(function(n){return s(n,t,e)})),t.$props.init&&"function"===typeof t.$props.init.setup&&t.$props.init.setup(e)}});u(t.element)&&(t.element.style.visibility="",t.element.style.display=""),Object(v["a"])().init(e)}},w={props:b,created:function(){this.elementId=this.$props.id||c("tiny-vue"),this.inlineEditor=this.$props.init&&this.$props.init.inline||this.$props.inline,this.initialized=!1},watch:{disabled:function(){this.editor.setMode(this.disabled?"readonly":"design")}},mounted:function(){if(this.element=this.$el,null!==Object(v["a"])())$(this)();else if(this.element&&this.element.ownerDocument){var t=this.$props.cloudChannel?this.$props.cloudChannel:"5",e=this.$props.apiKey?this.$props.apiKey:"no-api-key",n=f(this.$props.tinymceScriptSrc)?"https://cdn.tiny.cloud/1/"+e+"/tinymce/"+t+"/tinymce.min.js":this.$props.tinymceScriptSrc;h.load(this.element.ownerDocument,n,$(this))}},beforeDestroy:function(){null!==Object(v["a"])()&&Object(v["a"])().remove(this.editor)},deactivated:function(){var t;this.inlineEditor||(this.cache=this.editor.getContent(),null===(t=Object(v["a"])())||void 0===t||t.remove(this.editor))},activated:function(){!this.inlineEditor&&this.initialized&&$(this)()},render:function(t){return this.inlineEditor?C(t,this.elementId,this.$props.tagName):S(t,this.elementId)}};e["a"]=w},d81d:function(t,e,n){"use strict";var o=n("23e7"),i=n("b727").map,r=n("d039"),a=n("1dde"),s=a("map"),l=s&&!r((function(){[].map.call({length:-1,0:1},(function(t){throw t}))}));o({target:"Array",proto:!0,forced:!s||!l},{map:function(t){return i(this,t,arguments.length>1?arguments[1]:void 0)}})}}]);
//# sourceMappingURL=chunk-1476a59a.cd4d8d44.js.map