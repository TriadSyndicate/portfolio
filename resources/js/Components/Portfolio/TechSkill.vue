<template lang="">
    <kinesis-container :event="scroll" :duration="3000">
        <div class="transition ease-in-out delay-150  hover:-translate-y-1 hover:scale-110 duration-300 group relative flex cursor-pointer">
        <kinesis-element :strength="30" :axis="y" :originX="30">
            <img :src="skill.skill_image.replace('public/', 'storage/')" class="rounded-full border border-gray-500 object-contain w-16 h-16 sm:w-24 sm:h-24 xl:w-32 xl:h-32 filter group-hover:grayscale-0 group-active:grayscale-0 transition duration-300 ease-in-out" alt="">
            <div class="absolute top-0 left-0 w-full rounded-full h-full bg-gray-800 bg-opacity-0 group-hover:bg-opacity-90 transition duration-300 ease-in-out"></div>

            <div class="opacity-0 group-hover:opacity-100">
                <h3 class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-xl font-bold">{{skill.skill_title}}</h3>
                <p class="absolute top-1/4 right-1/4 transform -translate-x-1/2 -translate-y-1/2 text-green-500 text-sm font-bold">{{skill.skill_description}}</p>
            </div>
        </kinesis-element>
    </div>
    </kinesis-container>
</template>
<script>
import { KinesisElement, KinesisContainer } from "vue-kinesis";
export default {
    components:{KinesisElement,KinesisContainer},
    props: {
        skill: {
            type: Object,
            required: true,
        }
    },
}
</script>
<style lang="">
    
</style>