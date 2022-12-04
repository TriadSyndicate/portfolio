<template lang="">
    <div class="flex flex-col p-10 text-center">
        <h3 class="tracking-[10px]">Projects</h3>
        <table class="table border-collapse border border-slate-500">
            <thead>
                <tr>
                    <th class="border border-slate-600">Title</th>
                    <th class="border border-slate-600">Description</th>
                    <th class="border border-slate-600">Image</th>
                    <th class="border border-slate-600">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="project in projects" :key="project.id">
                    <td class="border border-slate-700">{{ project.project_title }}</td>
                    <td class="border border-slate-700">{{ project.project_description }}</td>
                    <td class="border border-slate-700">
                        <img :src="project.project_image.replace('public/','storage/')" class="w-64 object-cover" alt="">
                    </td>
                    <td class="border border-slate-700">
                        <button
                            @click="deleteProject(project)"
                            class="bg-red-500 text-white px-2 py-1 rounded-md m-1"
                        >
                            Delete
                        </button>
                        <a :href="project.project_url" target="_blank" rel="noopener noreferrer">
                        <button class="bg-teal-700 text-white px-2 py-1 rounded-md m-1">
                            Project Link
                        </button>
                        </a>
                        <button @click="toggleModal('modal-id-project'+project.id)" class="bg-slate-500 text-white px-2 py-1 rounded-md m-1">
                            Edit
                        </button>
                    </td>
                    <EditProject :project="project" />
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
import EditProject from '../Edit/EditProject.vue';
export default {
    props: ['projects'],
    components: { EditProject },
    methods:{
        toggleModal(modalID){
            document.getElementById(modalID).classList.toggle("hidden");
            document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
            document.getElementById(modalID).classList.toggle("flex");
            document.getElementById(modalID + "-backdrop").classList.toggle("flex");
        },
        deleteProject(project){
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
                    axios.delete(route('project.destroy', project.id)).then((response) => {
                        if (response.data.message) {
                            let deletedProject = response.data.message
                            swalWithTailwind.fire(
                                'Deleted!',
                                `Your ${deletedProject.project_title} project has been deleted.`,
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
                        `Your ${project.project_title} project is safe :)`,
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