<template lang="">
    <div
        class="h-screen flex flex-col  relative text-left md:flex-row max-w-full px-10 justify-evenly mx-auto items-center"
    >
        <h3
            class="absolute top-12 z-50  py-1 sm:py-0 sm:top-24 uppercase tracking-[12px] sm:tracking-[22px] text-gray-500 sm:text-3xl animate-pulse"
        >
            Experience
        </h3>
    
            <div class="flex space-x-1 sm:space-x-5 w-full overflow-x-scroll p-10 snap-x snap-proximity scrollbar scrollbar-track-gray-300/10 scrollbar-thumb-green-500/60">
                    <ExperienceCard v-for="(exp, i) in experiences" :key="i" :experience="exp"/>
            </div>
       
    </div>
</template>
<script>
import ExperienceCard from '@/Components/Portfolio/ExperienceCard.vue';
export default {
    components: { ExperienceCard },
    props:{
        experiences: {
            type: Array,
            required: true,
        },
    },
    created() {
        console.log(this.experiences);
    },
};
</script>
<style lang=""></style>
