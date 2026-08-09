import movies from '@/routes/movies';
import { Head, Link } from '@inertiajs/react';
import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import { Button } from '@/components/ui/button';

export default function Index() {
    return (
        <>
            <Head title="Movies" />
            <Button asChild>
                <Link href={movies.create()}>Create Movie</Link>
            </Button>
        </>
    );
}

Index.layout = {
    breadcrumbs: [
        {
            title: 'Movies',
            href: movies.index(),
        },
    ],
};
