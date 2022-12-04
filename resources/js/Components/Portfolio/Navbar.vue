<template>
    <header class="sticky top-0 flex items-start justify-between max-w-7xl mx-auto z-20 xl:items-center p-5">
        <div class="flex flex-row items-center animate-pulse space-x-5">
            <a href="https://github.com/TriadSyndicate"><svg-icon type="mdi" style="color:gray" :path="mdiGithub" :size="30"></svg-icon></a>
            <a href="https://www.linkedin.com/in/tony-triad-77b660147/"><svg-icon style="color:gray" type="mdi" :path="mdiLinkedin" :size="30"></svg-icon></a>
        </div>
        <div class="flex flex-row items-center cursor-pointer animate-pulse space-x-3">
            <a href="mailto:triadsyndicate@gmail.com"><svg-icon type="mdi" style="color:gray" :path="mdiEmail" :size="30"></svg-icon></a>
            <a href="#contact"><p class="uppercase hidden md:inline-flex text-sm text-gray-400">Get In Touch</p></a>
        </div>
    </header>
</template>
<script setup>
import { mdiGithub, mdiEmail, mdiLinkedin } from '@mdi/js'
</script>
<style lang="">
    
</style>