import NavLink from '@/Components/NavLink';
import { Avatar, AvatarFallback, AvatarImage } from '@/Components/ui/avatar';
import { Link } from '@inertiajs/react';
import {
    IconBook,
    IconBooks,
    IconBuildingSkyscraper,
    IconCalendar,
    IconCalendarTime,
    IconCircleKey,
    IconDoor,
    IconDroplet,
    IconLayout2,
    IconLogout2,
    IconMoneybag,
    IconSchool,
    IconUser,
    IconUsersGroup,
} from '@tabler/icons-react';

export default function Sidebar({ auth = {}, url }) {
    return (
        <nav className="flex flex-1 flex-col">
            <ul role="list" className="flex flex-1 flex-col">
                <li className="-mx-6">
                    <Link
                        href="#"
                        className="flex items-center gap-x-4 px-6 py-3 text-sm font-semibold leading-6 text-white hover:bg-blue-800"
                    >
                        <Avatar>
                            <AvatarImage src={auth.user?.avatar} />
                            <AvatarFallback>{auth.user?.name?.substring(0, 1)}</AvatarFallback>
                        </Avatar>
                        <div className="flex flex-col text-left">
                            <span className="truncate font-bold">{auth.user?.name}</span>
                            <span className="truncate">{auth.user?.role_name}</span>
                        </div>
                    </Link>
                </li>
                {auth.user?.roles?.some((role) => ['Admin'].includes(role)) && (
                    <>
                        <NavLink
                            url="#"
                            active={url.startsWith('/admin/dashboard')}
                            title="Dashboard"
                            icon={IconLayout2}
                        />
                        <div className="px-3 py-2 text-xs font-medium text-white">Master</div>
                        <NavLink
                            url="#"
                            active={url.startsWith('/admin/faculties')}
                            title="Fakultas"
                            icon={IconBuildingSkyscraper}
                        />
                        <NavLink
                            url="#"
                            active={url.startsWith('/admin/departments')}
                            title="Program Studi"
                            icon={IconSchool}
                        />
                        <NavLink
                            url="#"
                            active={url.startsWith('/admin/academic-years')}
                            title="Tahun Akademik"
                            icon={IconCalendarTime}
                        />
                        <NavLink url="#" active={url.startsWith('/admin/classrooms')} title="Kelas" icon={IconDoor} />
                        <NavLink url="#" active={url.startsWith('/admin/roles')} title="Peran" icon={IconCircleKey} />

                        <div className="px-3 py-2 text-xs font-medium text-white">Pengguna</div>
                        <NavLink url="#" active={url.startsWith('/admin/students')} title="Mahasiswa" icon={IconUser} />
                        <NavLink
                            url="#"
                            active={url.startsWith('/admin/teachers')}
                            title="Dosen"
                            icon={IconUsersGroup}
                        />
                        <NavLink url="#" active={url.startsWith('/admin/operators')} title="Operator" icon={IconUser} />

                        <div className="px-3 py-2 text-xs font-medium text-white">Akademik</div>
                        <NavLink
                            url="#"
                            active={url.startsWith('/admin/courses')}
                            title="Mata Kuliah"
                            icon={IconBook}
                        />
                        <NavLink
                            url="#"
                            active={url.startsWith('/admin/schedules')}
                            title="Jadwal"
                            icon={IconCalendar}
                        />

                        <div className="px-3 py-2 text-xs font-medium text-white">Pembayaran</div>
                        <NavLink
                            url="#"
                            active={url.startsWith('/admin/fees')}
                            title="Uang Kuliah Tunggal"
                            icon={IconMoneybag}
                        />
                        <NavLink
                            url="#"
                            active={url.startsWith('/admin/fee-groups')}
                            title="Golongan UKT"
                            icon={IconDroplet}
                        />
                    </>
                )}

                {auth.user?.roles?.some((role) => ['Teacher'].includes(role)) && (
                    <>
                        <NavLink
                            url="#"
                            active={url.startsWith('/teachers/dashboard')}
                            title="Dashboard"
                            icon={IconLayout2}
                        />
                        <div className="px-3 py-2 text-xs font-medium text-white">Akademik</div>
                        <NavLink
                            url="#"
                            active={url.startsWith('/teachers/courses')}
                            title="Mata Kuliah"
                            icon={IconBook}
                        />
                        <NavLink
                            url="#"
                            active={url.startsWith('/teachers/schedules')}
                            title="Jadwal"
                            icon={IconCalendar}
                        />
                    </>
                )}
                {auth.user?.roles?.some((role) => ['Operator'].includes(role)) && (
                    <>
                        <NavLink
                            url="#"
                            active={url.startsWith('/operators/dashboard')}
                            title="Dashboard"
                            icon={IconLayout2}
                        />
                        <div className="px-3 py-2 text-xs font-medium text-white">Pengguna</div>
                        <NavLink
                            url="#"
                            active={url.startsWith('/operators/students')}
                            title="Mahasiswa"
                            icon={IconUser}
                        />
                        <NavLink
                            url="#"
                            active={url.startsWith('/operators/teachers')}
                            title="Dosen"
                            icon={IconUsersGroup}
                        />
                        <div className="px-3 py-2 text-xs font-medium text-white">Akademik</div>
                        <NavLink
                            url="#"
                            active={url.startsWith('/operators/classrooms')}
                            title="Kelas"
                            icon={IconDoor}
                        />
                        <NavLink
                            url="#"
                            active={url.startsWith('/operators/courses')}
                            title="Mata Kuliah"
                            icon={IconBooks}
                        />
                        <NavLink
                            url="#"
                            active={url.startsWith('/operators/schedules')}
                            title="Jadwal"
                            icon={IconCalendar}
                        />
                    </>
                )}

                <div className="px-3 py-2 text-xs font-medium text-white">Lainnya</div>
                <NavLink
                    url={route('logout')}
                    method="post"
                    as="button"
                    className="w-full"
                    active={url.startsWith('/logout')}
                    title="Logout"
                    icon={IconLogout2}
                />
            </ul>
        </nav>
    );
}
