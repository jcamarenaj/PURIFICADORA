<script setup>
    import BreezeAuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
    import { Head } from "@inertiajs/inertia-vue3";
    import BreezeButton from "@/Components/PrimaryButton.vue";
    import { Link } from "@inertiajs/inertia-vue3";
    import { useForm } from "@inertiajs/inertia-vue3";

    const props = defineProps({
        productos: {
            type: Object,
            default: () => ({}),
        },
    });


    const form = useForm({
        prudcto: '',
        codigo: '',
        descripcion: '',

    });

    const submit = () => {
        form.post(route("productos.store"));
    };
    </script>

    <template>
        <Head title="Agregar producto" />

        <BreezeAuthenticatedLayout>
            <template #header>
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Agregar producto
                </h2>
            </template>

            <div class="py-12">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <form @submit.prevent="submit">
                                <div class="mb-6">
                                    <label
                                        for="prudcto"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >Nombre</label
                                    >
                                    <input
                                        type="text"
                                        v-model="form.prudcto"
                                        name="prudcto"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Nombre del producto"
                                    />
                                    <div
                                        v-if="form.errors.prudcto"
                                        class="text-sm text-red-600"
                                    >
                                        {{ form.errors.prudcto }}
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label
                                        for="codigo"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >codigo</label
                                    >
                                    <input
                                        type="number"
                                        v-model="form.codigo"
                                        name="codigo"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Indique el codigo del producto"
                                    />
                                    <div
                                        v-if="form.errors.codigo"
                                        class="text-sm text-red-600"
                                    >
                                        {{ form.errors.codigo }}
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label
                                        for="descripcion"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                        >tipo</label
                                    >
                                    <input
                                        type="text"
                                        v-model="form.descripcion"
                                        name="descripcion"
                                        placeholder="descricion del producto"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    >

                                    <div
                                        v-if="form.errors.descripcion"
                                        class="text-sm text-red-600"
                                    >
                                        {{ form.errors.descripcion }}
                                    </div>
                                </div>
                                <button

                                    type="submit"
                                    class="text-white bg-blue-700  focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 "
                                    :disabled="form.processing"
                                    :class="{ 'opacity-25': form.processing }"

                                >
                                    Registrar producto
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </BreezeAuthenticatedLayout>
    </template>
