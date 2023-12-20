@extends('sb-user/app')

@section('content')

@section('judul','Tips Menjaga Kesehatan')

<div class="row">
    <div class="col-lg-12 mb-2">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="text-center">
                    <img src="{{ asset('gambar_poster/kesehatan.jpg') }}" alt="Poster Kesehatan" class="img-fluid mb-4" style="max-width: 100%; height: auto; object-fit: cover; max-height: 250px;">
                </div>
                <h3 class="text-center text-gray-800 mb-4">Tips Menjaga Kesehatan</h3>
                <p class="text-justify">
                    Menjaga kesehatan adalah suatu langkah penting untuk mencapai kehidupan yang bermutu. Adapun beberapa tips yang dapat membantu Anda menjaga kesehatan secara optimal:
                </p>
                <ol>
                    <li>
                        <strong>Maintain Pola Makan Sehat</strong><br>
                        Memastikan asupan nutrisi yang seimbang dengan mengonsumsi berbagai jenis makanan, termasuk buah, sayuran, protein, dan biji-bijian. Hindari makanan yang tinggi lemak jenuh dan gula tambahan.
                    </li>
                    <li>
                        <strong>Olahraga Teratur</strong><br>
                        Aktivitas fisik teratur membantu menjaga berat badan ideal, meningkatkan kondisi jantung, dan memperkuat otot. Setidaknya 30 menit olahraga setiap hari dapat memberikan manfaat signifikan.
                    </li>
                    <li>
                        <strong>Cukup Istirahat</strong><br>
                        Memberikan waktu yang cukup untuk istirahat sangat penting. Tidur yang cukup memungkinkan tubuh untuk pulih dan memperkuat sistem kekebalan tubuh.
                    </li>
                    <li>
                        <strong>Konsumsi Air yang Cukup</strong><br>
                        Minum air dalam jumlah yang cukup membantu menjaga keseimbangan cairan tubuh, mendukung fungsi organ-organ vital, dan membantu proses pencernaan.
                    </li>
                    <li>
                        <strong>Praktikkan Higiene yang Baik</strong><br>
                        Cuci tangan secara teratur, terutama sebelum makan dan setelah menggunakan toilet. Hal ini dapat mencegah penyebaran berbagai penyakit infeksi.
                    </li>
                </ol>
                <p class="text-justify">
                    Dengan mengikuti langkah-langkah ini, Anda dapat meningkatkan kesehatan fisik dan mental Anda. Ingatlah bahwa menjaga kesehatan adalah investasi jangka panjang untuk kualitas hidup yang lebih baik.
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
