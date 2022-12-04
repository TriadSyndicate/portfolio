<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import ExperienceForm from "@/Pages/Admin/ExperienceForm.vue";
import ProjectForm from "@/Pages/Admin/ProjectForm.vue";
import SkillForm from "./Admin/SkillForm.vue";
import MessagesTable from "./Admin/Tables/MessagesTable.vue";
import ExperiencesTable from "./Admin/Tables/ExperiencesTable.vue";
import ProjectsTable from "./Admin/Tables/ProjectsTable.vue";
import SkillsTable from "./Admin/Tables/SkillsTable.vue";
const props = defineProps(["user", "experiences", "messages", "projects", "skills"]);
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">Welcome Home {{ user }}</div>
                    <div class="flex space-x-5 p-5">
                        <ExperienceForm />
                        <ProjectForm />
                        <SkillForm />
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <MessagesTable :messages="messages" />
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6">
            <ExperiencesTable :experiences="experiences" />
            <ProjectsTable :projects="projects"/>
            <SkillsTable :skills="skills"/>
        </div>
    </AuthenticatedLayout>
</template>
