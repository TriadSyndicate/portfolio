import{_ as a}from"./AuthenticatedLayout.3b951984.js";import{c as r,a as e,u as i,w as t,F as l,o as m,H as c,b as s,t as n}from"./app.8c20fed2.js";import d from"./ExperienceForm.46aad391.js";import p from"./ProjectForm.60a1dcf9.js";import x from"./SkillForm.f3b4642f.js";import h from"./MessagesTable.1623815a.js";import u from"./ExperiencesTable.84b01e73.js";import f from"./ProjectsTable.59495ab7.js";import _ from"./SkillsTable.c3860aa3.js";import"./ApplicationLogo.b6342610.js";import"./_plugin-vue_export-helper.cdc0426e.js";import"./EditExperience.61e029c8.js";import"./EditProject.8aadd2f8.js";import"./EditSkill.c7545e58.js";const g=s("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Dashboard ",-1),b={class:"py-12"},w={class:"max-w-7xl mx-auto sm:px-6 lg:px-8"},v={class:"bg-white overflow-hidden shadow-sm sm:rounded-lg"},k={class:"p-6 text-gray-900"},j={class:"flex space-x-5 p-5"},F={class:"bg-white overflow-hidden shadow-sm sm:rounded-lg"},y={class:"max-w-7xl mx-auto sm:px-6"},G={__name:"Admin",props:["user","experiences","messages","projects","skills"],setup(o){return(T,B)=>(m(),r(l,null,[e(i(c),{title:"Dashboard"}),e(a,null,{header:t(()=>[g]),default:t(()=>[s("div",b,[s("div",w,[s("div",v,[s("div",k,"Welcome Home "+n(o.user),1),s("div",j,[e(d),e(p),e(x)])]),s("div",F,[e(h,{messages:o.messages},null,8,["messages"])])])]),s("div",y,[e(u,{experiences:o.experiences},null,8,["experiences"]),e(f,{projects:o.projects},null,8,["projects"]),e(_,{skills:o.skills},null,8,["skills"])])]),_:1})],64))}};export{G as default};