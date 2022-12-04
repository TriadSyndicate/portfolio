import u from"./EditExperience.ba4e6e75.js";import{_ as m}from"./_plugin-vue_export-helper.cdc0426e.js";import{c as n,b as e,F as h,q as _,o as l,t as a,a as p,s as g}from"./app.61ee4008.js";const x={props:{experiences:{type:Array,required:!0}},components:{EditExperience:u},methods:{deleteExperience(t){const o=this.$swal.mixin({customClass:{confirmButton:"bg-green-500 text-white px-2 py-1 rounded-md m-2",cancelButton:"bg-red-500 text-white px-2 py-1 rounded-md m-2"},buttonsStyling:!1});o.fire({title:"Are you sure?",text:"You won't be able to revert this!",icon:"warning",showCancelButton:!0,confirmButtonText:"Yes, delete it!",cancelButtonText:"No, cancel!",reverseButtons:!0}).then(r=>{r.isConfirmed?axios.delete(route("experience.destroy",t.id)).then(d=>{d.data.message&&o.fire("Deleted!",`Your work experience as ${d.data.message.title} at ${d.data.message.company} has been deleted.`,"success").then(()=>{this.$inertia.reload()})}):r.dismiss===this.$swal.DismissReason.cancel&&o.fire("Cancelled",`Your work experience as ${t.title} at ${t.company} is safe :)`,"error")})},toggleModal(t){document.getElementById(t).classList.toggle("hidden"),document.getElementById(t+"-backdrop").classList.toggle("hidden"),document.getElementById(t).classList.toggle("flex"),document.getElementById(t+"-backdrop").classList.toggle("flex")}}},f={class:"flex flex-col p-10 text-center justify-center"},y=e("h3",{class:"tracking-[15px] font-serif"},"Experiences",-1),E={class:"border-collapse border border-slate-500 border-spacing-2"},w=e("thead",null,[e("tr",null,[e("th",{class:"border border-slate-600"},"Title"),e("th",{class:"border border-slate-600"},"Company"),e("th",{class:"border border-slate-600"},"Start Date"),e("th",{class:"border border-slate-600"},"End Date"),e("th",{class:"border border-slate-600"},"Actions")])],-1),B={class:"border border-slate-700"},k={class:"border border-slate-700"},C={class:"border border-slate-700"},$={class:"border border-slate-700"},v={class:"border border-slate-700"},L=["onClick"],T=["onClick"];function Y(t,o,r,d,A,c){const i=g("EditExperience");return l(),n("div",f,[y,e("table",E,[w,e("tbody",null,[(l(!0),n(h,null,_(r.experiences,s=>(l(),n("tr",{key:s.id},[e("td",B,a(s.title),1),e("td",k,a(s.company),1),e("td",C,a(s.start_date),1),e("td",$,a(s.end_date),1),e("td",v,[e("button",{onClick:b=>c.deleteExperience(s),class:"bg-red-500 text-white px-2 py-1 rounded-md"}," Delete ",8,L),e("button",{onClick:b=>c.toggleModal("modal-id"+s.id),class:"bg-teal-500 text-white rounded-md px-2 py-1"}," View ",8,T)]),p(i,{experience:s},null,8,["experience"])]))),128))])])])}const V=m(x,[["render",Y]]);export{V as default};