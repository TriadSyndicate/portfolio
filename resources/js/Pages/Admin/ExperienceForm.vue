<template lang="">
    <div class="space-y-5">
        <form id="experienceForm" class="flex flex-col space-y-2 w-fit mx-auto">
            <h3 class="text-lg font-semibold">Work Experience Entry</h3>
            <input
                type="text"
                placeholder="Work Title"
                name="title"
                v-model="title"
                class="border border-gray-300 rounded-md p-2"
            />
            <input
                type="text"
                name="company"
                v-model="company"
                placeholder="Company"
                class="border border-gray-300 rounded-md p-2"
            />
            <label for="company_logo">Logo</label>
            <input
                name="company_logo"
                type="file"
                @change="onFileChange"
                ref="company_logo"
                placeholder="Company Logo"
                class="border border-gray-300 rounded-md p-2"
            />
            <label for="tech_stacks">Tech Stacks</label>
            <input
                name="tech_stacks"
                type="file"
                multiple
                @change="onFileChangeStack"
                ref="tech_stacks"
                class="border border-gray-300 rounded-md p-2"
            />
            <input
                type="text"
                name="location"
                v-model="location"
                placeholder="Location"
                class="border border-gray-300 rounded-md p-2"
            />
            <label for="start_date">Start Date</label>
            <input
                type="date"
                name="start_date"
                v-model="start_date"
                class="border border-gray-300 rounded-md p-2"
            />
            <label for="end_date">End Date</label>
            <input
                type="date"
                name="end_date"
                v-model="end_date"
                class="border border-gray-300 rounded-md p-2"
            />
            <label for="description-entry">Experience Description</label>
            <input
                name="description-entry"
                v-model="description_entry"
                @keyup.enter="addDescription"
                placeholder="Work"
                class="border border-gray-300 rounded-md p-2"
            />
            <textarea
                name="description"
                v-model="description"
                disabled
                placeholder="Work Experience Summary"
                class="border border-gray-300 rounded-md p-2"
            ></textarea>
            <button
                @click.prevent="submit"
                @click="submitx"
                type="button"
                class="bg-green-500 py-2 rounded-md text-white font-bold text-lg animate-pulse"
            >
                Submit
            </button>
            <button type="button" @click.prevent="submit" @click="clearForm" class="uppercase bg-red-500 py-2 rounded-md text-white font-medium text-lg">
                Clear
            </button>
        </form>
    </div>
</template>
<script>
export default {
    data() {
        return {
            title: "",
            company: "",
            location: "",
            start_date: "",
            end_date: "",
            description: [],
            description_entry: "",
            company_logo: [],
            tech_stacks: [],
        };
    },
    methods: {
        submitx() {
            const formData = new FormData();
            formData.append("title", this.title);
            formData.append("company", this.company);
            formData.append("location", this.location);
            formData.append("start_date", this.start_date);
            formData.append("end_date", this.end_date);
            formData.append("company_logo", this.company_logo);

            for (var i = 0; i < this.tech_stacks.length; i++) {
                let file = this.tech_stacks[i];

                formData.append("tech_stacks[" + i + "]", file);
            }
            for(var j = 0; j < this.description.length; j++){
                let desc = this.description[j];
                formData.append("description[" + j + "]", desc);
            }
            const headers = {
                "Content-Type": "multipart/form-data",
            };
            axios
                .post(route("experience.store"), formData, headers)
                .then((response) => {
                    if(response.data.experience){
                        this.$swal({
                            title: "Success",
                            text: "Experience Added Successfully",
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
                        text: `Something went wrong: ${error}`,
                        icon: "error",
                        timer: 2000,
                        showConfirmButton: false,
                    });
                });
        },
        onFileChange(e) {
            const files = e.target.files || e.dataTransfer.files;
            if (!files.length) return;
            this.company_logo = files[0];
        },
        onFileChangeStack(e) {
            const files = e.target.files || e.dataTransfer.files;
            if (!files.length) return;
            this.tech_stacks = files;
        },
        addDescription() {
            this.description.push(this.description_entry);
            this.description_entry = "";
        },
        clearForm(){
            this.title = "";
            this.company = "";
            this.location = "";
            this.start_date = "";
            this.end_date = "";
            this.description = [];
            this.description_entry = "";
            this.company_logo = [];
            this.tech_stacks = [];
        }
    },
    onMounted() {},
};
</script>
<style lang=""></style>
