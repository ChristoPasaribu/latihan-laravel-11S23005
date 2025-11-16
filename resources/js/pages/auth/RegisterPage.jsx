import React from "react";
import { useForm } from "@inertiajs/react";
import AuthLayout from "@/layouts/AuthLayout";
import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from "@/components/ui/card";
import { Input } from "@/components/ui/input";
import { Button } from "@/components/ui/button";

export default function RegisterPage() {
    const { data, setData, post, processing, errors } = useForm({
        name: "",
        email: "",
        password: "",
    });

    const handleSubmit = (event) => {
        event.preventDefault();
        post("/auth/register/post");
    };

    return (
        <AuthLayout>
            <div className="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-pink-100 via-rose-50 to-pink-100 animate-fade-in">
                <div className="absolute inset-0 overflow-hidden">
                    <div className="absolute w-72 h-72 bg-pink-200 rounded-full blur-3xl opacity-40 -top-10 -left-10 animate-pulse-slow"></div>
                    <div className="absolute w-72 h-72 bg-rose-200 rounded-full blur-3xl opacity-40 bottom-10 right-0 animate-pulse-slow"></div>
                </div>

                <div className="relative w-[360px]">
                    <Card className="shadow-2xl backdrop-blur-xl bg-white/70 border border-pink-200 rounded-3xl animate-slide-up">
                        <CardHeader className="text-center">
                            <div className="text-5xl mb-3 animate-bounce">🌸</div>
                            <CardTitle className="text-pink-600 text-2xl font-bold">
                                Yuk, buat akun baru ✨
                            </CardTitle>
                            <CardDescription className="text-pink-500 text-sm">
                                Bergabung dan mulai perjalanan belajarmu hari ini 💕
                            </CardDescription>
                        </CardHeader>

                        <CardContent>
                            <form onSubmit={handleSubmit} className="space-y-4">
                                {/* Nama Lengkap */}
                                <div>
                                    <label
                                        htmlFor="name"
                                        className="block text-sm font-semibold text-pink-700 mb-1"
                                    >
                                        Nama Lengkap
                                    </label>
                                    <Input
                                        id="name"
                                        type="text"
                                        placeholder="Masukkan nama lengkapmu"
                                        value={data.name}
                                        onChange={(e) => setData("name", e.target.value)}
                                        className="bg-pink-50/70 focus-visible:ring-pink-300 focus:border-pink-400"
                                    />
                                    {errors.name && (
                                        <p className="text-xs text-red-500 mt-1">{errors.name}</p>
                                    )}
                                </div>

                                {/* Email */}
                                <div>
                                    <label
                                        htmlFor="email"
                                        className="block text-sm font-semibold text-pink-700 mb-1"
                                    >
                                        Email
                                    </label>
                                    <Input
                                        id="email"
                                        type="email"
                                        placeholder="contoh@email.com"
                                        value={data.email}
                                        onChange={(e) => setData("email", e.target.value)}
                                        className="bg-pink-50/70 focus-visible:ring-pink-300 focus:border-pink-400"
                                    />
                                    {errors.email && (
                                        <p className="text-xs text-red-500 mt-1">{errors.email}</p>
                                    )}
                                </div>

                                {/* Password */}
                                <div>
                                    <label
                                        htmlFor="password"
                                        className="block text-sm font-semibold text-pink-700 mb-1"
                                    >
                                        Kata Sandi
                                    </label>
                                    <Input
                                        id="password"
                                        type="password"
                                        placeholder="Masukkan kata sandi"
                                        value={data.password}
                                        onChange={(e) => setData("password", e.target.value)}
                                        className="bg-pink-50/70 focus-visible:ring-pink-300 focus:border-pink-400"
                                    />
                                    {errors.password && (
                                        <p className="text-xs text-red-500 mt-1">{errors.password}</p>
                                    )}
                                </div>

                                <Button
                                    type="submit"
                                    className="w-full bg-pink-500 hover:bg-pink-600 text-white font-semibold rounded-full shadow-md hover:shadow-lg hover:brightness-105 transition-all"
                                    disabled={processing}
                                >
                                    {processing ? "Mendaftarkan..." : "💖 Daftar Sekarang"}
                                </Button>

                                <p className="text-center text-sm text-pink-600 mt-2">
                                    Sudah punya akun?{" "}
                                    <a
                                        href="/auth/login"
                                        className="font-semibold hover:underline text-pink-700"
                                    >
                                        Masuk di sini
                                    </a>
                                </p>
                            </form>
                        </CardContent>
                    </Card>
                </div>
            </div>
        </AuthLayout>
    );
}
