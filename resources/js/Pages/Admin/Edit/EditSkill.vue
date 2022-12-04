<template lang="">
    <div class="hidden overflow-x-hidden overflow-x-auto fixed inset-0 z-50 text-left outline-none focus:outline-none justify-center items-center" :id="'modal-id-skill'+skill.id">
        <div class="relative w-auto my-6 mx-auto max-w-3xl">
            <!-- content -->
            <div
                    class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none"
                >
                    <!--header-->
                    <div
                        class="flex items-start justify-between p-5 border-b border-solid border-slate-200 rounded-t"
                    >
                        <h3 class="text-3xl font-semibold">
                            Skill Edit ID: {{ skill.id }}
                        </h3>
                        <button
                            class="p-1 ml-auto bg-transparent border-0 text-red-500 bg-white opacity-100 float-right text-5xl leading-none font-bold outline-none focus:outline-none"
                            @click="toggleModal('modal-id-skill'+skill.id)"
                        >
                            <span
                                class=" text-red-500 opacity-90 h-6 w-6 text-2xl block outline-none focus:outline-none"
                            >
                                x
                            </span>
                        </button>
                    </div>
                    <!--Errors-->
                    <div
                        :id="'editSkillErrors'+skill.id"
                        class="bg-red-200 hidden rounded-lg py-5 px-6 mb-4 text-base text-red-700 p-3"
                        role="alert"
                    >
                        <ul></ul>
                    </div>
                    <!--body-->
                    <div class="relative p-6 flex-auto">
                        <form
                        @submit.prevent
                            :id="'skillForm'+skill.id"
                            class="flex flex-col space-y-2 w-fit mx-auto"
                        >
                        <label for="title">Skill Title</label>
                            <input
                                type="text"
                                placeholder="Skill Title"
                                name="title"
                                v-model="title"
                                class="border border-gray-300 rounded-md p-2"
                            />
                            <label for="description"
                                >Skill Description</label
                            >
                            <textarea
                                name="description"
                                v-model="description"
                                placeholder="Skill Description"
                                class="border border-gray-300 rounded-md p-2"
                            ></textarea>
                            <img class="w-32" :src="skill.skill_image.replace('public/','storage/')" :alt="skill.skill_title">
                            <label for="project_image">Skill Image</label>
                            <input
                                name="skill_image"
                                type="file"
                                @change="onFileChange"
                                ref="skill_image"
                                placeholder="Skill Image"
                                class="border border-gray-300 rounded-md p-2"
                            />
                            <button
                            type="button"
                                @click="submitx"
                                class="bg-green-500 py-2 rounded-md text-white font-bold text-lg"
                            >
                                Edit Skill
                            </button>
                        </form>
                    </div>
                    <!--footer-->
                    <div
                        class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b"
                    >
                        <button
                            class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                            type="button"
                            @click="toggleModal('modal-id-skill'+skill.id)"
                        >
                            Close
                        </button>
                    </div>
                </div>
        </div>
    </div>
    <div
            class="hidden opacity-25 fixed inset-0 z-40 bg-black"
            :id="'modal-id-skill'+skill.id+'-backdrop'"
        ></div>
</template>
<script>
export default {
    props: ['skill'],
    data() {
        return {
            title: this.skill.skill_title,
            description: this.skill.skill_description,
            skill_image: null,
        };
    },
    methods: {
        toggleModal(id) {
            document.getElementById(id).classList.toggle('hidden');
            document.getElementById(id).classList.toggle('flex');
            document.getElementById(id + '-backdrop').classList.toggle('flex');
            document.getElementById(id + '-backdrop').classList.toggle('hidden');
        },
        onFileChange(e) {
            this.skill_image = e.target.files[0];
        },
        submitx() {
            let formData = new FormData();
            formData.append('skill_title', this.title);
            formData.append('skill_description', this.description);
            if(this.skill_image != null){
                formData.append('skill_image', this.skill_image);
            }
            axios
                .post(route('skill.update',{'id':this.skill.id}), formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                    },
                })
                .then((response) => {
                    if (response.data.skill) {
                        this.$swal.fire(
                                'Updated!',
                                `Your ${response.data.skill.skill_title} skill has been updated.`,
                                'success'
                            ).then(() => {
                                this.$inertia.reload();
                            })
                    }
                })
                .catch((error) => {
                    this.$swal.fire(
                        'Error!',
                        `Something went wrong.`,
                        'error'
                    )
                });
        },
    }
}
</script>
<style lang="">
    
</style>