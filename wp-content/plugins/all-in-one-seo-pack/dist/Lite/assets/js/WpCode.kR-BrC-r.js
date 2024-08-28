import{v as y,x as P,y as b}from"./links.Ce9S4kjc.js";import{C as $}from"./Index.Dq9-2wXY.js";import{C as k}from"./Caret.BthVBOwE.js";import{G as U,a as x}from"./Row.DRnp1mVs.js";import{_ as A}from"./_plugin-vue_export-helper.BN1snXvA.js";import{v as l,c as _,a as n,B as L,l as i,G as W,k as d,b as g,o as a,F as O,J as I,t as o,C as p}from"./runtime-dom.esm-bundler.tPRhSV4q.js";import"./default-i18n.DXRQgkn2.js";import"./helpers.CXsRrhc8.js";import"./constants.CPpKID74.js";const B={setup(){return{pluginsStore:y(),wpCodeStore:P()}},components:{Cta:$,CoreAlert:k,GridColumn:U,GridRow:x},data(){return{loadingUseSnippet:null,failed:!1,activationLoading:!1,strings:{codesnippets:this.$t.__("Code Snippets",this.$td),installSnippet:this.$t.__("Use Snippet",this.$td),editSnippet:this.$t.__("Edit Snippet",this.$td),ctaDescription:this.$t.__("Using WPCode you can install AIOSEO code snippets with 1-click directly from this page or the WPCode library inside the WordPress admin.",this.$td),ctaLearnMoreText:this.$t.__("Learn More about WPCode Snippets",this.$td),noSnippets:this.$t.__("We encountered an error loading the code snippets, please try again later.",this.$td),activateError:this.$t.__("An error occurred while activating the addon. Please upload it manually or contact support for more information.",this.$td),permissionWarning:this.$t.__("You currently don't have permission to activate this addon. Please ask a site administrator to activate first.",this.$td)}}},computed:{showSnippets(){return this.wpCodeStore.pluginInstalled&&this.wpCodeStore.pluginActive&&!this.wpCodeStore.pluginNeedsUpdate},blurClass(){return this.showSnippets?"":"aioseo-blur"},ctaTitle(){if(this.wpCodeStore.pluginNeedsUpdate)return this.$t.__("Please Update WPCode to load the AIOSEO Snippet Library",this.$td);if(this.wpCodeStore.pluginInstalled){if(!this.wpCodeStore.pluginActive)return this.$t.__("Please Activate WPCode to load the AIOSEO Snippet Library",this.$td)}else return this.$t.__("Please Install WPCode to load the AIOSEO Snippet Library",this.$td);return this.$t.__("Please Install WPCode to load the AIOSEO Snippet Library",this.$td)},ctaButtonText(){if(this.wpCodeStore.pluginNeedsUpdate)return this.$t.__("Update WPCode",this.$td);if(this.wpCodeStore.pluginInstalled){if(!this.wpCodeStore.pluginActive)return this.$t.__("Activate WPCode",this.$td)}else return this.$t.__("Install WPCode",this.$td);return this.$t.__("Install WPCode",this.$td)}},methods:{decode:b.decode,processUpdateOrActivate(){this.activateOrUpdate(this.wpCodeStore.pluginNeedsUpdate)},activateOrUpdate(c=!1){this.failed=!1,this.activationLoading=!0;const u=c?"upgradePlugins":"installPlugins",r=this.pluginsStore.plugins.wpcodePro.installed?"wpcodePro":"wpcode";this.pluginsStore[u]([{plugin:r,type:"plugin"}]).then(t=>{if(t.body.failed.length){this.activationLoading=!1,this.failed=!0;return}const e=[this.wpCodeStore.loadSnippets()];Promise.all(e).then(()=>{this.activationLoading=!1})}).catch(t=>{this.activationLoading=!1,this.failed=!0,console.error(`Unable to install ${r}: ${t}`)})}}},E={class:"aioseo-tools-wpcode"},N={class:"aioseo-wpcode-snippet"},T={class:"wpcode-snippet-body"},D={class:"snippet-title"},G={class:"snippet-description"},V={class:"wpcode-snippet-footer"};function z(c,u,m,r,t,e){const h=l("base-button"),f=l("grid-column"),S=l("grid-row"),C=l("cta"),w=l("core-alert");return a(),_("div",E,[n("div",{class:W(e.blurClass)},[L(S,null,{default:i(()=>[(a(!0),_(O,null,I(r.wpCodeStore.snippets,(s,v)=>(a(),d(f,{key:v,sm:"12",md:"6",lg:"4"},{default:i(()=>[n("div",N,[n("div",T,[n("div",D,o(s.title),1),n("div",G,o(s.note),1)]),n("div",V,[s.install?(a(),d(h,{key:0,type:"blue",size:"medium",tag:"a",href:e.decode(s.install),onClick:M=>t.loadingUseSnippet=s.install,loading:s.install===t.loadingUseSnippet},{default:i(()=>[p(o(s.installed?t.strings.editSnippet:t.strings.installSnippet),1)]),_:2},1032,["href","onClick","loading"])):(a(),d(h,{key:1,type:"gray",size:"medium",disabled:""},{default:i(()=>[p(o(t.strings.installSnippet),1)]),_:1}))])])]),_:2},1024))),128))]),_:1})],2),!e.showSnippets&&r.wpCodeStore.snippets.length?(a(),d(C,{key:0,"button-text":e.ctaButtonText,"learn-more-link":c.$links.getDocUrl("wpcode"),"cta-button-loading":t.activationLoading,onCtaButtonClick:e.processUpdateOrActivate,"same-tab":"","align-top":"","cta-button-action":"","hide-bonus":""},{"header-text":i(()=>[p(o(e.ctaTitle),1)]),description:i(()=>[p(o(t.strings.ctaDescription),1)]),"learn-more-text":i(()=>[p(o(t.strings.ctaLearnMoreText),1)]),_:1},8,["button-text","learn-more-link","cta-button-loading","onCtaButtonClick"])):g("",!0),e.showSnippets&&r.wpCodeStore.snippets.length===0?(a(),d(w,{key:1,type:"yellow"},{default:i(()=>[n("div",null,o(t.strings.noSnippets),1)]),_:1})):g("",!0)])}const X=A(B,[["render",z]]);export{X as default};
