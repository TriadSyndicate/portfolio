<template>
    <div class="space-y-5">
        <form id="projectForm" class="flex flex-col space-y-2 w-fit mx-auto">
            <h3 class="text-lg font-semibold">Project Entry</h3>
            <input
                type="text"
                placeholder="Project Title"
                name="title"
                v-model="project_title"
                class="border border-gray-300 rounded-md p-2"
            />
            <textarea
                v-model="project_description"
                name="description"
                class="border border-gray-300 rounded-md p-2"
                placeholder="Project Description"
                cols="30"
                rows="10"
            ></textarea>
            <input
                type="text"
                name="link"
                v-model="project_url"
                placeholder="Demo Link"
                class="border border-gray-300 rounded-md p-2"
            />
            <input
                type="file"
                name="project_image"
                @change="onFileUpload"
                class="border border-gray-300 rounded-md p-2"
            />
            <button
                @click.prevent="submit"
                type="button"
                @click="submitProjectForm"
                class="bg-green-500 py-2 rounded-md text-white font-bold text-lg animate-pulse"
            >
                Submit
            </button>
            <button
                type="button"
                @click.prevent="submit"
                @click="clearForm"
                class="uppercase bg-red-500 py-2 rounded-md text-white font-medium text-lg"
            >
                Clear
            </button>
        </form>
    </div>
</template>
<script>
export default {
    data() {
        return {
            project_title: "",
            project_description: "",
            project_url: "",
            project_image: "",
        };
    },
    methods: {
        onFileUpload(e) {
            this.project_image = e.target.files[0];
        },
        submitProjectForm() {
            let formData = new FormData();
            formData.append("project_title", this.project_title);
            formData.append("project_description", this.project_description);
            formData.append("project_url", this.project_url);
            formData.append("project_image", this.project_image);
            const headers = {
                "Content-Type": "multipart/form-data",
            };
            axios
                .post(route("project.store"), formData, headers)
                .then((response) => {
                    if(response.data.project){
                        this.$swal.fire({
                            title: "Success",
                            text: "Project Added Successfully",
                            icon: "success",
                            confirmButtonText: "Ok",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                this.$inertia.reload()
                                this.clearForm();
                            }
                        });
                    }
                })
                .catch((error) => {
                    this.$swal({
                        title: "Error",
                        text: "Something went wrong",
                        icon: "error",
                        confirmButtonText: "Ok",
                    });
                });
        },
        clearForm() {
            this.project_title = "";
            this.project_description = "";
            this.project_url = "";
            this.project_image = "";
        },
    },
};
</script>
<style></style>
