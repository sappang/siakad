import StudentLayout from '@/Layouts/StudentLayout';

export default function Dashboard(props) {
    return <div>this is dashboard</div>;
}

Dashboard.layout = (page) => <StudentLayout title={page.props.page_settings.title} children={page} />;
