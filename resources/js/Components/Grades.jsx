import { Button } from '@/Components/ui/button';
import { Sheet, SheetDescription, SheetTrigger } from '@/Components/ui/sheet';
import { Table, TableCell, TableFooter, TableHead, TableHeader, TableRow } from '@/Components/ui/table';
import { IconEye } from '@tabler/icons-react';

export default function Grades({ studyResult, grades, name = null }) {
    return (
        <Sheet>
            <SheetTrigger asChild>
                <Button variant="purple" size="sm">
                    <IconEye className="size-4 text-white" />
                </Button>
            </SheetTrigger>
            <SheetContent side="right">
                <SheetHeader>
                    <SheetTitle>Detail Kartu Mahasiswa {name}</SheetTitle>
                    <SheetDescription>detail kartu hasil studi mahasiswa</SheetDescription>
                    <Table className="w-full border">
                        <TableHeader>
                            <TableRow>
                                <TableHead className="border">No</TableHead>
                                <TableHead className="border">Kode</TableHead>
                                <TableHead className="border">Mata Kuliah</TableHead>
                                <TableHead className="border">SKS</TableHead>
                                <TableHead className="border">Huruf</TableHead>
                                <TableHead className="border">Bobot</TableHead>
                                <TableHead className="border">Nilai</TableHead>
                            </TableRow>
                        </TableHeader>
                        <TableBody>
                            {grades.map((grade, index) => (
                                <TableRow key={index}>
                                    <TableCell className="border">{index + 1}</TableCell>
                                    <TableCell className="border">{grade.course.code}</TableCell>
                                    <TableCell className="border">{grade.course.name}</TableCell>
                                    <TableCell className="border">{grade.course.credit}</TableCell>
                                    <TableCell className="border">{grade.letter}</TableCell>
                                    <TableCell className="border">{grade.weight_of_value}</TableCell>
                                    <TableCell className="border">{grade.grade}</TableCell>
                                </TableRow>
                            ))}
                        </TableBody>
                        <TableFooter className="font-bold">
                            <TableRow>
                                <TableCell colSpan="3"> IP Semester</TableCell>
                                <TableCell className="border">{studyResult.gpa}</TableCell>
                                <TableCell className="border"></TableCell>
                                <TableCell className="border"></TableCell>
                            </TableRow>
                        </TableFooter>
                    </Table>
                </SheetHeader>
            </SheetContent>
        </Sheet>
    );
}
