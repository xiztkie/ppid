<!DOCTYPE html>
<html>
<head>
    <title>Permohonan Sukses</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var tiket = "<?php echo session('tiket'); ?>";
            if (tiket) {
                alert("Nomor Tiket: " + tiket);
            }
        });
    </script>
</head>
<body>
    <h1>Permohonan Anda Berhasil Disimpan!</h1>
    <p>Terima kasih telah mengirimkan permohonan. Permohonan Anda telah berhasil disimpan.</p>
    <!-- Tambahkan konten lainnya sesuai kebutuhan -->
</body>
</html>