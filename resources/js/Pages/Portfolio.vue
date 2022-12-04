<template>
    <head>
        <title>Portfolio</title>
    </head>
    <div class="bg-[rgb(36,36,36)] text-white h-screen snap-y snap-mandatory overflow-x-hidden overflow-scroll z-0 scrollbar scrollbar-track-gray-500/10 scrollbar-thumb-green-500/40 scroll-smooth">
        <Navbar/>
        <section id="hero" class="snap-start">
            <Hero/>
        </section>
        <section id="about" class="snap-center">
            <About/>
        </section>
        <section id="experience" class="snap-end">
            <Experience :experiences="experiences" />
        </section>
        <section id="skills" class="snap-start">
            <Skills :skills="skills" />
        </section>
        <section id="projects" class="snap-start">
        <Projects :projects="projects"/>
        </section>
        <section id="contact" class="snap-end">
            <Contact/>
        </section>
    </div>
</template>
<script>
import Hero from '@/Components/Portfolio/Hero.vue';
import Navbar from '@/Components/Portfolio/Navbar.vue';
import About from '@/Components/Portfolio/About.vue';
import Experience from '@/Components/Portfolio/Experience.vue';
import Skills from '@/Components/Portfolio/Skills.vue';
import Projects from '@/Components/Portfolio/Projects.vue';
import Contact from '@/Components/Portfolio/Contact.vue';
import {SnowOut} from '@/utils';
export default {
    components: { Navbar, Hero, About, Experience, Skills, Projects, Contact },
    props: {
        experiences: {
            type: Array,
            required: true,
        },
        projects:{
            type: Array,
            required: true,
        },
        skills:{
            type: Array,
            required: true,
        }
    },
    created(){
        SnowOut();
    },
}
</script>
<style lang="">
    
</style>