<template lang="">
    <article
        class="flex flex-col rounded-lg items-center space-y-7 flex-shrink-0 w-[360px] sm:w-[500px] md:w-[600px] xl:w-[900px] snap-center bg-[#292929] p-10 hover:opacity-100 hover:border hover:border-green-500 opacity-90 sm:opacity-40 cursor-pointer transition-opacity duration-200 overflow-hidden sm:py-10"
    >
        <kinesis-container event="scroll">
            <kinesis-element type="translate" :strength="200" class="p-2">
                <img
                    :src="
                        experience.company_logo.replace('public/', 'storage/')
                    "
                    class="flex-shrink-0 w-[64px] h-[64px] sm:h-32 sm:w-32 md:w-32 md:h-32 rounded-full object-center xl:w-[200px] xl:h-[200px]"
                    :alt="experience.company"
                />
            </kinesis-element>
        </kinesis-container>
        <div class="px-10 md:px-10">
            <h4 class="text-lg pt-3 sm:pt-0 sm:text-2xl md:text-4xl font-light">{{ experience.title }}</h4>
            <p class="font-bold text-2xl mt-1">{{ experience.company }}</p>
            <div class="flex space-x-2 my-2">
                <!-- Tech Stack Userd -->
                <img
                    v-for="stack in experience.tech_stacks"
                    :src="stack.replace('public/', 'storage/')"
                    class="h-11 w-11  object-center"
                />
            </div>
            <p class="uppercase py-5 text-gray-300">{{new Date(experience.start_date).toLocaleDateString('en-us', { year:"numeric", month:"short"})}} ➡ {{new Date(experience.end_date).toLocaleDateString('en-us', { year:"numeric", month:"short"})}}</p>
            <ul class="list-disc space-y-4 ml-5 text-xs sm:text-lg">
                <li v-if="experience.description.length>=1" v-for="desc in experience.description" :key="desc">
                    {{ desc }}
                </li>
            </ul>
        </div>
    </article>
</template>
<script>
import { KinesisContainer, KinesisElement } from "vue-kinesis";
export default {
    props: {
        experience: {
            type: Object,
            required: true,
        },
    },
    components: { KinesisContainer, KinesisElement },
};
</script>
<style lang=""></style>
