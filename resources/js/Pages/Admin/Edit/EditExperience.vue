<template lang="">
    <div>
        <div
            class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
            :id="'modal-id'+experience.id"
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
                            Work Experience Edit ID: {{ experience.id }}
                        </h3>
                        <button
                            class="p-1 ml-auto bg-transparent border-0 text-red-500 bg-white opacity-100 float-right text-5xl leading-none font-bold outline-none focus:outline-none"
                            @click="toggleModal('modal-id'+experience.id)"
                        >
                            <span
                                class="text-red-500 opacity-90 h-6 w-6 text-2xl block outline-none focus:outline-none"
                            >
                            x
                            </span>
                        </button>
                    </div>
                    <!--Errors-->
                    <div
                        :id="'editExperienceErrors'+experience.id"
                        class="bg-red-200 hidden rounded-lg py-5 px-6 mb-4 text-base text-red-700 p-3"
                        role="alert"
                    >
                        <ul></ul>
                    </div>
                    <!--body-->
                    <div class="relative p-6 flex-auto">
                        <form
                        @submit.prevent
                            :id="'experienceForm'+experience.id"
                            class="flex flex-col space-y-2 w-fit mx-auto"
                        >
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
                            <img class="w-10" :src="experience.company_logo.replace('public/','storage/')" :alt="experience.company">
                            <label for="company_logo">Logo</label>
                            <input
                                name="company_logo"
                                type="file"
                                @change="onFileChange"
                                ref="company_logo"
                                placeholder="Company Logo"
                                class="border border-gray-300 rounded-md p-2"
                            />
                            <div class="flex">
                                <img class="w-10" v-for="(stack, index) in experience.tech_stacks" :key="index" :src="stack.replace('public/','storage/')" />
                            </div>
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
                            <label for="description-entry"
                                >Experience Description</label
                            >
                            <input
                                name="description-entry"
                                v-model.trim="description_entry"
                                @keyup.enter="addDescription"
                                placeholder="Work"
                                class="border border-gray-300 rounded-md p-2"
                            />
                            <textarea
                                name="description"
                                v-model="description"
                                disabled
                                placeholder="Work Experience Summary"
                                class="border text-white border-gray-300 bg-slate-700 rounded-md p-2"
                            ></textarea>
                            <button
                            type="button"
                                @click="submitx"
                                class="bg-green-500 py-2 rounded-md text-white font-bold text-lg"
                            >
                                Edit Experience
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
                            @click="toggleModal('modal-id'+experience.id)"
                        >
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="hidden opacity-25 fixed inset-0 z-40 bg-black"
            :id="'modal-id'+experience.id+'-backdrop'"
        ></div>
    </div>
</template>
<script>
export default {
    props: ["experience"],
    data() {
        return {
            title: this.experience.title,
            company: this.experience.company,
            location: this.experience.location,
            start_date: this.experience.start_date,
            end_date: this.experience.end_date,
            description: this.experience.description,
            description_entry: "",
            company_logo: "",
            tech_stacks: [],
        };
    },
    methods: {
        onFileChange(e) {
            this.company_logo = e.target.files[0];
        },
        onFileChangeStack(e) {
            this.tech_stacks = e.target.files;
        },
        addDescription() {
            this.description.push(this.description_entry);
            this.description_entry = "";
        },
        submitx() {
            let formData = new FormData();
            formData.append("title", this.title);
            formData.append("company", this.company);
            formData.append("location", this.location);
            formData.append("start_date", this.start_date);
            formData.append("end_date", this.end_date);
            if (this.company_logo != "") {
                formData.append("company_logo", this.company_logo);
            }
            if (this.tech_stacks.length > 0) {
                for (let i = 0; i < this.tech_stacks.length; i++) {
                    formData.append("tech_stacks[]", this.tech_stacks[i]);
                }
            }
            if(this.description != ""){
                for(let i = 0; i < this.description.length; i++){
                    formData.append("description[]", this.description[i]);
                }
            }
            axios
                .post(route('experience.update', { 'id': this.experience.id }), formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    },
                })
                .then((response) => {
                    if(response.data.experience){
                        this.$swal({
                            title: "Success!",
                            text: `Your experience as ${response.data.experience.title} at ${response.data.experience.company} Updated`,
                            icon: "success",
                            timer: 2000,
                            buttons: false,
                        }).then(() => {
                            this.$inertia.reload()
                        });
                    }
                })
                .catch((error) => {
                    this.$swal.fire(
                        "Error!",
                        `Something went wrong, please try again ${error.response.data.message}`,
                        "error"
                    );
                });
        },
        printErrorMsg(msg) {
            $("#editExperienceErrors{{ experience.id }}").find("ul").html('');
            $("#editExperienceErrors{{ experience.id }}").removeClass('hidden').addClass('block');;
            $.each(msg, function (key, value) {
                $("#editExperienceErrors{{ experience.id }}").find("ul").append('<li>' + value + '</li>');
            });
        },
        toggleModal(modalID) {
            document.getElementById(modalID).classList.toggle("hidden");
            document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
            document.getElementById(modalID).classList.toggle("flex");
            document.getElementById(modalID + "-backdrop").classList.toggle("flex");
        }
    },
};
</script>
<style lang=""></style>
