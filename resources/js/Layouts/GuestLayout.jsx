import { Toaster } from '@/Components/ui/sonner';
import { Head } from '@inertiajs/react';

export default function GuestLayout({ children, title }) {
    return (
        <>
            <Head title={title} />
            <Toaster position="top-center" richColors />
            {children}
        </>
    );
}
