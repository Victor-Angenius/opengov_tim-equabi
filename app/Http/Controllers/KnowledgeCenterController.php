<?php

namespace App\Http\Controllers;

class KnowledgeCenterController extends Controller
{
    public function education()
    {
        $topics = [
            [
                'title' => 'Cara Membuat Laporan Publik yang Efektif',
                'summary' => 'Pelajari struktur laporan yang jelas: masalah, lokasi, waktu kejadian, dampak, dan bukti pendukung.',
                'points' => [
                    'Gunakan judul yang spesifik dan mudah dipahami.',
                    'Jelaskan dampak masalah bagi warga sekitar.',
                    'Tambahkan foto atau keterangan lokasi bila tersedia.',
                ],
                'badge' => 'Pelaporan',
            ],
            [
                'title' => 'Hak Warga dalam Pelayanan Publik',
                'summary' => 'Warga berhak memperoleh informasi layanan, waktu penyelesaian yang wajar, dan penjelasan atas tindak lanjut laporan.',
                'points' => [
                    'Meminta informasi prosedur dan persyaratan layanan.',
                    'Mengetahui status penanganan pengaduan.',
                    'Menyampaikan keberatan bila layanan tidak sesuai standar.',
                ],
                'badge' => 'Hak Warga',
            ],
            [
                'title' => 'Etika Digital Saat Menyampaikan Aduan',
                'summary' => 'Laporan yang santun, faktual, dan tidak menyerang pribadi membantu petugas memproses aspirasi lebih cepat.',
                'points' => [
                    'Fokus pada masalah, bukan menyerang individu.',
                    'Hindari data palsu atau informasi yang belum diverifikasi.',
                    'Gunakan bahasa yang sopan dan informatif.',
                ],
                'badge' => 'Literasi Digital',
            ],
        ];

        $learningSteps = [
            'Kenali masalah layanan yang ingin disampaikan.',
            'Siapkan bukti, foto, atau detail lokasi.',
            'Pilih kategori laporan yang paling sesuai.',
            'Pantau status laporan dan simpan nomor referensi.',
            'Gunakan kanal lanjutan bila masalah belum terselesaikan.',
        ];

        return view('knowledge.education', compact('topics', 'learningSteps'));
    }

    public function serviceGuide()
    {
        $serviceCategories = [
            [
                'name' => 'Administrasi Kependudukan',
                'description' => 'Panduan umum untuk layanan KTP, KK, akta kelahiran, dan perubahan data.',
                'documents' => 'Siapkan identitas dasar, formulir permohonan, dan dokumen pendukung perubahan data.',
            ],
            [
                'name' => 'Infrastruktur dan Fasilitas Umum',
                'description' => 'Untuk jalan rusak, lampu jalan, drainase, taman, dan fasilitas publik lainnya.',
                'documents' => 'Sertakan lokasi, waktu kejadian, foto, serta dampak bagi warga sekitar.',
            ],
            [
                'name' => 'Bantuan Sosial dan Kesejahteraan',
                'description' => 'Informasi awal untuk warga yang ingin mengetahui alur verifikasi bantuan dan pengaduan data.',
                'documents' => 'Siapkan identitas keluarga, surat pendukung, dan bukti ketidaksesuaian data jika ada.',
            ],
        ];

        $serviceFlow = [
            'Cari informasi layanan atau kategori masalah yang sesuai.',
            'Periksa dokumen atau bukti yang biasanya dibutuhkan.',
            'Ajukan laporan atau permohonan melalui kanal resmi.',
            'Pantau status dan catat tindak lanjut dari petugas.',
            'Ajukan pengaduan lanjutan bila waktu layanan melebihi standar.',
        ];

        $publicChannels = [
            [
                'title' => 'Meja Layanan Kecamatan/Kelurahan',
                'description' => 'Kanal tatap muka untuk kebutuhan administrasi, legalisasi, dan konsultasi layanan dasar.',
            ],
            [
                'title' => 'Call Center / Helpdesk Pemerintah',
                'description' => 'Cocok untuk pertanyaan cepat, pengecekan informasi awal, dan eskalasi kendala layanan.',
            ],
            [
                'title' => 'Portal Pengaduan Digital',
                'description' => 'Gunakan untuk pengaduan yang membutuhkan pelacakan status dan riwayat tindak lanjut.',
            ],
        ];

        return view('knowledge.service-guide', compact('serviceCategories', 'serviceFlow', 'publicChannels'));
    }
}
