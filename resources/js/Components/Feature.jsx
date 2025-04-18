import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Link, usePage } from "@inertiajs/react";


export default function Feature({feature, answer, children}) {
    const {auth} = usePage().props;

    const avilableCredits = auth.user.avilableCredits;

    return (
        <AuthenticatedLayout 
        user={auth.user} 
        header={
            <h2 className="font-semibold text-gray-800 text-xl dark:text-gray-200 leading-tight">{feature.name}</h2>
        }>

        <head title="Feature 1" />

        <div className="py-12">
            <div className="max-w-7xl max-auto sm:px-6 lg:px-8">
                {
                    answer != null && (
                    <div className="mb-3 py-3 px-5 rounded text-white text-xl bg-emerald-600">
                        Result of Calculation: {answer}
                    </div>
                )}

            <div className="pg-white dark:text-gray-800 overflow-hidden shadow sm:rouned-lg reltive">
                {avilableCredits != null && (
                feature.required_credits > avilableCredits && 
                <div className="absolute left-0 top-0 right-0 bottom-0 z-20 flex flex-col items-center justify-center bg-white/70 gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                    </svg>
                    <div>
                        You dont have enough credits for this feature Go {""}
                        <Link
                            href='/'
                            className="underline"
                        >
                            Buy more credits
                        </Link>
                    </div>
                </div>
                )}
                <div className="text-gray-400 p-8 border-b pb-4">
                    <p>{feature.description}</p>
                    <div className="text-sm italic text-right">
                        Requird {feature.required_credits} Credits
                    </div>
                    {children}
                </div>
            </div>

            </div>
        </div>

        </AuthenticatedLayout>
    )

}