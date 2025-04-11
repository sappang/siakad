import { cn } from '@/lib/utils';
import { Link } from '@inertiajs/inertia-react';
import { IconSchool } from '@tabler/icons-react';

export default function ApplicationLogo({ bgLogo, colorLogo, colorText }) {
    return (
        <Link href="#" classname={cn('flex flex-row items-center gap-x-2')}>
            <div
                classname={cn(
                    'text-foreground flex aspect-square size-12 items-center justify-center rounded-full bg-gradient-to-r',
                    bgLogo,
                )}
            >
                <IconSchool classname={cn('size-8', colorLogo)} />
            </div>
            <div classname={cn('grid flex-1 text-left leading-text', colorText)}>
                <span classname="truncate font-bold">SIAKAD</span>
                <span classname="truncate text-xs tracking-tighter">Sistem Informasi Akademik</span>
            </div>
        </Link>
    );
}
