import ApplicationLogo from '@/Components/ApplicationLogo';
import NavigationMenu from '@/Components/NavigationMenu';
import { Avatar, AvatarFallback } from '@/Components/ui/avatar';
import { Button } from '@/Components/ui/button';
import { DropdownMenu, DropdownMenuTrigger } from '@/Components/ui/dropdown-menu';
import { Disclosure } from '@headlessui/react';
import { IconLayoutSidebar, IconX } from '@tabler/icons-react';

export default function HeaderStudentLayout({ url }) {
    return (
        <>
            <Disclosure
                as="nav"
                className="border-b border-blue-300 border-opacity-25 bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 py-4 lg:border-none"
            >
                {({ open }) => (
                    <>
                        <div className="px-6 lg:px-24">
                            <div className="relative flex h-16 items-center justify-between">
                                <div className="flex items-center">
                                    <ApplicationLogo
                                        bgLogo="from-orange-500 via-orange-600 to-orange-600"
                                        colorLogo="text-white"
                                        colorText="text-white"
                                    />
                                </div>
                                <div className="flex lg:hidden">
                                    {/* mobile */}
                                    <Disclosure.Button className="relative inline-flex items-center justify-center rounded-xl p-2 text-white hover:text-white focus:outline-none">
                                        <span className="absolute -inset-0.5" />
                                        {open ? (
                                            <IconX className="block size-6" />
                                        ) : (
                                            <IconLayoutSidebar className="block size-6" />
                                        )}
                                    </Disclosure.Button>
                                </div>

                                <div className="hidden lg:ml-4 lg:block">
                                    <div className="flex items-center">
                                        <div className="hidden lg:mx-10 lg:block">
                                            <div className="flex space-x-4">
                                                <NavigationMenu
                                                    url="#"
                                                    active={url.startsWith('students/dashboard')}
                                                    title="Dashboard"
                                                />
                                                <NavigationMenu
                                                    url="#"
                                                    active={url.startsWith('students/schedule')}
                                                    title="Jadwal"
                                                />
                                                <NavigationMenu
                                                    url="#"
                                                    active={url.startsWith('students/study-plans')}
                                                    title="Kartu Rencana Studi"
                                                />
                                                <NavigationMenu
                                                    url="#"
                                                    active={url.startsWith('students/study-results')}
                                                    title="Kartu Hasil Studi"
                                                />
                                                <NavigationMenu
                                                    url="#"
                                                    active={url.startsWith('students/fees')}
                                                    title="Pembayaran"
                                                />
                                            </div>
                                        </div>
                                        {/* Dropdown Menu */}
                                        <DropdownMenu>
                                            <DropdownMenuTrigger asChild>
                                                <Button>
                                                    <Avatar>
                                                        <AvatarFallback>X</AvatarFallback>
                                                    </Avatar>
                                                </Button>
                                            </DropdownMenuTrigger>
                                        </DropdownMenu>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </>
                )}
            </Disclosure>
        </>
    );
}
