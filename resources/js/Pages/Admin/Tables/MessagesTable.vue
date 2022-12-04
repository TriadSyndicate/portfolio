<template lang="">
    <div class="flex flex-col p-10 text-center">
        <h3 class="tracking-[10px]">Messages</h3>
        <table class="table border-collapse border border-slate-500">
            <thead>
                <tr>
                    <th class="border border-slate-600">Name</th>
                    <th class="border border-slate-600">Email</th>
                    <th class="border border-slate-600">Message</th>
                    <th class="border border-slate-600">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="message in messages" :key="message.id">
                    <td class="border border-slate-700">{{ message.name }}</td>
                    <td class="border border-slate-700">{{ message.email }}</td>
                    <td class="border border-slate-700">{{ message.message }}</td>
                    <td class="border border-slate-700">
                        <button
                            @click="deleteMessage(message)"
                            class="bg-red-500 text-white px-2 py-1 rounded-md"
                        >
                            Delete
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    props: {
        messages: {
            type: Array,
            required: true,
        },
    },
    methods: {
        deleteMessage(message) {
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
                    axios.delete(route('message.destroy', message.id)).then((response) => {
                        if (response.data.message) {
                            swalWithTailwind.fire(
                                'Deleted!',
                                'Your file has been deleted.',
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
                        `Your message from ${message.email} is safe :)`,
                        'error'
                    )
                }
            })
        }
    },
}
</script>
<style lang="">
    
</style>