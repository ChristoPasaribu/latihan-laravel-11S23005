import React from "react";
import { useForm, usePage } from "@inertiajs/react";
import AuthLayout from "@/layouts/AuthLayout";
import {
    Card,
    CardContent,
    CardDescription,
    CardHeader,
    CardTitle,
} from "@/components/ui/card";
import {
    Field,
    FieldLabel,
    FieldDescription,
    FieldGroup,
} from "@/components/ui/field";
import { Alert, AlertTitle, AlertDescription } from "@/components/ui/alert";
import { CheckCircle2Icon } from "lucide-react";
import { Input } from "@/components/ui/input";
import { Button } from "@/components/ui/button";
import { motion } from "framer-motion";

export default function LoginPage() {
    const { success } = usePage().props;
    const { data, setData, post, processing, errors } = useForm({
        email: "",
        password: "",
        remember: false,
    });

    const handleSubmit = (event) => {
        event.preventDefault();
        post("/auth/login/post");
    };

    return (
        <AuthLayout>
            {/* Background dengan elemen dekoratif */}
            <div className="relative min-h-screen flex items-center justify-center overflow-hidden bg-gradient-to-br from-pink-100 via-rose-50 to-pink-200">
                {/* Ornamen bulat lembut */}
                <div className="absolute w-64 h-64 bg-pink-300/30 rounded-full blur-3xl top-10 left-10 animate-pulse"></div>
                <div className="absolute w-80 h-80 bg-rose-400/20 rounded-full blur-3xl bottom-10 right-10 animate-pulse"></div>

                {/* Animasi Card */}
                <motion.div
                    initial={{ opacity: 0, y: 40, scale: 0.95 }}
                    animate={{ opacity: 1, y: 0, scale: 1 }}
                    transition={{ duration: 0.6, ease: "easeOut" }}
                    className="relative w-[380px] z-10"
                >
                    <Card className="bg-white/80 backdrop-blur-xl border-0 shadow-xl rounded-3xl p-2">
                        <CardHeader className="text-center">
                            <CardTitle className="text-3xl font-extrabold text-pink-600 flex items-center justify-center gap-2">
                                <span>💖</span> Selamat Datang Kembali!
                            </CardTitle>
                            <CardDescription className="text-pink-500 font-medium">
                                Yuk, lanjutkan perjalanan manismu 💕
                            </CardDescription>
                        </CardHeader>

                        <CardContent>
                            {success && (
                                <Alert className="mb-4 border-pink-300 bg-pink-50 text-pink-600">
                                    <CheckCircle2Icon />
                                    <AlertTitle>Berhasil!</AlertTitle>
                                    <AlertDescription>{success}</AlertDescription>
                                </Alert>
                            )}

                            <form onSubmit={handleSubmit} className="space-y-6">
                                <FieldGroup>
                                    <Field>
                                        <FieldLabel className="text-pink-600 font-medium">
                                            Email
                                        </FieldLabel>
                                        <Input
                                            id="email"
                                            type="email"
                                            placeholder="contoh@email.com"
                                            className="border-pink-200 focus:border-pink-400 focus:ring-2 focus:ring-pink-200 bg-pink-50/40 transition-all"
                                            value={data.email}
                                            onChange={(e) =>
                                                setData("email", e.target.value)
                                            }
                                        />
                                        {errors.email && (
                                            <p className="text-sm text-red-500 mt-1">
                                                {errors.email}
                                            </p>
                                        )}
                                    </Field>

                                    <Field>
                                        <FieldLabel className="text-pink-600 font-medium">
                                            Kata Sandi
                                        </FieldLabel>
                                        <Input
                                            id="password"
                                            type="password"
                                            placeholder="Masukkan kata sandi"
                                            className="border-pink-200 focus:border-pink-400 focus:ring-2 focus:ring-pink-200 bg-pink-50/40 transition-all"
                                            value={data.password}
                                            onChange={(e) =>
                                                setData(
                                                    "password",
                                                    e.target.value
                                                )
                                            }
                                        />
                                        {errors.password && (
                                            <p className="text-sm text-red-500 mt-1">
                                                {errors.password}
                                            </p>
                                        )}
                                    </Field>

                                    <div className="pt-2">
                                        <Button
                                            type="submit"
                                            disabled={processing}
                                            className="w-full bg-gradient-to-r from-pink-400 to-rose-400 hover:from-pink-500 hover:to-rose-500 text-white font-semibold rounded-xl py-2 shadow-md hover:shadow-lg transition-all duration-300"
                                        >
                                            {processing ? "Memproses..." : "Masuk"}
                                        </Button>

                                        <FieldDescription className="text-center text-pink-600 mt-4">
                                            Belum punya akun?{" "}
                                            <a
                                                href="/auth/register"
                                                className="text-pink-500 font-semibold hover:underline"
                                            >
                                                Daftar di sini
                                            </a>
                                        </FieldDescription>
                                    </div>
                                </FieldGroup>
                            </form>
                        </CardContent>
                    </Card>
                </motion.div>
            </div>
        </AuthLayout>
    );
}
