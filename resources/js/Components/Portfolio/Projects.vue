<template lang="">
    <div
        class="h-screen flex relative flex-col md:flex-row overflow-hidden text-left max-w-full xl:px-10 justify-evenly mx-auto items-center"
    >
        <h3
            class="absolute top-20 uppercase tracking-[10px] sm:tracking-[22px] text-gray-500 text-2xl sm:text-3xl animate-pulse"
        >
            Projects
        </h3>
        <div
            class="flex space-x-4 w-full overflow-x-scroll p-10 snap-x snap-mandatory scroll-smooth scrollbar scrollbar-track-gray-300/10 scrollbar-thumb-green-500/60"
        >
            <ProjectCard
                v-for="(project, index) in projects"
                :key="index"
                :index="index"
                :total="projects.length"
                :Project="project"
            />
        </div>
        <div
            class="w-full absolute top-[30%] bg-green-500/10 left-0 h-64 sm:h-[500px] -rotate-6 -skew-y-12 -z-9"
        ></div>
    </div>
</template>
<script>
import ProjectCard from "@/Components/Portfolio/ProjectCard.vue";
export default {
    components: { ProjectCard },
    props: {
        projects: {
            type: Array,
            required: true,
        },
    },
    data() {
        return {};
    },
};
</script>
<style>
.hide-scroll-bar {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

.hide-scroll-bar::-webkit-scrollbar {
    display: none;
}
</style>
