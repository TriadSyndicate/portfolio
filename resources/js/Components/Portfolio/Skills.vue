<template lang="">
    <div class="h-screen flex relative flex-col text-center md:text-left max-w-[2000px] xl:px-10 justify-center mx-auto items-center">
        <h3
            class="absolute top-20 uppercase tracking-[15px] sm:tracking-[22px] text-gray-500 text-3xl animate-pulse">
            Skills
        </h3>
        <h3 class="absolute top-36 uppercase tracking-[5px] text-gray-500 sm:text-sm">
            Hover over the skills to see the description
        </h3>
<kinesis-container event="scroll" >
    <kinesis-element strength="200">
        <div class="grid grid-cols-4 gap-5 pt-32 sm:pt-5">
            <TechSkill v-for="(skill, i) in skills" :key="i" :skill="skill" />
        </div>
    </kinesis-element>
</kinesis-container>

    </div>
</template>
<script>
import TechSkill from '@/Components/Portfolio/TechSkill.vue';
import { KinesisContainer, KinesisElement } from 'vue-kinesis';
export default {
    components:{TechSkill, KinesisContainer, KinesisElement},
    props: {
        skills: {
            type: Array,
            required: true,
        }
    },
}
</script>
<style lang="">
    
</style>