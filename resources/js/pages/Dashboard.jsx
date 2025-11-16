import React from "react";
import AppLayout from "@/Layouts/AppLayout";
import { Button } from "@/components/ui/button";
import {
    Card,
    CardHeader,
    CardTitle,
    CardDescription,
    CardContent,
} from "@/components/ui/card";

export default function Dashboard({ auth }) {
    return (
        <AppLayout>
            <div className="min-h-screen bg-gradient-to-br from-pink-100 via-rose-50 to-pink-200 flex flex-col items-center justify-center px-4">
                <Card className="w-full max-w-lg bg-white/70 backdrop-blur-md border-0 shadow-xl rounded-3xl p-6 text-center space-y-4">
                    <CardHeader>
                        <CardTitle className="text-4xl font-bold text-pink-600">
                            🌸 Hai, {auth?.user?.name || "Cantik"}!
                        </CardTitle>
                        <CardDescription className="text-pink-500 text-lg">
                            Apa yang ingin kamu pelajari hari ini?
                        </CardDescription>
                    </CardHeader>

                    <CardContent>
                        <div className="flex justify-center mt-6">
                            <Button className="bg-pink-400 hover:bg-pink-500 text-white font-semibold px-6 py-2 rounded-xl shadow-md transition">
                                Buat Rencana 💖
                            </Button>
                        </div>
                    </CardContent>
                </Card>

                <footer className="mt-8 text-pink-500 text-sm text-center">
                    © 2025 Delcom Labs. Semua hak dilindungi 💕
                </footer>
            </div>
        </AppLayout>
    );
}
