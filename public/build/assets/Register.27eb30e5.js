import{x as f,i as c,w as n,o as _,a,u as e,H as w,b as r,j as d,L as g,n as V,p as b}from"./app.5574c2a7.js";import{_ as v}from"./GuestLayout.27a1e3ae.js";import{_ as t,a as m,b as i}from"./TextInput.5cecd045.js";import{_ as x}from"./PrimaryButton.50d2df0b.js";import"./ApplicationLogo.a5e06e2f.js";import"./_plugin-vue_export-helper.cdc0426e.js";const y=["onSubmit"],k={class:"mt-4"},$={class:"mt-4"},h={class:"mt-4"},q={class:"flex items-center justify-end mt-4"},H={__name:"Register",setup(N){const s=f({name:"",email:"",password:"",password_confirmation:"",terms:!1}),u=()=>{s.post(route("register"),{onFinish:()=>s.reset("password","password_confirmation")})};return(p,o)=>(_(),c(v,null,{default:n(()=>[a(e(w),{title:"Register"}),r("form",{onSubmit:b(u,["prevent"])},[r("div",null,[a(t,{for:"name",value:"Name"}),a(m,{id:"name",type:"text",class:"mt-1 block w-full",modelValue:e(s).name,"onUpdate:modelValue":o[0]||(o[0]=l=>e(s).name=l),required:"",autofocus:"",autocomplete:"name"},null,8,["modelValue"]),a(i,{class:"mt-2",message:e(s).errors.name},null,8,["message"])]),r("div",k,[a(t,{for:"email",value:"Email"}),a(m,{id:"email",type:"email",class:"mt-1 block w-full",modelValue:e(s).email,"onUpdate:modelValue":o[1]||(o[1]=l=>e(s).email=l),required:"",autocomplete:"username"},null,8,["modelValue"]),a(i,{class:"mt-2",message:e(s).errors.email},null,8,["message"])]),r("div",$,[a(t,{for:"password",value:"Password"}),a(m,{id:"password",type:"password",class:"mt-1 block w-full",modelValue:e(s).password,"onUpdate:modelValue":o[2]||(o[2]=l=>e(s).password=l),required:"",autocomplete:"new-password"},null,8,["modelValue"]),a(i,{class:"mt-2",message:e(s).errors.password},null,8,["message"])]),r("div",h,[a(t,{for:"password_confirmation",value:"Confirm Password"}),a(m,{id:"password_confirmation",type:"password",class:"mt-1 block w-full",modelValue:e(s).password_confirmation,"onUpdate:modelValue":o[3]||(o[3]=l=>e(s).password_confirmation=l),required:"",autocomplete:"new-password"},null,8,["modelValue"]),a(i,{class:"mt-2",message:e(s).errors.password_confirmation},null,8,["message"])]),r("div",q,[a(e(g),{href:p.route("login"),class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},{default:n(()=>[d(" Already registered? ")]),_:1},8,["href"]),a(x,{class:V(["ml-4",{"opacity-25":e(s).processing}]),disabled:e(s).processing},{default:n(()=>[d(" Register ")]),_:1},8,["class","disabled"])])],40,y)]),_:1}))}};export{H as default};
