 <!doctype html> {{-- Menentukan bahwa dokumen ini adalah dokumen HTML --}}
<html lang="en">
<head>
    <meta charset="utf-8"> {{--  --}}
    <meta name="viewport" content="width=device-width, initial-scale=1"> {{-- Mengatur tampilan halaman agar responsif terhadap berbagai ukuran layar --}}
    <title>Eloquent Relationships : Relasi One to Many</title> {{--Menentukan judul halaman yang akan ditampilkan di tab browser--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    {{--Memuat file CSS Bootstrap versi 5.2 dari CDN untuk gaya tampilan yang lebih menarik dan responsif.  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" referrerpolicy="no-referrer" />
</head>  {{-- Bagian ini berisi metadata dan sumber daya yang dibutuhkan oleh halaman web --}}
<body>
    <div class="container"> {{-- Menggunakan Bootstrap container untuk memberikan padding dan mengatur tata letak agar lebih rapi--}} 
        <div class="card mt-5"> {{-- Menggunakan Bootstrap card untuk menampilkan konten dalam kotak dengan margin atas mt-5  --}}
            <div class="card-body">
                <h3 class="text-center"><a href="https://santrikoding.com">www.santrikoding.com</a></h3>
                <h5 class="text-center my-4">Laravel Eloquent Relationship : One To Many</h5> {{--Menampilkan judul dengan margin atas dan bawah--}}
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Judul Post</th> {{-- Sebagai header untuk kolom yang menampilkan judul postingan. --}}
                            <th>Komentar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post) {{-- Perulangan Blade untuk mengambil semua data post dari variabel $posts. --}}
                            <tr>
                                <td>{{ $post->title }}</td> {{-- Menampilkan judul post menggunakan sintaks Blade {{ }} untuk menampilkan data dari variabel PHP.  --}}
                                <td>
                                    @foreach($post->comments()->get() as $comment)
                                    {{-- Mengambil semua komentar yang terkait dengan post tertentu menggunakan relasi One To Many dari Eloquent Model (comments() adalah metode yang didefinisikan dalam model untuk hubungan hasMany).  --}}
                                        <div class="card shadow-sm mb-2">
                                            <div class="card-body">
                                                <i class="fa fa-comments"></i> {{ $comment->comment }}
                                            </div>
                                        </div>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> {{-- Menutup tabel setelah semua data ditampilkan --}}
            </div>
        </div>
    </div>
</body>
</html>