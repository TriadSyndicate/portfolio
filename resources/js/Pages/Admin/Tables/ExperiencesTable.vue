<template lang="">
    <div class="flex flex-col p-10 text-center justify-center">
        <h3 class="tracking-[15px] font-serif">Experiences</h3>
        <table class="border-collapse border border-slate-500 border-spacing-2">
            <thead>
                <tr>
                    <th class="border border-slate-600">Title</th>
                    <th class="border border-slate-600">Company</th>
                    <th class="border border-slate-600">Start Date</th>
                    <th class="border border-slate-600">End Date</th>
                    <th class="border border-slate-600">Actions</th> 
                </tr>
            </thead>
            <tbody>
                <tr v-for="experience in experiences" :key="experience.id">
                    <td class="border border-slate-700">{{ experience.title }}</td>
                    <td class="border border-slate-700">{{ experience.company }}</td>
                    <td class="border border-slate-700">{{ experience.start_date }}</td>
                    <td class="border border-slate-700">{{ experience.end_date }}</td>
                    <td class="border border-slate-700">
                        <button
                            @click="deleteExperience(experience)"
                            class="bg-red-500 text-white px-2 py-1 rounded-md"
                        >
                            Delete
                        </button>
                        <button @click="toggleModal('modal-id'+experience.id)" class="bg-teal-500 text-white rounded-md px-2 py-1">
                            View
                        </button>
                    </td>
                    <EditExperience :experience="experience" /> 
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
import EditExperience from '../Edit/EditExperience.vue';
export default {
    props: {
        experiences: {
            type: Array,
            required: true,
        },
    },
    components: { EditExperience },
    methods:{
        deleteExperience(experience){
            const swalWithTailwind = this.$swal.mixin({
                customClass: {
                    confirmButton: 'bg-green-500 text-white px-2 py-1 rounded-md m-2',
                    cancelButton: 'bg-red-500 text-white px-2 py-1 rounded-md m-2'
                },
                buttonsStyling: false
            })
            swalWithTailwind.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(route('experience.destroy', experience.id)).then((response) => {
                        if (response.data.message) {
                            swalWithTailwind.fire(
                                'Deleted!',
                                `Your work experience as ${response.data.message.title} at ${response.data.message.company} has been deleted.`,
                                'success'
                            ).then(() => {
                                this.$inertia.reload();
                            })
                        }
                    });
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === this.$swal.DismissReason.cancel
                ) {
                    swalWithTailwind.fire(
                        'Cancelled',
                        `Your work experience as ${experience.title} at ${experience.company} is safe :)`,
                        'error'
                    )
                }
            })
        },
        // modal-id
         toggleModal(modalID) {
            document.getElementById(modalID).classList.toggle("hidden");
            document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
            document.getElementById(modalID).classList.toggle("flex");
            document.getElementById(modalID + "-backdrop").classList.toggle("flex");
        }
    },
    
}
</script>
<style lang="">
    
</style>