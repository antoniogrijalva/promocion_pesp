<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
    
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

//agregar propiedades para cargar datos en caso de edicion
const props = defineProps({
    c_usuario: {
        type: Object,
        default: null,
    },

}); 
 

const form = useForm({
    name: props.c_usuario ? props.c_usuario.name : '',
    email: props.c_usuario ? props.c_usuario.email : '',
    password: '',
    password_confirmation: '',
    tipo_usuario: props.c_usuario ? props.c_usuario.tipo_usuario : 'capturista',
});

const submit = () => {

    //alert('Formulario enviado');

    if (props.c_usuario) {
        form.put(route('users.update', props.c_usuario.id));
    } else {
        form.post(route('users.store'));
    }
    // form.post(route('users.store'), {
    //     onFinish: () => form.reset('password', 'password_confirmation'),
    // });
};
</script>

 <template>
    <authenticated-layout>
        <template #header> 
            <div class="flex justify-between items-center _mb-2">
                <h1 class="font-bold text-2xl">{{ props.c_usuario ? 'Editar Usuario' : 'Agregar Usuario' }}</h1>
            </div>

            
        </template>

        <main class="container mx-auto mt-4">
        
            <form @submit.prevent="submit"  class="max-w-lg bg-white p-4 rounded shadow mx-auto">
                <div>
                    <InputLabel for="name" value="Nombre" />

                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.name"
                        required
                        autofocus
                        autocomplete="name"
                    />

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div class="mt-4">
                    <InputLabel for="email" value="Email" />

                    <TextInput
                        id="email"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="form.email"
                        required
                        autocomplete="username"
                    />

                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4">
                    <InputLabel for="password" value="Password" />

                    <TextInput
                        id="password"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password"
                        _required
                        autocomplete="new-password"
                    />

                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="mt-4">
                    <InputLabel
                        for="password_confirmation"
                        value="Confirm Password"
                    />

                    <TextInput
                        id="password_confirmation"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password_confirmation"
                        _required
                        autocomplete="new-password"
                    />

                    <InputError
                        class="mt-2"
                        :message="form.errors.password_confirmation"
                    />
                </div>

                <div class="mt-4">
                    <InputLabel for="tipo_usuario" value="Tipo de Usuario" />

                    <select
                        id="tipo_usuario"
                        class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        v-model="form.tipo_usuario"
                        required
                    >
                        <option value="capturista">Capturista</option>
                        <option value="supervisor">Supervisor</option>
                        <option value="administrador">Administrador</option>
                    </select>

                    <InputError class="mt-2" :message="form.errors.tipo_usuario" />
                </div>

                <div class="mt-4 flex items-center justify-end">
                    <Link
                        :href="route('login')"
                        class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    >
                        Already registered?
                    </Link>

                    <PrimaryButton
                        class="ms-4"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Register
                    </PrimaryButton>
                </div>
            </form>
            <!-- </GuestLayout>  -->
         
        </main>
    </authenticated-layout>
</template>
