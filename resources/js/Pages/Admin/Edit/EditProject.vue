<template lang="">
        <div
            class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 text-left outline-none focus:outline-none justify-center items-center"
            :id="'modal-id-project'+project.id"
        >
            <div class="relative w-auto my-6 mx-auto max-w-3xl">
                <!--content-->
                <div
                    class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none"
                >
                    <!--header-->
                    <div
                        class="flex items-start justify-between p-5 border-b border-solid border-slate-200 rounded-t"
                    >
                        <h3 class="text-3xl font-semibold">
                            Project Edit ID: {{ project.id }}
                        </h3>
                        <button
                            class="p-1 ml-auto bg-transparent border-0 text-red-500 bg-white opacity-100 float-right text-5xl leading-none font-bold outline-none focus:outline-none"
                            @click="toggleModal('modal-id-project'+project.id)"
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
                        :id="'editProjectErrors'+project.id"
                        class="bg-red-200 hidden rounded-lg py-5 px-6 mb-4 text-base text-red-700 p-3"
                        role="alert"
                    >
                        <ul></ul>
                    </div>
                    <!--body-->
                    <div class="relative p-6 flex-auto">
                        <form
                        @submit.prevent
                            :id="'projectForm'+project.id"
                            class="flex flex-col space-y-2 w-fit mx-auto"
                        >
                        <label for="title">Project Title</label>
                            <input
                                type="text"
                                placeholder="Project Title"
                                name="title"
                                v-model="title"
                                class="border border-gray-300 rounded-md p-2"
                            />
                            <label for="description"
                                >Project Description</label
                            >
                            <textarea
                                name="description"
                                v-model="description"
                                placeholder="Project Description"
                                class="border border-gray-300 rounded-md p-2"
                            ></textarea>
                            <label for="url">Project URL</label>
                            <input
                                type="text"
                                name="url"
                                v-model="url"
                                placeholder="Project URL"
                                class="border border-gray-300 rounded-md p-2"
                            />
                            <img class="w-64" :src="project.project_image.replace('public/','storage/')" :alt="project.project_title">
                            <label for="project_image">Project Image</label>
                            <input
                                name="project_image"
                                type="file"
                                @change="onFileChange"
                                ref="project_image"
                                placeholder="Project Image"
                                class="border border-gray-300 rounded-md p-2"
                            />
                            <button
                            type="button"
                                @click="submitx"
                                class="bg-green-500 py-2 rounded-md text-white font-bold text-lg"
                            >
                                Edit Project
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
                            @click="toggleModal('modal-id-project'+project.id)"
                        >
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="hidden opacity-25 fixed inset-0 z-40 bg-black"
            :id="'modal-id-project'+project.id+'-backdrop'"
        ></div>
</template>
<script>
export default {
    props: ['project'],
    data() {
        return {
            title: this.project.project_title,
            description: this.project.project_description,
            url: this.project.project_url,
            project_image: null,
        };
    },
    methods:{
        toggleModal(id) {
            document.getElementById(id).classList.toggle('hidden');
            document.getElementById(id).classList.toggle('flex');
            document.getElementById(id + '-backdrop').classList.toggle('flex');
            document.getElementById(id + '-backdrop').classList.toggle('hidden');
        },
        onFileChange(e) {
            this.project_image = e.target.files[0];
        },
        submitx() {
            let formData = new FormData();
            formData.append('project_title', this.title);
            formData.append('project_description', this.description);
            formData.append('project_url', this.url);
            if(this.project_image){
                formData.append('project_image', this.project_image);
            }
            axios
                .post(route('project.update', {'id':this.project.id}), formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                    },
                })
                .then((response) => {
                    if (response.data.project) {
                        this.$swal.fire(
                                'Updated!',
                                `Your ${response.data.project.project_title} project has been updated.`,
                                'success'
                            ).then(() => {
                                this.$inertia.reload();
                            })
                    }
                })
                .catch((error) => {
                    this.$swal.fire(
                        'Error!',
                        `Something went wrong. ${error.response.data.message}`,
                        'error'
                    )
                });
        },
    },
}
</script>
<style lang="">
    
</style>