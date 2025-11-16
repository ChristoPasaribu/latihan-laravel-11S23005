import React from "react";
import AppLayout from "@/Layouts/AppLayout";
import { Button } from "@/components/ui/button";
import {
    Card,
    CardContent,
    CardDescription,
    CardFooter,
    CardHeader,
    CardTitle,
} from "@/components/ui/card";

export default function HomePage() {
    const technologies = [
        {
            name: "Laravel",
            icon: "💎",
            description: "Framework PHP yang elegan dan powerful untuk backend.",
            docLink: "https://laravel.com/docs",
        },
        {
            name: "Inertia.js",
            icon: "🌉",
            description: "Menghubungkan Laravel dan React tanpa repot API boilerplate.",
            docLink: "https://inertiajs.com",
        },
        {
            name: "ViteJS",
            icon: "⚡",
            description: "Build tool super cepat dan efisien untuk React modern.",
            docLink: "https://vitejs.dev",
        },
        {
            name: "React.js",
            icon: "💠",
            description: "Library UI interaktif untuk pengalaman pengguna dinamis.",
            docLink: "https://reactjs.org",
        },
        {
            name: "Shadcn/ui",
            icon: "🎨",
            description: "Koleksi komponen modern dan bisa dikustomisasi.",
            docLink: "https://ui.shadcn.com",
        },
    ];

    return (
        <AppLayout>
            <div className="relative min-h-screen bg-gradient-to-br from-pink-100 via-rose-50 to-pink-200 overflow-hidden">
                {/* background efek blur bokeh */}
                <div className="absolute w-72 h-72 bg-pink-300 rounded-full blur-3xl opacity-30 top-20 left-10 animate-pulse-slow"></div>
                <div className="absolute w-96 h-96 bg-rose-200 rounded-full blur-3xl opacity-30 bottom-10 right-10 animate-pulse-slow"></div>

                <div className="relative z-10 px-6 py-16 flex flex-col items-center">
                    {/* Hero Section */}
                    <div className="text-center space-y-3 mb-12 animate-fade-in">
                        <h1 className="text-5xl font-extrabold text-pink-600 tracking-tight drop-shadow-sm">
                            🌸 Hai, Rahelcantik!
                        </h1>
                        <p className="text-lg text-pink-500">
                            Apa yang ingin kamu pelajari hari ini? 💕
                        </p>
                        <Button className="bg-pink-400 hover:bg-pink-500 text-white font-semibold px-6 mt-4 rounded-full shadow-md hover:shadow-lg transition-all">
                            ✨ Buat Rencana Baru
                        </Button>
                    </div>

                    {/* Tech Section */}
                    <div className="max-w-5xl grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        {technologies.map((tech, index) => (
                            <Card
                                key={index}
                                className="border-0 shadow-lg bg-white/70 backdrop-blur-md hover:shadow-xl hover:scale-[1.02] rounded-3xl transition-all duration-300 animate-slide-up"
                            >
                                <CardHeader className="text-center">
                                    <CardTitle className="flex items-center justify-center gap-2 text-pink-600">
                                        <span
                                            className="text-3xl"
                                            dangerouslySetInnerHTML={{ __html: tech.icon }}
                                        />
                                        {tech.name}
                                    </CardTitle>
                                </CardHeader>
                                <CardContent>
                                    <p className="text-sm text-center text-pink-500 leading-relaxed">
                                        {tech.description}
                                    </p>
                                </CardContent>
                                <CardFooter>
                                    <Button
                                        asChild
                                        className="w-full bg-pink-400 hover:bg-pink-500 text-white rounded-xl transition shadow-sm"
                                    >
                                        <a
                                            href={tech.docLink}
                                            target="_blank"
                                            rel="noopener noreferrer"
                                        >
                                            📘 Dokumentasi
                                        </a>
                                    </Button>
                                </CardFooter>
                            </Card>
                        ))}
                    </div>

                    {/* Quick Start */}
                    <Card className="mt-12 bg-white/70 backdrop-blur-md border-0 shadow-md hover:shadow-lg rounded-3xl transition animate-fade-in">
                        <CardHeader className="text-center">
                            <CardTitle className="text-pink-600 text-2xl font-semibold">
                                🚀 Quick Start
                            </CardTitle>
                            <CardDescription className="text-pink-500">
                                Mulai membangun proyekmu dengan stack modern ini
                            </CardDescription>
                        </CardHeader>
                        <CardContent className="grid sm:grid-cols-3 gap-5 text-center">
                            <div className="space-y-2">
                                <div className="text-2xl">🔧</div>
                                <h4 className="font-semibold text-pink-600">Backend</h4>
                                <p className="text-sm text-pink-500">
                                    Gunakan Laravel untuk API dan logic aplikasi.
                                </p>
                            </div>
                            <div className="space-y-2">
                                <div className="text-2xl">💻</div>
                                <h4 className="font-semibold text-pink-600">Frontend</h4>
                                <p className="text-sm text-pink-500">
                                    Bangun UI elegan dengan React dan Shadcn/UI.
                                </p>
                            </div>
                            <div className="space-y-2">
                                <div className="text-2xl">🔗</div>
                                <h4 className="font-semibold text-pink-600">Integrasi</h4>
                                <p className="text-sm text-pink-500">
                                    Inertia.js menyatukan Laravel & React tanpa repot.
                                </p>
                            </div>
                        </CardContent>
                    </Card>

                    {/* Footer */}
                    <footer className="mt-16 text-center text-pink-500 animate-fade-in">
                        <p className="text-sm">
                            🌷 Dibuat dengan cinta oleh <b>DelTodos</b> — terus semangat,
                            Rahelcantik! 💖
                        </p>
                    </footer>
                </div>
            </div>
        </AppLayout>
    );
}
