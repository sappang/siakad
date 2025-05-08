import HeaderTitle from '@/Components/HeaderTitle';
import { Button } from '@/Components/ui/button';
import { Card, CardContent } from '@/Components/ui/card';
import { Input } from '@/Components/ui/input';
import { Label } from '@/Components/ui/label';
import AppLayout from '@/Layouts/AppLayout';
import { Link, useForm } from '@inertiajs/react';
import { IconArrowLeft, IconBuildingSkyscraper } from '@tabler/icons-react';

export default function Create(props) {
    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        logo: null,
        _method: props.page_settings.method,
    });
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
                    <form>
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
                            </div>
                        </div>
                    </form>
                </CardContent>
            </Card>
        </div>
    );
}
Create.layout = (page) => <AppLayout children={page} title={page.props.page_settings.title} />;
