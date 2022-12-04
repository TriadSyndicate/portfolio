<template lang="">
    <div class="flex flex-col p-10 text-center">
        <h3 class="tracking-[10px]">Skills</h3>
        <table class="table border-collapse border-slate-500">
            <thead>
                <tr>
                    <th class="border border-slate-600">Title</th>
                    <th class="border border-slate-600">Description</th>
                    <th class="border border-slate-600">Image</th>
                    <th class="border border-slate-600">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="skill in skills" :key="skill.id">
                    <td class="border border-slate-700">{{ skill.skill_title }}</td>
                    <td class="border border-slate-700">{{ skill.skill_description }}</td>
                    <td class="border border-slate-700 flex flex-col items-center">
                        <img :src="skill.skill_image.replace('public/','storage/')" class="w-16 object-cover" alt="">
                    </td>
                    <td class="border border-slate-700">
                        <button
                            @click="deleteSkill(skill)"
                            class="bg-red-500 text-white px-2 py-1 rounded-md m-1"
                        >
                            Delete
                        </button>
                        <button @click="toggleModal('modal-id-skill'+skill.id)" class="bg-slate-500 text-white px-2 py-1 rounded-md m-1">
                            Edit
                        </button>
                    </td>
                    <EditSkill :skill="skill" />
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
import EditSkill from '../Edit/EditSkill.vue';
export default {
    props: ['skills'],
    components: { EditSkill },
    methods: {
        toggleModal(modalID) {
            document.getElementById(modalID).classList.toggle("hidden");
            document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
            document.getElementById(modalID).classList.toggle("flex");
            document.getElementById(modalID + "-backdrop").classList.toggle("flex");
        },
        deleteSkill(skill) {
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
                    axios.delete(route('skill.destroy', skill.id)).then((response) => {
                        if (response.data.skill) {
                            swalWithTailwind.fire(
                                'Deleted!',
                                `Your ${response.data.skill.skill_title} Skill has been deleted.`,
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
                        `Your ${skill.skill_title} skill is safe :)`,
                        'error'
                    )
                }
            })
        }
    }
}
</script>
<style lang="">
    
</style>