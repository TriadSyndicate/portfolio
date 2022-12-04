<template>
    <kinesis-container class="z-10" event="scroll" :duration="2000">
        <div
            class="w-screen flex-shrink-0 snap-center flex flex-col space-y-5 items-center justify-center p-20 md:p-44 h-fit"
        >
            <kinesis-element :strength="1000">
                <img
                    :src="Project.project_image.replace('public/', 'storage/')"
                    alt=""
                    class="sm:max-w-xl"
                />
            </kinesis-element>
            <div class="flex flex-col space-y-8 px-0 md:px-10 max-w-6xl">
                <h4 class="text-xl sm:text-4xl font-semibold text-center">
                    <span class="underline decoration-green-500/50">
                        Case Study {{ index + 1 }} of {{ total }}
                    </span>
                    {{ Project.project_title }}
                </h4>
                <p class="text-sm sm:text-lg text-center md:text-left">
                    {{ Project.project_description }}
                </p>
                <a v-if="Project.project_url" :href="Project.project_url" target="_blank" rel="noopener noreferrer">
                    <button class="bg-green-500/40 py-2 px-2 rounded-md text-white font-bold sm:text-sm text-center hover:border hover:border-pink-500 hover:transform">Project Link</button>
                </a>
            </div>
        </div>
    </kinesis-container>
</template>
<script>
import { KinesisContainer, KinesisElement } from "vue-kinesis";
export default {
    components: { KinesisContainer, KinesisElement },
    props: {
        Project: {
            type: Object,
            required: true,
        },
        total: {
            type: Number,
            required: true,
        },
        index: {
            type: Number,
            required: true,
        },
    },
};
</script>
<style lang=""></style>
