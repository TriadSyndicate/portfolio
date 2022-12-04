<template lang="">
    <div
        class="h-screen flex relative flex-col text-center md:text-left md:flex-row max-w-7xl px-10 justify-evenly mx-auto items-center"
    >
        <h3
            class="absolute top-14 sm:top-24 uppercase tracking-[20px] text-gray-500 sm:text-3xl animate-pulse"
        >
            Contact
        </h3>
        <!-- Heading -->
        <div class="flex flex-col space-y-2 sm:space-y-10 w-screen pt-20">
            <h4 class="sm:text-4xl font-semibold text-center">
                I am available for freelance work. <br />
                <span class="underline decoration-green-500/50"
                    >Get in touch</span
                >
            </h4>
            <p class="text-gray-500 text-xs max-[400px]:hidden sm:text-lg">
                I am currently looking for new opportunities. I am open to both
                full-time and freelance positions. If you have a project that
                you want to get started, think you need my help with something
                or just fancy saying hello, then get in touch.
            </p>
            <div class="sm:space-y-10">
                <a
                    href="tel:+254799243956"
                    class="flex items-center space-x-1 sm:space-x-5 justify-center"
                >
                    <PhoneIcon class="text-green-500 h-4 w-4 sm:h-7 sm:w-7 animate-pulse" />
                    <p class="sm:text-2xl">+254799243956</p>
                </a>
                <a
                    href="mailto:tony@254gamers.com"
                    class="flex items-center space-x-1 sm:space-x-5 justify-center"
                >
                    <EnvelopeIcon
                        class="text-green-500 h-4 w-4 sm:h-7 sm:w-7 animate-pulse"
                    />
                    <p class="sm:text-2xl">tony@254gamers.com</p>
                </a>
                <div class="flex items-center space-x-1 sm:space-x-5 justify-center">
                    <MapPinIcon class="text-green-500 h-4 w-4 sm:h-7 sm:w-7 animate-pulse" />
                    <p class="sm:text-2xl">Nairobi, Kenya 🇰🇪</p>
                </div>
            </div>
            <!-- Form -->
            <form class="flex flex-col space-y-2 w-fit mx-auto" action="">
                <div class="flex flex-col space-y-2 sm:space-y-0 sm:flex-row sm:space-x-2">
                    <input
                        placeholder="Name"
                        v-model="name"
                        class="contactInput"
                        type="text"
                    />
                    <input
                        placeholder="Email"
                        v-model="email"
                        class="contactInput"
                        type="email"
                    />
                </div>
                <input placeholder="Subject" class="contactInput" v-model="subject" type="text" />
                <textarea placeholder="Message" v-model="message" class="contactInput"></textarea>
                <button
                    type="submit"
                    @click.prevent="submit"
                    @click="submitForm"
                    class="bg-green-500/50 py-5 px-10 rounded-md text-white font-bold text-lg"
                >
                    Submit
                </button>
            </form>
        </div>
    </div>
</template>
<script>
import { useToast } from "vue-toastification";
import { PhoneIcon, MapPinIcon, EnvelopeIcon } from "@heroicons/vue/24/solid";
export default {
    setup() {
        const toast = useToast();
        return { toast }
    },
    data(){
        return {
            name: '',
            email: '',
            subject: '',
            message: ''
        }
    },
    components: { PhoneIcon, MapPinIcon, EnvelopeIcon },
    methods:{
        submitForm(){
            let formData = new FormData();
            formData.append("name", this.name);
            formData.append("email", this.email);
            formData.append("subject", this.subject);
            formData.append("message", this.message);
            const headers = {
                "Content-Type": "multipart/form-data",
            };
            axios
                .post(route("message.store"), formData, headers)
                .then((response) => {
                    console.log(response);
                    if (response.data.message) {
                        this.toast.success('Form Submitted Successfully', {position: 'bottom-right'});
                    }
                    else if(response.data.error){
                        this.toast.error('Error in submitting form', {position: 'bottom-right'});
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        }
    }
};
</script>
<style lang=""></style>
