<template>
    <div @submit.prevent class="space-y-5">
        <form id="skillForm" class="flex flex-col space-y-2 w-fit mx-auto">
            <h3 class="text-lg font-semibold">Skill Entry</h3>
            <input
                type="text"
                placeholder="Svelte"
                name="title"
                v-model="skill_title"
                class="border border-gray-300 rounded-md p-2"
            />
            <textarea
                v-model="skill_description"
                name="description"
                class="border border-gray-300 rounded-md p-2"
                placeholder="4+ Years"
                cols="30"
                rows="10"
            ></textarea>
            <input
                type="file"
                name="skill_image"
                @change="onFileUpload"
                class="border border-gray-300 rounded-md p-2"
            />
            <button
                type="button"
                @click.prevent="submit"
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
            skill_title: "",
            skill_description: "",
            skill_image: "",
        };
    },
    methods: {
        onFileUpload(e) {
            this.skill_image = e.target.files[0];
        },
        submitProjectForm() {
            let formData = new FormData();
            formData.append("skill_title", this.skill_title);
            formData.append("skill_description", this.skill_description);
            formData.append("skill_image", this.skill_image);
            const headers = {
                "Content-Type": "multipart/form-data",
            };
            axios
                .post(route("skill.store"), formData, headers)
                .then((response) => {
                    if(response.data.skill){
                        this.$swal({
                            title: "Success",
                            text: "Skill Added Successfully",
                            icon: "success",
                            timer: 2000,
                            showConfirmButton: false,
                        }).then(() => {
                            this.$inertia.reload();
                            this.clearForm();
                        });
                    }
                })
                .catch((error) => {
                    this.$swal({
                        title: "Error",
                        text: "Something went wrong",
                        icon: "error",
                        timer: 2000,
                        showConfirmButton: false,
                    });
                });
        },
        clearForm() {
            this.skill_title = "";
            this.skill_description = "";
            this.skill_image = "";
        },
    },
};
</script>
<style></style>
