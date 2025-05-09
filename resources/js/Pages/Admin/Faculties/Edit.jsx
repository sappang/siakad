import HeaderTitle from '@/Components/HeaderTitle';
import InputError from '@/Components/InputError';
import { Button } from '@/Components/ui/button';
import { Card, CardContent } from '@/Components/ui/card';
import { Input } from '@/Components/ui/input';
import { Label } from '@/Components/ui/label';
import AppLayout from '@/Layouts/AppLayout';
import { flashMessage } from '@/lib/utils';
import { Link, useForm } from '@inertiajs/react';
import { IconArrowLeft, IconBuildingSkyscraper, IconCheck } from '@tabler/icons-react';
import { useRef } from 'react';
import { toast } from 'sonner';

export default function Edit(props) {
    const fileInputLogo = useRef(null);
    const { data, setData, post, processing, errors, reset } = useForm({
        name: props.faculty.name ?? '',
        logo: null,
        _method: props.page_settings.method,
    });
    const onHandleReset = () => {
        reset();
        fileInputLogo.current.value = null;
    };
    const onHandleSubmit = (e) => {
        e.preventDefault();
        post(props.page_settings.action, {
            preserveScroll: true,
            preserveState: true,
            onSuccess: (success) => {
                const flash = flashMessage(success);
                if (flash) toast[flash.type](flash.message);
            },
        });
    };
    return (
        <div className="flex w-full flex-col pb-32">
            <div className="mb-8 flex flex-col items-start justify-between gap-y-4 lg:flex-row lg:items-center">
                <HeaderTitle
                    title={props.page_settings.title}
                    subtitle={props.page_settings.subtitle}
                    icon={IconBuildingSkyscraper}
                />
                <Button variant="red" size="xl" className="w-full lg:w-auto" asChild>
                    <Link href={route('admin.faculties.index')}>
                        <IconArrowLeft className="size-4" />
                        Kembali
                    </Link>
                </Button>
            </div>
            <Card>
                <CardContent className="p-6">
                    <form onSubmit={onHandleSubmit}>
                        <div className="grid grid-cols-1 gap-4 lg:grid-cols-4">
                            <div className="col-span-full">
                                <Label htmlFor="name">Nama</Label>
                                <Input
                                    type="text"
                                    name="name"
                                    id="name"
                                    value={data.name}
                                    placeholder="Masukkan Nama Fakultas"
                                    onChange={(e) => setData(e.target.name, e.target.value)}
                                />
                                {errors.name && <InputError message={errors.name} />}
                            </div>
                            <div className="col-span-full">
                                <Label htmlFor="logo">Logo</Label>
                                <Input
                                    type="file"
                                    name="logo"
                                    id="logo"
                                    onChange={(e) => setData(e.target.name, e.target.files[0])}
                                    ref={fileInputLogo}
                                />
                                {errors.logo && <InputError message={errors.logo} />}
                            </div>
                        </div>
                        <div className="mt-8 flex flex-col gap-2 lg:flex-row lg:justify-end">
                            <Button type="button" variant="ghost" size="xl" onClick={onHandleReset}>
                                Reset
                            </Button>
                            <Button type="submit" variant="green" size="xl" disabled={processing}>
                                <IconCheck />
                                Simpan
                            </Button>
                        </div>
                    </form>
                </CardContent>
            </Card>
        </div>
    );
}
Edit.layout = (page) => <AppLayout children={page} title={page.props.page_settings.title} />;
