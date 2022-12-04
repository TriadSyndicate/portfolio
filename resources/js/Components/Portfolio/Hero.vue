<template>
    <div class="h-screen flex flex-col space-y-8 items-center justify-center text-center overflow-hidden">
        <BackgroundCircles/>
        <img src="@/assets/Cid_Kagenou_Portrait.png" class="object-cover relative rounded-full h-32 w-32 mx-auto" alt="Tony Triad">
        <div class="z-20">
            <h2 class="text-sm uppercase text-gray-500 tracking-widest md:tracking-[15px] pb-2">FULLSTACK DEVELOPER</h2>
            <Typewriter :type-speed="50" :erase-speed="30" class="text-3xl md:text-5xl font-semibold px-10 caret-pink-500" caret="underscore" :array="StringsArray"></Typewriter>
            <div class="pt-5 space-x-1">
                <a href="#about"><button class="hero-button">About</button></a>
                <a href="#experience"><button class="hero-button">Experience</button></a>
                <a href="#skills"><button class="hero-button">Skills</button></a>
                <a href="#projects"><button class="hero-button">Projects</button></a>   
            </div>
        </div>
    </div>
</template>
<script>
import Typewriter from 'vue-writer'
import BackgroundCircles from '@/Components/Portfolio/BackgroundCircles.vue';
export default {
    components:{ Typewriter, BackgroundCircles },
    data(){
        return{
            StringsArray: ["Hi, The Name's Tony Tumwet", 'Guy-who-loves-Gaming.vue', "<ButLovesToCodeMore/>", "In Code We Trust ./"]
        }
    }
}
</script>
<style>
    
</style>