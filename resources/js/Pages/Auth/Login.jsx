import GuestLayout from '@/Layouts/GuestLayout';
import { useForm } from '@inertiajs/react';

export default function Login({ status, canResetPassword }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        email: '',
        password: '',
        remember: false,
    });

    const submit = (e) => {
        e.preventDefault();

        post(route('login'), {
            onFinish: () => reset('password'),
        });
    };

    return <div className="w-full lg:grid lg:min-h-screen lg:grid-cols-2">this is Login</div>;
}

Login.Layout = (page) => <GuestLayout children={page} title />;
